## Class Kicaj\DocMd\Tools
Tools.

## Methods

|                              |                              |                              |                              |                              |
| ---------------------------- | ---------------------------- | ---------------------------- | ---------------------------- | ---------------------------- |
     [fixDesc](#fixdesc)      |    [mdAnchor](#mdanchor)     | [getFileLink](#getfilelink)  |[getMdFileName](#getmdfilename)|  [fixVarType](#fixvartype)   |

-------
## Methods
#### fixDesc
Fix description string.
```php
public static function fixDesc(string $description) : string
```
Arguments:
- _$description_ **string** - The description

Returns: **string**

-------
#### mdAnchor
Create markdown anchor.
```php
public static function mdAnchor(string $name, string $anchor, boolean $addHash) : string
```
Arguments:
- _$name_ **string**
- _$anchor_ **string**
- _$addHash_ **boolean**

Returns: **string**

-------
#### getFileLink
Get file markdown link.
```php
public static function getFileLink(string $classFullName) : string
```
Arguments:
- _$classFullName_ **string** - The fully qualified class name

Returns: **string**

-------
#### getMdFileName
Return markdown file name.
```php
public static function getMdFileName(string $classFullName) : string
```
Arguments:
- _$classFullName_ **string** - The fully qualified class name

Returns: **string**

-------
#### fixVarType

```php
public static function fixVarType() : 
```

-------
