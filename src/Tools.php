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
 * DocMd Tools.
 *
 * @author Rafal Zajac <rzajac@gmail.com>
 */
class Tools
{
    /**
     * Fix description string.
     *
     * @param string $description The description string
     *
     * @return string
     */
    public static function fixDesc($description)
    {
        $description = str_replace(['<em>', '</em>'], '_', $description);

        return strip_tags($description);
    }

    /**
     * Create markdown anchor.
     *
     * @param string $name    The name of the anchor
     * @param string $anchor  The anchor to link to
     * @param bool   $addHash Set to true to add # before $anchor
     *
     * @return string
     */
    public static function mdAnchor($name, $anchor, $addHash = true)
    {
        $format = $addHash ? '[%s](#%s)' : '[%s](%s)';
        $anchor = str_replace('$', '', $anchor);
        $anchor = str_replace(' ', '-', $anchor);

        return sprintf($format, $name, strtolower($anchor));
    }

    /**
     * Get markdown file link.
     *
     * @param string $classFullName The fully qualified class name
     *
     * @return string
     */
    public static function getFileLink($classFullName)
    {
        $fileName = self::getMdFileName($classFullName);

        return sprintf('[%s](%s)', $classFullName, $fileName);
    }

    /**
     * Return markdown file name.
     *
     * @param string $classFullName The fully qualified class name
     *
     * @return string
     */
    public static function getMdFileName($classFullName)
    {
        return ltrim(str_replace('\\', '-', $classFullName), '-').'.md';
    }

    /**
     * Fix type hint and return values.
     *
     * @param string $var The type hint or return value
     *
     * @return string
     */
    public static function fixTypeHint($var)
    {
        if (strpos($var, 'array<mixed,') !== false) {
            $var = str_replace('array<mixed,', '', $var);
            $var = rtrim($var, ' >').'[]';
        }

        return $var;
    }
}
