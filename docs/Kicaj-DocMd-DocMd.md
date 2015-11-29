## Class Kicaj\DocMd\DocMd


## Extends

- Symfony\Component\Console\Command\Command

## Methods

|                                          |                                          |                                          |                                          |
| ---------------------------------------- | ---------------------------------------- | ---------------------------------------- | ---------------------------------------- |
|         [configure](#configure)          |           [execute](#execute)            |       [parseConfig](#parseconfig)        |       [execute_old](#execute_old)        |
| [generateStructure](#generatestructure)  |      [generateDocs](#generatedocs)       |          [getClass](#getclass)           |           [getPath](#getpath)            |
|       [setDocMdDir](#setdocmddir)        |  [getStructurePath](#getstructurepath)   |                  [](#)                   |                  [](#)                   |

## Properties

|                                    |                                    |                                    |                                    |                                    |
| ---------------------------------- | ---------------------------------- | ---------------------------------- | ---------------------------------- | ---------------------------------- |
|       [$docMdDir](#docmddir)       |         [$tplDir](#tpldir)         |      [$configDir](#configdir)      |  [$structurePath](#structurepath)  |        [$classes](#classes)        |
|          [$index](#index)          |         [$config](#config)         |               [](#)                |               [](#)                |               [](#)                |

-------

#### $docMdDir
The root path for the DocMd project.

```php
protected string $docMdDir
```

#### $tplDir
The path to templates directory.

```php
protected string $tplDir
```

#### $configDir
The path where configure file was loaded from.

```php
protected string $configDir
```

#### $structurePath
The path to structure file.

```php
protected string $structurePath
```

#### $classes
Associative array of parsed classes.
[&#039;classFullName&#039; =&gt; MdClass]
```php
protected array $classes = array()
```

#### $index
Class index.

```php
protected array $index = array()
```

#### $config
DocMD configuration.

```php
protected array $config = array('tmp' => 'tmp', 'doc' => 'doc')
```

-------
## Methods
#### configure

```php
protected function configure() : 
```

-------
#### execute

```php
protected function execute() : 
```

-------
#### parseConfig

```php
protected function parseConfig() : 
```

-------
#### execute_old

```php
protected function execute_old() : 
```

-------
#### generateStructure

```php
protected function generateStructure() : 
```

-------
#### generateDocs
Generate markdown documentation.
```php
protected function generateDocs(\Kicaj\DocMd\Structure $structure, string $outputPath) : 
```
Arguments:
- _$structure_ **\Kicaj\DocMd\Structure**
- _$outputPath_ **string**

-------
#### getClass
Get class by full name.
```php
public function getClass(string $className) : \Kicaj\DocMd\MdClass|null
```
Arguments:
- _$className_ **string** - The calss FQN

Returns: **\Kicaj\DocMd\MdClass|null**

-------
#### getPath
Get path from relative path.
```php
public function getPath(string $path) : string
```
Arguments:
- _$path_ **string** - The path relative to docmd.json file

Returns: **string**

-------
#### setDocMdDir
Set DocMd project directory.
```php
public function setDocMdDir(string $projectDir) : 
```
Arguments:
- _$projectDir_ **string**

-------
#### getStructurePath
Return path to structure file.
```php
public function getStructurePath() : string
```

Returns: **string**

-------
