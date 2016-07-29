## Class Kicaj\DocMd\Tools
DocMd Tools.

## Methods

|                                  |                                  |                                  |                                  |                                  |
| -------------------------------- | -------------------------------- | -------------------------------- | -------------------------------- | -------------------------------- |
|       [fixDesc](#fixdesc)        |      [mdAnchor](#mdanchor)       |   [getFileLink](#getfilelink)    | [getMdFileName](#getmdfilename)  |   [fixTypeHint](#fixtypehint)    |

-------
## Methods
#### fixDesc
Fix description string.
```php
public static function fixDesc(string $description) : string
```
Arguments:
- _$description_ **string** - The description string

Returns: **string**

-------
#### mdAnchor
Create markdown anchor.
```php
public static function mdAnchor(string $name, string $anchor, boolean $addHash) : string
```
Arguments:
- _$name_ **string** - The name of the anchor, 
- _$anchor_ **string** - The anchor to link to, 
- _$addHash_ **boolean** - Set to true to add # before $anchor

Returns: **string**

-------
#### getFileLink
Get markdown file link.
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
#### fixTypeHint
Fix type hint and return values.
```php
public static function fixTypeHint(string $var) : string
```
Arguments:
- _$var_ **string** - The type hint or return value

Returns: **string**

-------
