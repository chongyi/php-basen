<?php
/**
 * @Author : a.zinovyev
 * @Package: basen
 * @License: http://www.opensource.org/licenses/mit-license.php
 */

namespace PHPBaseN;

class Base32 implements Interfaces\Encoder
{
    public const string ALPHABET = 'abcdefghijklmnopqrstuvwxyz234567';
    public const string ALPHABET_CROCKFORD = '0123456789abcdefghjkmnpqrstvwxyz';
    public const string ALPHABET_EXTENDED_HEX = '0123456789abcdefghijklmnopqrstuv';
    public const string ALPHABET_Z_BASE_32 = 'ybndrfg8ejkmcpqxot1uwisza345h769';

    public const array ALPHABETS = [
        self::ALPHABET,
        self::ALPHABET_CROCKFORD,
        self::ALPHABET_EXTENDED_HEX,
        self::ALPHABET_Z_BASE_32,
    ];

    use Traits\Encoder;

    private static function getBaseConverter(): BaseN
    {
        return self::$converter
            ?: self::$converter = new BaseN(self::ALPHABET, false, true, false);
    }
}
