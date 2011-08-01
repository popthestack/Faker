<?php

/*
 * This file is part of the Faker package.
 *
 * (c) 2011 Justin Hileman
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Faker;

/**
 * Base Faker class, consisting of helper methods for selecting and formatting fake data.
 *
 * @abstract
 */
abstract class Faker
{
    public static function numerify($numberString)
    {
        return preg_replace_callback("/#/", function() { return rand(0, 9); }, $numberString);
    }

    public static function letterify($letterString)
    {
        return preg_replace_callback("/\?/", function() { return chr(rand(97,122)); }, $letterString);
    }

    public static function bothify($string)
    {
        return self::letterify(self::numerify($string));
    }

    public static function pickOne(array $options)
    {
        return $options[array_rand($options)];
    }
}