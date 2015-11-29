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
 * Class describing phpdocumentor structure.xml.
 *
 * @author Rafal Zajac <rzajac@gmail.com>
 */
class Structure
{
    /**
     * The path to the structure.xml file.
     *
     * @var string
     */
    protected $structurePath;

    /**
     * The parsed XML.
     *
     * @var SimpleXMLElement
     */
    protected $structureXml;

    /**
     * The DocMd this instance belongs to.
     *
     * @var DocMd
     */
    protected $docMd;

    /**
     * Constructor.
     *
     * @param string $structurePath The path to the structure file
     * @param DocMd  $docMd         The DocMd this instance belongs to
     */
    public function __construct($structurePath, DocMd $docMd)
    {
        $this->docMd = $docMd;
        $this->structurePath = $structurePath;
        $this->structureXml = simplexml_load_file($this->structurePath);
    }

    /**
     * Make.
     *
     * @param string $structurePath The path to the structure file
     * @param DocMd  $docMd         The DocMd this instance belongs to
     *
     * @return Structure
     */
    public static function make($structurePath, DocMd $docMd)
    {
        return new static($structurePath, $docMd);
    }

    /**
     * Return file to process.
     *
     * @return File[]
     */
    public function getFiles()
    {
        foreach ($this->structureXml->xpath('file') as $file) {
            yield new File($file, $this->docMd);
        }
    }
}
