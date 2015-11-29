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

use Kicaj\Tools\Exception;

/**
 * File entry in structure.xml file.
 *
 * @author Rafal Zajac <rzajac@gmail.com>
 */
class File extends AbsMdElement
{
    /** Class types */
    const TYPE_CLASS = 'Class';
    const TYPE_TRAIT = 'Trait';
    const TYPE_INTERFACE = 'Interface';

    /**
     * Get class object.
     *
     * @throws Exception When class type is unknown
     *
     * @return MdClass|MdInterface|MdTrait
     */
    public function getClass()
    {
        switch ($this->getType()) {
            case self::TYPE_CLASS:
                $class = new MdClass($this->elem->class[0], $this->docMd);
                break;

            case self::TYPE_INTERFACE:
                $class = new MdInterface($this->elem->interface[0], $this->docMd);
                break;

            case self::TYPE_TRAIT:
                $class = new MdTrait($this->elem->trait[0], $this->docMd);
                break;

            default:
                throw new Exception('unknown class type '.$this->getType());
        }

        return $class;
    }

    /**
     * Return type of the class this file entry describes.
     *
     * @throws Exception When file type is unknown
     *
     * @return string The one of self::TYPE_* constants
     */
    public function getType()
    {
        if (isset($this->elem->class)) {
            $type = self::TYPE_CLASS;
        } elseif (isset($this->elem->interface)) {
            $type = self::TYPE_INTERFACE;
        } elseif (isset($this->elem->trait)) {
            $type = self::TYPE_TRAIT;
        } else {
            throw new Exception('unknown file type');
        }

        return $type;
    }
}
