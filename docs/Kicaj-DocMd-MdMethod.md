## Class Kicaj\DocMd\MdMethod
Class method.

## Extends

- Kicaj\DocMd\AbsMdElement

## Implements

- [Kicaj\DocMd\MdTableItf](Kicaj-DocMd-MdTableItf.md)

## Methods

|                                    |                                    |                                    |                                    |
| ---------------------------------- | ---------------------------------- | ---------------------------------- | ---------------------------------- |
   [getArguments](#getarguments)    |        [getTags](#gettags)         |   [getCellValue](#getcellvalue)    |[getReturnPhpType](#getreturnphptype)|
   [getReturnTag](#getreturntag)    |      [getThrows](#getthrows)       |               [](#)                |               [](#)                |

## Properties

|                        |                        |                        |                        |                        |                        |
| ---------------------- | ---------------------- | ---------------------- | ---------------------- | ---------------------- | ---------------------- |
[$arguments](#arguments)|   [$params](#params)   |   [$return](#return)   |   [$throws](#throws)   |     [$elem](#elem)     |    [$docMd](#docmd)    |

-------

#### $arguments
Method arguments.

```php
protected \SimpleXMLElement $arguments
```

#### $params
The PHPDoc param documentation tags for the method.

```php
protected \Kicaj\DocMd\MdTag[] $params
```

#### $return
The PHPDoc return documentation tags for the method.

```php
protected \Kicaj\DocMd\MdTag $return
```

#### $throws
The PHPDoc throws documentation tags for the method.

```php
protected \Kicaj\DocMd\MdTag[] $throws
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
#### getArguments
Get method arguments.
```php
public function getArguments() : \Kicaj\DocMd\MdArgument[]
```

Returns: **\Kicaj\DocMd\MdArgument[]**

-------
#### getTags
Get tags from method description.
```php
public function getTags() : \Kicaj\DocMd\MdTag[]
```

Returns: **\Kicaj\DocMd\MdTag[]**

-------
#### getCellValue
Get markdown to put in a table cell.
```php
public function getCellValue() : string
```

Returns: **string**

-------
#### getReturnPhpType
Method return type.
```php
public function getReturnPhpType() : string
```

Returns: **string**

-------
#### getReturnTag
Method return tag.
```php
public function getReturnTag() : \Kicaj\DocMd\MdTag
```

Returns: **\Kicaj\DocMd\MdTag**

-------
#### getThrows
Return method throws.
```php
public function getThrows() : \Kicaj\DocMd\MdTag[]
```

Returns: **\Kicaj\DocMd\MdTag[]**

-------
