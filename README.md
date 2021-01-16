# codekandis/code-message-interpreter

[![Version][xtlink-version-badge]][srclink-changelog]
[![License][xtlink-license-badge]][srclink-license]
[![Minimum PHP Version][xtlink-php-version-badge]][xtlink-php-net]
![Code Coverage][xtlink-code-coverage-badge]

> **_NOTE:_** This package is abandoned and no longer maintained. It has been superseded by the package [`codekandis/constants-classes-translator`][xtlink-codekandis-constants-classes-translator].

With the [`CodeMessageInterpreter`][srclink-code-message-interpreter] you are able to translate codes into readable messages. E. g. is useful with third party libraries throwing exceptions with error codes but without meaningful messages.

## Index

* [Installation](#installation)
* [How to use](#how-to-use)
* [Exceptions](#exceptions)

## Installation

Install the latest version with

```bash
$ composer require codekandis/code-message-interpreter
```

## How to use

### Define the codes and messages

```php
abstract class ErrorCodes
{
    public const ERROR_ONE   = 1;
    public const ERROR_TWO   = 2;
    public const ERROR_THREE = 3;
}

abstract class ErrorMessages
{
    public const ERROR_ONE   = 'Error one occurred.';
    public const ERROR_TWO   = 'Error two occurred.';
    public const ERROR_THREE = 'Error three occurred.';
}
```

### Instantiate and the [`CodeMessageInterpreter`][srclink-code-message-interpreter]

```php
/** returns 'Error two occurred.' */
( new CodeMessageInterpreter( ErrorCodes::class, ErrorMessages::class ) )
    ->interpret( ErrorCodes::ERROR_TWO );
```

## Exceptions

The [`CodeMessageInterpreter`][srclink-code-message-interpreter] throws an [`CodeMessageInterpreterException`][srclink-code-message-interpreter-exception] in several cases.

- the passed codes or messages class names are invalid
- the code to interpret does not exist 
- the code to interpret does not have a corresponding message 



[xtlink-version-badge]: https://img.shields.io/badge/version-1.0.0-blue.svg
[xtlink-license-badge]: https://img.shields.io/badge/license-MIT-yellow.svg
[xtlink-php-version-badge]: https://img.shields.io/badge/php-%3E%3D%207.3-8892BF.svg
[xtlink-code-coverage-badge]: https://img.shields.io/badge/coverage-100%25-green.svg
[xtlink-php-net]: https://php.net
[xtlink-codekandis-constants-classes-translator]: https://github.com/codekandis/constants-classes-translator

[srclink-changelog]: ./CHANGELOG.md
[srclink-license]: ./LICENSE
[srclink-code-message-interpreter]: ./src/CodeMessageInterpreter.php
[srclink-code-message-interpreter-exception]: ./src/CodeMessageInterpreterException.php
