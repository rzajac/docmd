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
 * Class describing phpdocumentor tag.
 *
 * @author Rafal Zajac <rzajac@gmail.com>
 */
class MdTag extends AbsMdElement
{
    /** Tag types */
    const TYPE_VAR = 'var';
    const TYPE_PARAM = 'param';
    const TYPE_THROWS = 'throws';
    const TYPE_AUTHOR = 'author';
    const TYPE_RETURN = 'return';
    const TYPE_UNKNOWN = '__unknown__';

    /**
     * Tag name.
     *
     * @return string
     */
    public function getName()
    {
        return ''.$this->elem->attributes()['name'];
    }

    /**
     * Get tag type.
     *
     * @return string The one of self::TYPE_* constants
     */
    public function getType()
    {
        switch ($this->getName()) {
            case self::TYPE_AUTHOR:
                $type = self::TYPE_AUTHOR;
                break;

            case self::TYPE_PARAM:
                $type = self::TYPE_PARAM;
                break;

            case self::TYPE_VAR:
                $type = Tools::fixTypeHint(''.$this->elem->type);
                break;

            default:
                $type = self::TYPE_UNKNOWN;
        }

        return $type;
    }

    /**
     * Return description property.
     *
     * @return string
     */
    public function getDescriptionProp()
    {
        return Tools::fixDesc(''.$this->elem->attributes()['description']);
    }

    /**
     * Return PHP type property.
     *
     * @return string
     */
    public function getPhpTypeProp()
    {
        return ''.$this->elem->attributes()['type'];
    }

    /**
     * Return variable name property.
     *
     * @return string
     */
    public function getVarNameProp()
    {
        return ''.$this->elem->attributes()['variable'];
    }
}
