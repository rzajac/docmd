<?php
/**
 * Copyright 2015 Rafal Zajac <rzajac@gmail.com>.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */
namespace Kicaj\DocMd;

/**
 * MdClass describes PHP class.
 *
 * @author Rafal Zajac <rzajac@gmail.com>
 */
class MdClass extends AbsMdElement
{
    /** Maximum number of columns */
    const MAX_COLUMNS = 6;

    /**
     * Class description tags.
     *
     * @var MdTag[]
     */
    protected $tags;

    /**
     * Class constants.
     *
     * @var MdConst[]
     */
    protected $constants;

    /**
     * Class properties.
     *
     * @var MdProp[]
     */
    protected $properties;

    /**
     * Class methods.
     *
     * @var MdMethod[]
     */
    protected $methods;

    /**
     * List of all classes that this class inherits from.
     *
     * @var string
     */
    protected $inheritsFrom = ['props' => [], 'methods' => []];

    /**
     * Get class type.
     *
     * @return string
     */
    public function getClassType()
    {
        return File::TYPE_CLASS;
    }

    /**
     * Get class markdown header.
     *
     * @return string
     */
    public function getClassHeader()
    {
        $header = $this->getFinal().$this->getAbstract().$this->getClassType();
        $header = ucfirst(strtolower($header));

        return $header;
    }

    /**
     * Return markdown file name.
     *
     * @return string
     */
    public function getMdFileName()
    {
        return Tools::getMdFileName($this->getFullName());
    }

    /**
     * Get PHPDoc tags from class description.
     *
     * @return MdTag[]
     */
    public function getTags()
    {
        if ($this->tags === null) {
            $this->tags = [];
            foreach ($this->elem->docblock->xpath('tag') as $tag) {
                $this->tags[] = new MdTag($tag, $this->docMd);
            }
        }

        return $this->tags;
    }

    /**
     * Returns array of trait names this class uses.
     *
     * @return array
     */
    public function usesTraits()
    {
        $this->getProperties();
        $this->getMethods();

        $traits = [];

        /** @var MdProp $prop */
        foreach ($this->inheritsFrom['props'] as $prop) {
            $inheritedFrom = $prop->getInheritedFrom();
            $class = $this->docMd->getClass($inheritedFrom);
            if ($class && $class->getClassType() == File::TYPE_TRAIT) {
                $traits[] = $prop;
            }
        }

        /** @var MdMethod $method */
        foreach ($this->inheritsFrom['methods'] as $method) {
            $inheritedFrom = $method->getInheritedFrom();
            $class = $this->docMd->getClass($inheritedFrom);
            if ($class && $class->getClassType() == File::TYPE_TRAIT) {
                $traits[] = $class;
            }
        }

        return array_unique($traits);
    }

    /**
     * Get extended class names.
     *
     * Interfaces in PHP can have multiple inheritance.
     *
     * @link http://php.net/manual/en/language.oop5.interfaces.php
     *
     * @return string[]
     */
    public function getExtends()
    {
        $extends = [];
        if (isset($this->elem->extends)) {
            foreach ($this->elem->extends as $parent) {
                $parent = ltrim((string) $parent, '\\');
                if ($parent) {
                    $extends[] = $parent;
                }
            }
        }

        return $extends;
    }

    /**
     * Get implemented interfaces.
     *
     * @return string[]
     */
    public function getImplements()
    {
        $interfaces = [];

        if (isset($this->elem->implements)) {
            foreach ($this->elem->implements as $interface) {
                $interface = ltrim((string) $interface, '\\');
                if ($interface) {
                    $class = $this->docMd->getClass($interface);
                    if ($class) {
                        $interface = Tools::getFileLink($interface);
                    }
                    $interfaces[] = $interface;
                }
            }
        }

        return $interfaces;
    }

    /**
     * Get declared constants.
     *
     * @return MdConst[]
     */
    public function getConstants()
    {
        if ($this->constants === null) {
            $this->constants = [];
            foreach ($this->elem->xpath('constant') as $const) {
                $this->constants[] = new MdConst($const, $this->docMd);
            }
        }

        return $this->constants;
    }

    /**
     * Get class properties.
     *
     * @return MdProp[]
     */
    public function getProperties()
    {
        if ($this->properties === null) {
            $this->properties = [];
            foreach ($this->elem->xpath('property') as $prop) {
                $prop = new MdProp($prop, $this->docMd);

                if ($prop->isInherited()) {
                    $this->inheritsFrom['props'][$prop->getInheritedFrom()] = $prop;
                } else {
                    $this->properties[$prop->getName()] = $prop;
                }
            }
            $this->properties = array_values($this->properties);
        }

        return $this->properties;
    }

    /**
     * Get class methods.
     *
     * @return MdMethod[]
     */
    public function getMethods()
    {
        if ($this->methods === null) {
            $this->methods = [];
            foreach ($this->elem->xpath('method') as $method) {
                $method = new MdMethod($method, $this->docMd);

                if ($method->isInherited()) {
                    $this->inheritsFrom['methods'][$method->getInheritedFrom()] = $method;
                } else {
                    $this->methods[] = $method;
                }
            }
        }

        return $this->methods;
    }

    /**
     * Return MdTable describing methods.
     *
     * @return MdTable
     */
    public function getMethodsTable()
    {
        return $this->buildTable($this->getMethods());
    }

    /**
     * Return MdTable describing properties.
     *
     * @return MdTable
     */
    public function getPropertiesTable()
    {
        return $this->buildTable($this->getProperties());
    }

    /**
     * Build markdown table.
     *
     * @param MdTableItf[] $rows
     *
     * @return MdTable
     */
    protected function buildTable($rows)
    {
        $maxColumnLength = 0;
        $methodCount = count($rows);

        foreach ($rows as $row) {
            $maxColumnLength = max($maxColumnLength, mb_strlen($row->getCellValue()));
        }

        // Add two for right and left padding
        $maxColumnLength += 2;

        // Figure put how many columns we can have
        for ($columns = 1; $columns <= self::MAX_COLUMNS; ++$columns) {
            $rowLength = $columns * ($maxColumnLength + 2) + 1;
            if ($rowLength > 100) {
                --$columns;
                break;
            }
        }

        if ($columns >= $methodCount) {
            $columns = $methodCount;
        }

        return new MdTable($rows, $columns, $maxColumnLength);
    }
}
