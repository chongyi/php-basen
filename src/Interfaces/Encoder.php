<?php
/**
 * @Author : a.zinovyev
 * @Package: basen
 * @License: http://www.opensource.org/licenses/mit-license.php
 */

namespace PHPBaseN\Interfaces;

interface Encoder
{
    public static function encode(string $rawString): string;

    public static function decode(string $encodedString): string;
}
