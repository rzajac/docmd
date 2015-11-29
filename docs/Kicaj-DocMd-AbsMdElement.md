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
public function __construct(\SimpleXMLElement $elem, \Kicaj\DocMd\DocMd $docMd) : 
```
Arguments:
- _$elem_ **\SimpleXMLElement** - The XML element, 
- _$docMd_ **\Kicaj\DocMd\DocMd** - The DocMd this instance belongs to

-------
#### make
Make.
```php
public static function make(\SimpleXMLElement $elem, \Kicaj\DocMd\DocMd $docMd) : \Kicaj\DocMd\MdArgument
```
Arguments:
- _$elem_ **\SimpleXMLElement** - The XML element describing argument, 
- _$docMd_ **\Kicaj\DocMd\DocMd** - The DocMd this instance belongs to

Returns: **\Kicaj\DocMd\MdArgument**

-------
#### getName
Return element name.
```php
public function getName() : string
```

Returns: **string**

-------
#### getFileLink
Return link to element.
```php
public function getFileLink() : string
```

Returns: **string**

-------
#### getFullName
Return element name with PHP namespace.
```php
public function getFullName() : string
```

Returns: **string**

-------
#### isInherited
If element inherited.
```php
public function isInherited() : string
```

Returns: **string**

-------
#### getInheritedFrom
Return element inherited form.
```php
public function getInheritedFrom() : string
```

Returns: **string**

-------
#### getNameSpace
Return element PHP namespace.
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

Returns: **string**

-------
#### getFinal
Return final.
```php
public function getFinal() : string
```

Returns: **string**

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
Get element path.
```php
public function getPath() : string
```

Returns: **string**

-------
#### getVisibility
Return method visibility.
```php
public function getVisibility() : string
```

Returns: **string**

-------
#### getStatic
Return method visibility.
```php
public function getStatic() : string
```

Returns: **string**

-------
