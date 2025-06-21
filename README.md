# PHPBaseN

[![License](http://poser.pugx.org/chongyi/php-basen/license)](https://packagist.org/packages/chongyi/php-basen)
[![Build Status](https://github.com/chongyi/php-basen/actions/workflows/ci.yml/badge.svg)](https://github.com/chongyi/php-basen/actions/workflows/ci.yml)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/408ab0faf6d64260bde1999bcd7ade0b)](https://app.codacy.com/gh/chongyi/php-basen/dashboard?utm_source=gh&utm_medium=referral&utm_content=&utm_campaign=Badge_grade)
[![Codacy Badge](https://app.codacy.com/project/badge/Coverage/408ab0faf6d64260bde1999bcd7ade0b)](https://app.codacy.com/gh/chongyi/php-basen/dashboard?utm_source=gh&utm_medium=referral&utm_content=&utm_campaign=Badge_coverage)
[![Latest Stable Version](http://poser.pugx.org/chongyi/php-basen/v)](https://packagist.org/packages/chongyi/php-basen)
[![Total Downloads](http://poser.pugx.org/chongyi/php-basen/downloads)](https://packagist.org/packages/chongyi/php-basen)

## Credits
This repository is a fork from original [xobotyi/basen](https://github.com/xobotyi/basen), because original repository is not maintained anymore.

## About
PHP is a great language but unfortunately provides us with only one text encoding (base64) which even not URL safe. And there are no straight way to change its alphabet.  
BaseN solves that problem and implements common binary-to-text algorithm for encodings whose alphabet fully covers number of bits that corresponds its length. And rough algorithm which will encode each byte separately, it is less compact but guarantee the encoding with given alphabet.  
Furthermore it gives you methods to encode and decode integers themselves instead of their text representation.

## Requirements
- [PHP](//php.net/) 8.3+

## Installation
Install with composer
```bash
composer require chongyi/php-basen
```

## Usage
```php
use PHPBaseN\BaseN;
use PHPBaseN\Base58;

// use it for something usual
$base8 = new BaseN('01234567', false, false, false);
echo $base8->encode(16) . "\n"; // 142330
echo $base8->encodeInt(16) . "\n"; // 20

// or create your own encoder with own alphabet if needed
$myOwnEncoder = new BaseN('a123d8e4fiwnmqkl', false, true, true);
echo $myOwnEncoder->encode(16) . "\n"; // 313e
echo $myOwnEncoder->encodeInt(16) . "\n"; // 1a

// predefined encoder
echo Base58::encode(16) . "\n"; // 3hC
// or, with alternative alphabet
echo Base58::encode(16, Base58::ALPHABET_RIPPLE) . "\n"; // hkD
echo Base58::encodeInt(16) . "\n"; // G
```

## Builtin encodings
BaseN provides few classes implementing most popular encodings: 
 - [Base16](https://en.wikipedia.org/wiki/Base16) (0-9a-f)
 - [Base32](https://en.wikipedia.org/wiki/Base32) (a-z2-7)
 - [Base36](https://en.wikipedia.org/wiki/Base36) (0-9a-z)
 - [Base58](https://en.wikipedia.org/wiki/Base58) (0-9A-Za-v)
 - Base62 (0-9A-Za-z)
 - [Base64](https://en.wikipedia.org/wiki/Base64) (0-9A-Za-z+/)
 - [Base85](https://en.wikipedia.org/wiki/Base85) (!"#$%&'()*+,-./0-9:;<=>?@A-Z[\]^_`a-u)