## Class Kicaj\DocMd\MdProp
Class describing PHP class property.

## Extends

- Kicaj\DocMd\AbsMdElement

## Implements

- [Kicaj\DocMd\MdTableItf](Kicaj-DocMd-MdTableItf.md)

## Methods

|                                      |                                      |                                      |                                      |
| ------------------------------------ | ------------------------------------ | ------------------------------------ | ------------------------------------ |
|         [getTags](#gettags)          |      [getPhpType](#getphptype)       |    [getCellValue](#getcellvalue)     | [getDefaultValue](#getdefaultvalue)  |

## Properties

|                    |                    |                    |
| ------------------ | ------------------ | ------------------ |
|   [$tags](#tags)   |   [$elem](#elem)   |  [$docMd](#docmd)  |

-------

#### $tags
Property tags.

```php
protected \Kicaj\DocMd\MdTag[] $tags
```

#### $elem
XML element.

```php
protected \SimpleXMLElement $elem
```

#### $docMd
The DocMd instance this element belongs to.

```php
protected \Kicaj\DocMd\DocMd $docMd
```

-------
## Methods
#### getTags
Get tags from class description.
```php
public function getTags() : \Kicaj\DocMd\MdTag[]
```

Returns: **\Kicaj\DocMd\MdTag[]**

-------
#### getPhpType
Get property type.
```php
public function getPhpType() : string
```

Returns: **string**

-------
#### getCellValue
Get markdown to put in a table cell.
```php
public function getCellValue() : string
```

Returns: **string**

-------
#### getDefaultValue
Return default value.
```php
public function getDefaultValue() : string
```

Returns: **string**

-------
