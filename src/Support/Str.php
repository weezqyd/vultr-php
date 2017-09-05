<?php
/*
 *   This file is part of the Vultr PHP library.
 *
 *   (c) Albert Leitato <wizqydy@gmail.com>
 *
 *   For the full copyright and license information, please view the LICENSE
 *   file that was distributed with this source code.
 */
namespace Vultr\Support;

/**
 * @author Albert Leitato <wizqydy@gmail.com>
 */
trait Str
{
    /**
     * @param string|null $date DateTime string
     *
     * @return string|null DateTime in ISO8601 format
     */
    public static function convertDateTime($date)
    {
        if (!$date) {
            return;
        }

        $date = new \DateTime($date);
        $date->setTimezone(new \DateTimeZone(\date_default_timezone_get()));

        return $date->format(\DateTime::ISO8601);
    }

    /**
     * @param string $str Snake case string
     *
     * @return string Camel case string
     */
    public static function convertToCamelCase($str)
    {
        $string =  static::studly($str);

        return \lcfirst($string);
    }

    /**
     * Convert a value to studly caps case.
     *
     * @param string $value
     *
     * @return string
     */
    public static function studly($value)
    {
        $value = \ucwords(\str_replace(['-', '_'], ' ', \strtolower($value)));

        return \str_replace(' ', '', $value);
    }
}
