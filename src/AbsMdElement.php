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

use SimpleXMLElement;

/**
 * Abstract markdown element.
 *
 * @author Rafal Zajac <rzajac@gmail.com>
 */
class AbsMdElement
{
    /**
     * XML element.
     *
     * @var SimpleXMLElement
     */
    protected $elem;

    /**
     * The DocMd instance this element belongs to.
     *
     * @var DocMd
     */
    protected $docMd;

    /**
     * Constructor.
     *
     * @param SimpleXMLElement $elem  The XML element
     * @param DocMd            $docMd The DocMd this instance belongs to
     */
    public function __construct(SimpleXMLElement $elem, DocMd $docMd)
    {
        $this->docMd = $docMd;
        $this->elem = $elem;
    }

    /**
     * Make.
     *
     * @param SimpleXMLElement $elem  The XML element describing argument
     * @param DocMd            $docMd The DocMd this instance belongs to
     *
     * @return MdArgument
     */
    public static function make(SimpleXMLElement $elem, DocMd $docMd)
    {
        return new static($elem, $docMd);
    }

    /**
     * Return element name.
     *
     * @return string
     */
    public function getName()
    {
        return ''.$this->elem->name;
    }

    /**
     * Return file link to the element.
     *
     * @return string
     */
    public function getFileLink()
    {
        $fullName = $this->getFullName();
        $fileName = Tools::getMdFileName($fullName);

        return sprintf('[%s](%s)', $fullName, $fileName);
    }

    /**
     * Return the element name with PHP namespace.
     *
     * @return string
     */
    public function getFullName()
    {
        return ltrim(''.$this->elem->full_name, '\\');
    }

    /**
     * Is the element inherited.
     *
     * @return string
     */
    public function isInherited()
    {
        return isset($this->elem->inherited_from);
    }

    /**
     * Return class with namespace the element inherits from.
     *
     * @return string Returns empty string if element is not inherited
     */
    public function getInheritedFrom()
    {
        if ($this->isInherited()) {
            return ltrim(''.$this->elem->inherited_from, '\\');
        }

        return '';
    }

    /**
     * Return the element namespace.
     *
     * @return string
     */
    public function getNameSpace()
    {
        return ''.$this->elem->attributes()['namespace'];
    }

    /**
     * Return abstract.
     *
     * @return string Returns empty string if element is not abstract
     */
    public function getAbstract()
    {
        $abs = ''.$this->elem->attributes()['abstract'];

        return $abs == 'true' ? 'abstract ' : '';
    }

    /**
     * Return final.
     *
     * @return string Returns empty string if element is not final
     */
    public function getFinal()
    {
        $abs = ''.$this->elem->attributes()['final'];

        return $abs == 'true' ? 'final ' : '';
    }

    /**
     * Get the line declaration starts.
     *
     * @return int
     */
    public function getLine()
    {
        return (int) $this->elem->attributes()['line'];
    }

    /**
     * Return short element description.
     *
     * @return string
     */
    public function getDescription()
    {
        return Tools::fixDesc(''.$this->elem->docblock->description);
    }

    /**
     * Return long element description.
     *
     * @return string
     */
    public function getLongDescription()
    {
        return Tools::fixDesc(''.$this->elem->docblock->{'long-description'});
    }

    /**
     * Get element filesystem path.
     *
     * @return string
     */
    public function getPath()
    {
        return ''.$this->elem->attributes()['path'];
    }

    /**
     * Return element visibility.
     *
     * @return string
     */
    public function getVisibility()
    {
        return ''.$this->elem->attributes()['visibility'];
    }

    /**
     * Return static.
     *
     * @return string Returns empty string if element is not static
     */
    public function getStatic()
    {
        return $this->elem->attributes()['static'] == 'true' ? ' static' : '';
    }
}
