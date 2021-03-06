## Class Kicaj\DocMd\File
File entry in structure.xml file.

## Extends

- Kicaj\DocMd\AbsMdElement

## Constants

```php
const TYPE_CLASS = 'Class';
const TYPE_TRAIT = 'Trait';
const TYPE_INTERFACE = 'Interface';
```

## Methods

|                        |                        |
| ---------------------- | ---------------------- |
| [getClass](#getclass)  |  [getType](#gettype)   |

## Properties

|                    |                    |
| ------------------ | ------------------ |
|   [$elem](#elem)   |  [$docMd](#docmd)  |

-------

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
#### getClass
Get class object.
```php
public function getClass() : Kicaj\DocMd\MdClass|\Kicaj\DocMd\MdInterface|\Kicaj\DocMd\MdTrait
```

Throws:
- [Kicaj\DocMd\DocMdException](Kicaj-DocMd-DocMdException.md)

Returns: **Kicaj\DocMd\MdClass|\Kicaj\DocMd\MdInterface|\Kicaj\DocMd\MdTrait**

-------
#### getType
Return type of the class this file entry describes.
```php
public function getType() : string
```

Throws:
- [Kicaj\DocMd\DocMdException](Kicaj-DocMd-DocMdException.md)

Returns: **string** - The one of self::TYPE_* constants

-------
