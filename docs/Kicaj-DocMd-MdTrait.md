## Class Kicaj\DocMd\MdTrait
MdTrait.

## Extends

- Kicaj\DocMd\MdClass

## Constants

```php
const MAX_COLUMNS = 6;
```

## Methods

|                            |
| -------------------------- |
[getClassType](#getclasstype)|

## Properties

|                              |                              |                              |                              |                              |
| ---------------------------- | ---------------------------- | ---------------------------- | ---------------------------- | ---------------------------- |
        [$tags](#tags)        |   [$constants](#constants)   |  [$properties](#properties)  |     [$methods](#methods)     |[$inheritsFrom](#inheritsfrom)|
        [$elem](#elem)        |       [$docMd](#docmd)       |            [](#)             |            [](#)             |            [](#)             |

-------

#### $tags
Class description tags.

```php
protected \Kicaj\DocMd\MdTag[] $tags
```

#### $constants
Class constants.

```php
protected \Kicaj\DocMd\MdConst[] $constants
```

#### $properties
Class properties.

```php
protected \Kicaj\DocMd\MdProp[] $properties
```

#### $methods
Class methods.

```php
protected \Kicaj\DocMd\MdMethod[] $methods
```

#### $inheritsFrom
List of all classes that this class inherits from.

```php
protected string $inheritsFrom = array('props' => array(), 'methods' => array())
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
#### getClassType
Get file type.
```php
public function getClassType() : string
```

Returns: **string**

-------
