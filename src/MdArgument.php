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
 * Method argument.
 *
 * @author Rafal Zajac <rzajac@gmail.com>
 */
class MdArgument extends AbsMdElement
{
    /**
     * The PHP type of this argument.
     *
     * @var string
     */
    protected $phpType;

    /**
     * The PHPDoc param tag associated with this argument.
     *
     * @var MdTag
     */
    protected $tag;

    /**
     * Return PHP type of the element.
     *
     * @return string
     */
    public function getPhpType()
    {
        if (!$this->phpType) {
            $this->phpType = ''.$this->elem->type;
            if ($this->phpType !== '') {
                $this->phpType = $this->phpType.' ';
            }
        }

        return Tools::fixTypeHint($this->phpType);
    }

    /**
     * Set PHP type for this argument.
     *
     * @param string $phpType
     *
     * @return MdArgument
     */
    public function setPhpType($phpType)
    {
        $this->phpType = $phpType;

        return $this;
    }

    /**
     * Set the PHPDoc param tag associated with this argument.
     *
     * @param MdTag $tag
     *
     * @return MdArgument
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Return the PHPDoc param tag associated with this argument.
     *
     * @return MdTag
     */
    public function getTag()
    {
        return $this->tag;
    }
}
