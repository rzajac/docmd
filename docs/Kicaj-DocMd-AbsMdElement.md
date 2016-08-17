## Class Kicaj\DocMd\AbsMdElement
Abstract markdown element.

## Methods

|                                            |                                            |                                            |                                            |
| ------------------------------------------ | ------------------------------------------ | ------------------------------------------ | ------------------------------------------ |
|        [__construct](#__construct)         |               [make](#make)                |            [getName](#getname)             |        [getFileLink](#getfilelink)         |
|        [getFullName](#getfullname)         |        [isInherited](#isinherited)         |   [getInheritedFrom](#getinheritedfrom)    |       [getNameSpace](#getnamespace)        |
|        [getAbstract](#getabstract)         |           [getFinal](#getfinal)            |            [getLine](#getline)             |     [getDescription](#getdescription)      |
| [getLongDescription](#getlongdescription)  |            [getPath](#getpath)             |      [getVisibility](#getvisibility)       |          [getStatic](#getstatic)           |

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
#### __construct
Constructor.
```php
public function __construct(SimpleXMLElement $elem, [Kicaj\DocMd\DocMd](Kicaj-DocMd-DocMd.md) $docMd) : 
```
Arguments:
- _$elem_ **SimpleXMLElement** - The XML element, 
- _$docMd_ **[Kicaj\DocMd\DocMd](Kicaj-DocMd-DocMd.md)** - The DocMd this instance belongs to

-------
#### make
Make.
```php
public static function make(SimpleXMLElement $elem, [Kicaj\DocMd\DocMd](Kicaj-DocMd-DocMd.md) $docMd) : Kicaj\DocMd\AbsMdElement
```
Arguments:
- _$elem_ **SimpleXMLElement** - The XML element describing argument, 
- _$docMd_ **[Kicaj\DocMd\DocMd](Kicaj-DocMd-DocMd.md)** - The DocMd this instance belongs to

Returns: **[Kicaj\DocMd\AbsMdElement](Kicaj-DocMd-AbsMdElement.md)**

-------
#### getName
Return element name.
```php
public function getName() : string
```

Returns: **string**

-------
#### getFileLink
Return file link to the element.
```php
public function getFileLink() : string
```

Returns: **string**

-------
#### getFullName
Return the element name with PHP namespace.
```php
public function getFullName() : string
```

Returns: **string**

-------
#### isInherited
Is the element inherited.
```php
public function isInherited() : string
```

Returns: **string**

-------
#### getInheritedFrom
Return class with namespace the element inherits from.
```php
public function getInheritedFrom() : string
```

Returns: **string** - Returns empty string if element is not inherited

-------
#### getNameSpace
Return the element namespace.
```php
public function getNameSpace() : string
```

Returns: **string**

-------
#### getAbstract
Return abstract.
```php
public function getAbstract() : string
```

Returns: **string** - Returns empty string if element is not abstract

-------
#### getFinal
Return final.
```php
public function getFinal() : string
```

Returns: **string** - Returns empty string if element is not final

-------
#### getLine
Get the line declaration starts.
```php
public function getLine() : integer
```

Returns: **integer**

-------
#### getDescription
Return short element description.
```php
public function getDescription() : string
```

Returns: **string**

-------
#### getLongDescription
Return long element description.
```php
public function getLongDescription() : string
```

Returns: **string**

-------
#### getPath
Get element filesystem path.
```php
public function getPath() : string
```

Returns: **string**

-------
#### getVisibility
Return element visibility.
```php
public function getVisibility() : string
```

Returns: **string**

-------
#### getStatic
Return static.
```php
public function getStatic() : string
```

Returns: **string** - Returns empty string if element is not static

-------
