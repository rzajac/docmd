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
 * Class describing PHP class method.
 *
 * @author Rafal Zajac <rzajac@gmail.com>
 */
class MdMethod extends AbsMdElement implements MdTableItf
{
    /**
     * Method arguments.
     *
     * @var SimpleXMLElement
     */
    protected $arguments;

    /**
     * The PHPDoc param documentation tags for the method.
     *
     * @var MdTag[]
     */
    protected $params;

    /**
     * The PHPDoc return documentation tags for the method.
     *
     * @var MdTag
     */
    protected $return;

    /**
     * The PHPDoc throws documentation tags for the method.
     *
     * @var MdTag[]
     */
    protected $throws;

    /**
     * Get method arguments.
     *
     * @return MdArgument[]
     */
    public function getArguments()
    {
        $this->getTags();

        if ($this->arguments === null) {
            $this->arguments = [];
            foreach ($this->elem->xpath('argument') as $argument) {
                $argument = new MdArgument($argument, $this->docMd);

                if (!isset($this->params[$argument->getName()])) {
                    continue;
                }
                $tag = $this->params[$argument->getName()];

                $argument->setTag($tag)->setPhpType($tag->getPhpTypeProp());
                $this->arguments[] = $argument;
            }
        }

        return $this->arguments;
    }

    /**
     * Get tags from method description.
     *
     * @return MdTag[]
     */
    public function getTags()
    {
        if ($this->params !== null) {
            return;
        }
        $this->params = [];
        $this->return = [];
        $this->throws = [];

        foreach ($this->elem->docblock->xpath('tag') as $tag) {
            $tag = new MdTag($tag, $this->docMd);

            switch ($tag->getName()) {
                case MdTag::TYPE_PARAM:
                    $this->params[$tag->getVarNameProp()] = $tag;
                    break;

                case MdTag::TYPE_THROWS:
                    $this->throws[] = $tag;
                    break;

                case MdTag::TYPE_RETURN:
                    $this->return = $tag;
                    break;
            }
        }
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
     * Method return type.
     *
     * @return string
     */
    public function getReturnPhpType()
    {
        $this->getTags();

        return $this->return ? Tools::fixTypeHint($this->return->getPhpTypeProp()) : '';
    }

    /**
     * Method return tag.
     *
     * @return MdTag
     */
    public function getReturnTag()
    {
        return $this->return;
    }

    /**
     * Return method throws.
     *
     * @return MdTag[]
     */
    public function getThrows()
    {
        $this->getTags();

        return $this->throws;
    }
}
