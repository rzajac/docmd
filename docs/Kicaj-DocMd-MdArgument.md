## Class Kicaj\DocMd\MdArgument
Method argument.

## Extends

- Kicaj\DocMd\AbsMdElement

## Methods

|                            |                            |                            |                            |
| -------------------------- | -------------------------- | -------------------------- | -------------------------- |
| [getPhpType](#getphptype)  | [setPhpType](#setphptype)  |     [setTag](#settag)      |     [getTag](#gettag)      |

## Properties

|                        |                        |                        |                        |
| ---------------------- | ---------------------- | ---------------------- | ---------------------- |
|  [$phpType](#phptype)  |      [$tag](#tag)      |     [$elem](#elem)     |    [$docMd](#docmd)    |

-------

#### $phpType
The PHP type of this argument.

```php
protected string $phpType
```

#### $tag
The PHPDoc param tag associated with this argument.

```php
protected \Kicaj\DocMd\MdTag $tag
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
#### getPhpType
Return PHP type of the element.
```php
public function getPhpType() : string
```

Returns: **string**

-------
#### setPhpType
Set PHP type for this argument.
```php
public function setPhpType(string $phpType) : Kicaj\DocMd\MdArgument
```
Arguments:
- _$phpType_ **string**

Returns: **[Kicaj\DocMd\MdArgument](Kicaj-DocMd-MdArgument.md)**

-------
#### setTag
Set the PHPDoc param tag associated with this argument.
```php
public function setTag([Kicaj\DocMd\MdTag](Kicaj-DocMd-MdTag.md) $tag) : Kicaj\DocMd\MdArgument
```
Arguments:
- _$tag_ **[Kicaj\DocMd\MdTag](Kicaj-DocMd-MdTag.md)**

Returns: **[Kicaj\DocMd\MdArgument](Kicaj-DocMd-MdArgument.md)**

-------
#### getTag
Return the PHPDoc param tag associated with this argument.
```php
public function getTag() : Kicaj\DocMd\MdTag
```

Returns: **[Kicaj\DocMd\MdTag](Kicaj-DocMd-MdTag.md)**

-------
