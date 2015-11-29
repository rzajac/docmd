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
 * Helper for drawing markdown tables.
 *
 * @author Rafal Zajac <rzajac@gmail.com>
 */
class MdTable
{
    /**
     * Array of table rows.
     *
     * @var MdTableItf[]
     */
    protected $rows;

    /**
     * Requested number of table columns.
     *
     * @var int
     */
    protected $columnCount;

    /**
     * Maximum column length.
     *
     * @var int
     */
    protected $maxColumnLength;

    /**
     * Do create markdown anchors.
     *
     * @var bool
     */
    protected $anchor = true;

    /**
     * Constructor.
     *
     * @param MdTableItf[] $rows            The array of rows
     * @param int          $columnCount     The requested column count
     * @param int          $maxColumnLength The maximum column length
     * @param bool         $anchor          When true the value in table will point to anchor by the same name
     */
    public function __construct($rows, $columnCount, $maxColumnLength, $anchor = true)
    {
        $this->rows = $rows;
        $this->columnCount = $columnCount;
        $this->anchor = $anchor;

        if ($this->anchor) {
            $this->maxColumnLength = $maxColumnLength * 2 + 4;
        } else {
            $this->maxColumnLength = $maxColumnLength;
        }
    }

    /**
     * Make.
     *
     * @param MdTableItf[] $rows            The array of rows
     * @param int          $columnCount     The requested column count
     * @param int          $maxColumnLength The maximum column length
     *
     * @return MdTable
     */
    public static function make($rows, $columnCount, $maxColumnLength)
    {
        return new static($rows, $columnCount, $maxColumnLength);
    }

    /**
     * Return table header.
     */
    public function getHeader()
    {
        $dashes = str_repeat('-', $this->maxColumnLength - 2);
        $spaces = str_repeat(' ', $this->maxColumnLength);

        $ret = '|'.str_repeat($spaces.'|', $this->columnCount)."\n";
        $ret = $ret.'| '.str_repeat($dashes.' | ', $this->columnCount);

        return trim($ret);
    }

    /**
     * Return method table.
     *
     * @return MdTableItf
     */
    public function getRows()
    {
        $table = [];

        $cellCount = count($this->rows);

        $emptyCellCount = $this->columnCount - ($cellCount % $this->columnCount);
        if ($this->columnCount === $emptyCellCount) {
            $emptyCellCount = 0;
        }

        if ($emptyCellCount != 0) {
            $this->rows = array_pad($this->rows, $cellCount + $emptyCellCount, new EmptyTableCell());
            $cellCount += $emptyCellCount;
        }

        $currRow = -1;
        for ($i = 0; $i < $cellCount; ++$i) {
            $rowStart = true;
            $cellStr = '';
            $rowIdx = $i % $this->columnCount;

            if ($rowIdx == 0) {
                ++$currRow;
                $rowStart = true;
            } else {
                $rowStart = false;
            }

            $colIdx = $rowIdx * $this->columnCount + $i;

            if ($this->anchor) {
                $cellStr = Tools::mdAnchor($this->rows[$i]->getCellValue(), $this->rows[$i]->getCellValue());
            }

            $cellStr = str_pad($cellStr, $this->maxColumnLength, ' ', STR_PAD_BOTH).'|';

            if (($i + 1) % $this->columnCount === 0) {
                $cellStr = $cellStr."\n";
            }

            if ($rowStart) {
                $cellStr = '|'.$cellStr;
            }

            $table[$currRow][$colIdx] = $cellStr;
        }

        return $table;
    }
}
