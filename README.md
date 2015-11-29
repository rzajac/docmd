## DocMd

Tool generating linked `github.com` flavored markdown documentation for PHP source.
  
## Installation

Composer install:

```json
{
    "require": {
        "rzajac/docmd": "0.1.*"
    }
}
```

Composer globally:

```
$ composer global require rzajac/docmd
```

## How to use

```
$ docmd generate -h
Usage:
  generate [options]

Options:
  -c, --config[=CONFIG]  The path to docmd.json. If not set it will search for docmd.json in current directory
  -h, --help             Display this help message
  -q, --quiet            Do not output any message
  -V, --version          Display this application version
      --ansi             Force ANSI output
      --no-ansi          Disable ANSI output
  -n, --no-interaction   Do not ask any interactive question
  -v|vv|vvv, --verbose   Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Help:
 Generate markdown documentation
```

## Config file

The config is in JSON format.

```json
{
  "tmp": "path/to/tmp/directory",
  "doc": "path/where/to/put/documentation",
  "src": "path/to/source/you/wish/to/generate/documentation/for",
  "project_name": "Name of your project"
}
```

All paths in this file must be relative to `docmd.json` file.

## Examples

- [DocMd documentation](docs/index.md)
- [PHP Tools documentation](https://github.com/rzajac/phptools/blob/master/docs/index.md)
