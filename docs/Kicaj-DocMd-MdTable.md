## Class Kicaj\DocMd\MdTable
Helper for drawing markdown tables.

## Methods

|                              |                              |                              |                              |
| ---------------------------- | ---------------------------- | ---------------------------- | ---------------------------- |
| [__construct](#__construct)  |        [make](#make)         |   [getHeader](#getheader)    |     [getRows](#getrows)      |

## Properties

|                                        |                                        |                                        |                                        |
| -------------------------------------- | -------------------------------------- | -------------------------------------- | -------------------------------------- |
|             [$rows](#rows)             |      [$columnCount](#columncount)      |  [$maxColumnLength](#maxcolumnlength)  |           [$anchor](#anchor)           |

-------

#### $rows
Array of table rows.

```php
protected \Kicaj\DocMd\MdTableItf[] $rows
```

#### $columnCount
Requested number of table columns.

```php
protected integer $columnCount
```

#### $maxColumnLength
Maximum column length.

```php
protected integer $maxColumnLength
```

#### $anchor
Do create markdown anchors.

```php
protected boolean $anchor = true
```

-------
## Methods
#### __construct
Constructor.
```php
public function __construct(\Kicaj\DocMd\MdTableItf[] $rows, integer $columnCount, integer $maxColumnLength, boolean $anchor) : 
```
Arguments:
- _$rows_ **\Kicaj\DocMd\MdTableItf[]** - The array of rows, 
- _$columnCount_ **integer** - The requested column count, 
- _$maxColumnLength_ **integer** - The maximum column length, 
- _$anchor_ **boolean** - When true the value in table will point to anchor by the same name

-------
#### make
Make.
```php
public static function make(\Kicaj\DocMd\MdTableItf[] $rows, integer $columnCount, integer $maxColumnLength) : \Kicaj\DocMd\MdTable
```
Arguments:
- _$rows_ **\Kicaj\DocMd\MdTableItf[]** - The array of rows, 
- _$columnCount_ **integer** - The requested column count, 
- _$maxColumnLength_ **integer** - The maximum column length

Returns: **\Kicaj\DocMd\MdTable**

-------
#### getHeader
Return table header.
```php
public function getHeader() : 
```

-------
#### getRows
Return method table.
```php
public function getRows() : \Kicaj\DocMd\MdTableItf
```

Returns: **\Kicaj\DocMd\MdTableItf**

-------
