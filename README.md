# Super objects

* [Introduction](#introduction)
* [Installation](#installation)
* [Usage](#usage)
    * [Basic syntax](#basic-syntax)
* [License](#license)

## Introduction

`osmianski/super-objects` package provides a base class for creating super objects in PHP. How a super object is different from its "traditional" counterpart: 

1. Its "lazy" properties are computed only once and only when they are accessed. Lazy properties, among other things, make dependency injection blazing fast and elegant.
2. :) more features to come :)   

## Installation

In the project directory, run:

```bash  
composer require osmianski/super-objects
```

## Usage

### Basic syntax

As in the following example, extend the `SuperObject` class, define a property in the class comment, and getter that computes it:

```php
use Osmianski\SuperObjects\SuperObject;
...
/**
 * @property string $message
 */
class Foo extends SuperObject
{
    protected function get_message(): string {
        return 'Hello, world!';
    }
}
```

The first time you access the property, it's created and assigned the value returned by the getter. On subsequent property access, the getter is not executed - the already stored value is returned:

```php
$foo = new Foo();

// executing the getter
echo $foo->message;

// using the stored value
echo $foo->message;
```

Alternatively, pass property value in the constructor:

```php
$foo = new Foo(['message' => 'custom message']);

// prints the custom message
echo $foo->message;
```

If you expect the value to be passed in the constructor, throw the `Required` exception:

```php
use Osmianski\SuperObjects\Exceptions\Required;
...
/**
 * @property string $message
 */
class Foo extends SuperObject
{
    protected function get_message(): string {
        throw new Required(__METHOD__);
    }
}
```
 
## License

`osmianski/super-objects` package is open-sourced software licensed under the [MIT license](LICENSE.md).

