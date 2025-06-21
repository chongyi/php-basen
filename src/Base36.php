<?php
/**
 * @Author : a.zinovyev
 * @Package: basen
 * @License: http://www.opensource.org/licenses/mit-license.php
 */

namespace PHPBaseN;

class Base36 implements Interfaces\Encoder
{
    public const string ALPHABET = '0123456789abcdefghijklmnopqrstuvwxyz';
    public const string ALPHABET_INVERTED = 'abcdefghijklmnopqrstuvwxyz0123456789';

    public const array ALPHABETS = [
        self::ALPHABET,
    ];

    use Traits\Encoder;

    private static function getBaseConverter(): BaseN
    {
        return self::$converter
            ?: self::$converter = new BaseN(self::ALPHABET, false);
    }
}
