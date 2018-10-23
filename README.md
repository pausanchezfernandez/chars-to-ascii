# Chars to ASCII 
## Requirements
- - - -

* PHP ^7.2.0
* Composer



## Installation
- - - -
_Access inside the project folder_

`cd technical-test-mediaadgo`

_You need to install the packages from composer_

`composer install`

_You can initialize the symfony server to see the exercises performed_

`php bin/console server:start`

## Running the tests
- - - -

`./bin/phpunit tests/Ascii`

## Use the commands
- - - -
### Character to Ascii

_If you want to see by character their ASCII codes_

`php bin/console ascii:character-to-ascii {word}`

_Example_

`php bin/console ascii:character-to-ascii playstation`

### Delete word

/You need to add a correct uuid /

`php bin/console ascii:delete-register {uuid}`

_Example_

`php bin/console ascii:delete-register 832bcccd-b149-43fa-a496-f193fca36f82`

## Built with
- - - -
* [Symfony 4.1.6](https://github.com/symfony/symfony)
* [portphp/csv](https://github.com/portphp/csv)
* [ramsey/uuid](https://github.com/ramsey/uuid)

## Things that are missing
- - - -
* Create more tests
* Create more exceptions
* Don't use Symfony exceptions