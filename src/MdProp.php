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
 * Class describing PHP class property.
 *
 * @author Rafal Zajac <rzajac@gmail.com>
 */
class MdProp extends AbsMdElement implements MdTableItf
{
    /**
     * Property tags.
     *
     * @var MdTag[]
     */
    protected $tags;

    /**
     * Get tags from class description.
     *
     * @return MdTag[]
     */
    public function getTags()
    {
        if ($this->tags === null) {
            $this->tags = [];
            foreach ($this->elem->docblock->xpath('tag') as $tag) {
                $tag = new MdTag($tag, $this->docMd);
                $this->tags[$tag->getName()] = $tag;
            }
        }

        return $this->tags;
    }

    /**
     * Get property type.
     *
     * @return string
     */
    public function getPhpType()
    {
        $this->getTags();

        if (!isset($this->tags['var'])) {
            return '';
        }

        return $this->tags['var']->getType();
    }

    /**
     * Get markdown to put in a table cell.
     *
     * @return string
     */
    public function getCellValue()
    {
        return $this->getName();
    }

    /**
     * Return default value.
     *
     * @return string
     */
    public function getDefaultValue()
    {
        $default = ''.$this->elem->default;

        return $default ? ' = '.$default : $default;
    }
}
