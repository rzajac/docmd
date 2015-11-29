## Class Kicaj\DocMd\MdTag
MdTag.

## Extends

- Kicaj\DocMd\AbsMdElement

## Constants

```php
const TYPE_VAR = 'var';
const TYPE_PARAM = 'param';
const TYPE_THROWS = 'throws';
const TYPE_AUTHOR = 'author';
const TYPE_RETURN = 'return';
const TYPE_UNKNOWN = '__unknown__';
```

## Methods

|                                        |                                        |                                        |                                        |
| -------------------------------------- | -------------------------------------- | -------------------------------------- | -------------------------------------- |
          [getName](#getname)           |          [getType](#gettype)           |[getDescriptionProp](#getdescriptionprop)|   [getPhpTypeProp](#getphptypeprop)    |
   [getVarNameProp](#getvarnameprop)    |                 [](#)                  |                 [](#)                  |                 [](#)                  |

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
#### getName
Tag name.
```php
public function getName() : string
```

Returns: **string**

-------
#### getType
Get tag type.
```php
public function getType() : string
```

Returns: **string** - The one of self::TYPE_* constants

-------
#### getDescriptionProp
Return description property.
```php
public function getDescriptionProp() : string
```

Returns: **string**

-------
#### getPhpTypeProp
Return PHP type property.
```php
public function getPhpTypeProp() : string
```

Returns: **string**

-------
#### getVarNameProp
Return variable name property.
```php
public function getVarNameProp() : string
```

Returns: **string**

-------
