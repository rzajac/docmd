## Class Kicaj\DocMd\MdArgument
Method argument.

## Extends

- Kicaj\DocMd\AbsMdElement

## Methods

|                        |                        |                        |                        |
| ---------------------- | ---------------------- | ---------------------- | ---------------------- |
[getPhpType](#getphptype)|[setPhpType](#setphptype)|   [setTag](#settag)    |   [getTag](#gettag)    |

## Properties

|                    |                    |                    |                    |
| ------------------ | ------------------ | ------------------ | ------------------ |
[$phpType](#phptype)|    [$tag](#tag)    |   [$elem](#elem)   |  [$docMd](#docmd)  |

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
Return element name.
```php
public function getPhpType() : string
```

Returns: **string**

-------
#### setPhpType
Set PHP type for this argument.
```php
public function setPhpType(string $phpType) : \Kicaj\DocMd\MdArgument
```
Arguments:
- _$phpType_ **string**

Returns: **\Kicaj\DocMd\MdArgument**

-------
#### setTag
Set the PHPDoc param tag associated with this argument.
```php
public function setTag(\Kicaj\DocMd\MdTag $tag) : \Kicaj\DocMd\MdArgument
```
Arguments:
- _$tag_ **\Kicaj\DocMd\MdTag**

Returns: **\Kicaj\DocMd\MdArgument**

-------
#### getTag
Return the PHPDoc param tag associated with this argument.
```php
public function getTag() : \Kicaj\DocMd\MdTag
```

Returns: **\Kicaj\DocMd\MdTag**

-------
