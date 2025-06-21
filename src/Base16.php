<?php

namespace PHPBaseN;

class Base16 implements Interfaces\Encoder
{
    public const string ALPHABET = '0123456789abcdef';
    public const array ALPHABETS = [
        self::ALPHABET,
    ];

    use Traits\Encoder;

    private static function getBaseConverter(): BaseN
    {
        return self::$converter
            ?: self::$converter = new BaseN(self::ALPHABET, false, true, false);
    }
}
