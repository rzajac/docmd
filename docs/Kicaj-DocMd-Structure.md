## Class Kicaj\DocMd\Structure
Class describing phpdocumentor structure.xml.

## Methods

|                              |                              |                              |
| ---------------------------- | ---------------------------- | ---------------------------- |
| [__construct](#__construct)  |        [make](#make)         |    [getFiles](#getfiles)     |

## Properties

|                                    |                                    |                                    |
| ---------------------------------- | ---------------------------------- | ---------------------------------- |
|  [$structurePath](#structurepath)  |   [$structureXml](#structurexml)   |          [$docMd](#docmd)          |

-------

#### $structurePath
The path to the structure.xml file.

```php
protected string $structurePath
```

#### $structureXml
The parsed XML.

```php
protected \SimpleXMLElement $structureXml
```

#### $docMd
The DocMd this instance belongs to.

```php
protected \Kicaj\DocMd\DocMd $docMd
```

-------
## Methods
#### __construct
Constructor.
```php
public function __construct(string $structurePath, [Kicaj\DocMd\DocMd](Kicaj-DocMd-DocMd.md) $docMd) : 
```
Arguments:
- _$structurePath_ **string** - The path to the structure file, 
- _$docMd_ **[Kicaj\DocMd\DocMd](Kicaj-DocMd-DocMd.md)** - The DocMd this instance belongs to

-------
#### make
Make.
```php
public static function make(string $structurePath, [Kicaj\DocMd\DocMd](Kicaj-DocMd-DocMd.md) $docMd) : Kicaj\DocMd\Structure
```
Arguments:
- _$structurePath_ **string** - The path to the structure file, 
- _$docMd_ **[Kicaj\DocMd\DocMd](Kicaj-DocMd-DocMd.md)** - The DocMd this instance belongs to

Returns: **[Kicaj\DocMd\Structure](Kicaj-DocMd-Structure.md)**

-------
#### getFiles
Return file to process.
```php
public function getFiles() : \Kicaj\DocMd\File[]
```

Returns: **\Kicaj\DocMd\File[]**

-------
