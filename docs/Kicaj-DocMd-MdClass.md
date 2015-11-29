## Class Kicaj\DocMd\MdClass
MdClass.

## Extends

- Kicaj\DocMd\AbsMdElement

## Constants

```php
const MAX_COLUMNS = 6;
```

## Methods

|                                        |                                        |                                        |                                        |
| -------------------------------------- | -------------------------------------- | -------------------------------------- | -------------------------------------- |
     [getClassType](#getclasstype)      |   [getClassHeader](#getclassheader)    |    [getMdFileName](#getmdfilename)     |          [getTags](#gettags)           |
       [usesTraits](#usestraits)        |       [getExtends](#getextends)        |    [getImplements](#getimplements)     |     [getConstants](#getconstants)      |
    [getProperties](#getproperties)     |       [getMethods](#getmethods)        |  [getMethodsTable](#getmethodstable)   |[getPropertiesTable](#getpropertiestable)|
       [buildTable](#buildtable)        |                 [](#)                  |                 [](#)                  |                 [](#)                  |

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
Get class type.
```php
public function getClassType() : string
```

Returns: **string**

-------
#### getClassHeader
Get class markdown header.
```php
public function getClassHeader() : string
```

Returns: **string**

-------
#### getMdFileName
Return markdown file name.
```php
public function getMdFileName() : string
```

Returns: **string**

-------
#### getTags
Get PHPDoc tags from class description.
```php
public function getTags() : \Kicaj\DocMd\MdTag[]
```

Returns: **\Kicaj\DocMd\MdTag[]**

-------
#### usesTraits
Returns array of trait names this class uses.
```php
public function usesTraits() : array
```

Returns: **array**

-------
#### getExtends
Get extended class names.

Interfaces in PHP can have multiple inheritance.
```php
public function getExtends() : string[]
```

Returns: **string[]**

-------
#### getImplements
Get implemented interfaces.
```php
public function getImplements() : string[]
```

Returns: **string[]**

-------
#### getConstants
Get declared constants.
```php
public function getConstants() : \Kicaj\DocMd\MdConst[]
```

Returns: **\Kicaj\DocMd\MdConst[]**

-------
#### getProperties
Get class properties.
```php
public function getProperties() : \Kicaj\DocMd\MdProp[]
```

Returns: **\Kicaj\DocMd\MdProp[]**

-------
#### getMethods
Get class methods.
```php
public function getMethods() : \Kicaj\DocMd\MdMethod[]
```

Returns: **\Kicaj\DocMd\MdMethod[]**

-------
#### getMethodsTable
Return MdTable describing methods.
```php
public function getMethodsTable() : \Kicaj\DocMd\MdTable
```

Returns: **\Kicaj\DocMd\MdTable**

-------
#### getPropertiesTable
Return MdTable describing properties.
```php
public function getPropertiesTable() : \Kicaj\DocMd\MdTable
```

Returns: **\Kicaj\DocMd\MdTable**

-------
#### buildTable
Build markdown table.
```php
protected function buildTable(\Kicaj\DocMd\MdTableItf[] $rows) : \Kicaj\DocMd\MdTable
```
Arguments:
- _$rows_ **\Kicaj\DocMd\MdTableItf[]**

Returns: **\Kicaj\DocMd\MdTable**

-------
