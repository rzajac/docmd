## Class Kicaj\DocMd\File
File.

## Extends

- Kicaj\DocMd\AbsMdElement

## Constants

```php
const TYPE_CLASS = 'Class';
const TYPE_TRAIT = 'Trait';
const TYPE_INTERFACE = 'Interface';
```

## Methods

|                    |                    |
| ------------------ | ------------------ |
[getClass](#getclass)|[getType](#gettype) |

## Properties

|                |                |
| -------------- | -------------- |
 [$elem](#elem) |[$docMd](#docmd)|

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
public function getClass() : \Kicaj\DocMd\MdClass|\Kicaj\DocMd\MdInterface|\Kicaj\DocMd\MdTrait
```

Throws:
- \Kicaj\Tools\Exception

Returns: **\Kicaj\DocMd\MdClass|\Kicaj\DocMd\MdInterface|\Kicaj\DocMd\MdTrait**

-------
#### getType
Get file type.
```php
public function getType() : string
```

Throws:
- \Kicaj\Tools\Exception

Returns: **string** - The one of self::TYPE_* constants

-------
