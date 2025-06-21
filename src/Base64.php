<?php
/**
 * @Author : a.zinovyev
 * @Package: basen
 * @License: http://www.opensource.org/licenses/mit-license.php
 */

namespace PHPBaseN;

class Base64
{
    public const string ALPHABET = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
    public const array ALPHABETS = [
        self::ALPHABET,
        self::ALPHABET_FREENET_URI_SAFE,
        self::ALPHABET_REGEX_SAFE,
        self::ALPHABET_URI_SAFE,
    ];
    public const string ALPHABET_FREENET_URI_SAFE = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789~-';
    public const string ALPHABET_REGEX_SAFE = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!-';
    public const string ALPHABET_URI_SAFE = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_';

    use Traits\Encoder;

    public static function encode(string $rawString, ?string $alphabet = null): string
    {
        $alphabet = self::validateAlphabet($alphabet);

        return match ($alphabet) {
            self::ALPHABET_URI_SAFE => str_replace('+', '-',
                str_replace('/', '_',
                    str_replace('=', '',
                        base64_encode($rawString)))),
            self::ALPHABET_FREENET_URI_SAFE => str_replace('+', '~',
                str_replace('/', '-',
                    str_replace('=', '',
                        base64_encode($rawString)))),
            self::ALPHABET_REGEX_SAFE => str_replace('+', '!',
                str_replace('/', '-',
                    str_replace('=', '',
                        base64_encode($rawString)))),
            default => base64_encode($rawString),
        };
    }

    public static function decode(string $encodedString, ?string $alphabet = null): string
    {
        $alphabet = self::validateAlphabet($alphabet);

        return match ($alphabet) {
            self::ALPHABET_URI_SAFE => base64_decode(str_replace('-', '+',
                str_replace('_', '/', $encodedString))),
            self::ALPHABET_FREENET_URI_SAFE => base64_decode(str_replace('~', '+',
                str_replace('-', '/',
                    $encodedString))),
            self::ALPHABET_REGEX_SAFE => base64_decode(str_replace('!', '+',
                str_replace('-', '/',
                    $encodedString))),
            default => base64_decode($encodedString),
        };
    }
}
