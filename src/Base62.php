<?php
/**
 * @Author : a.zinovyev
 * @Package: basen
 * @License: http://www.opensource.org/licenses/mit-license.php
 */

namespace PHPBaseN;

class Base62
{
    public const string ALPHABET = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    public const string ALPHABET_INVERTED = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

    public const array ALPHABETS = [
        self::ALPHABET,
        self::ALPHABET_INVERTED,
    ];

    use Traits\Encoder;

    private static function getBaseConverter(): BaseN
    {
        return self::$converter
            ?: self::$converter = new BaseN(self::ALPHABET, true);
    }
}
