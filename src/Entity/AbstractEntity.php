<?php
/*
 *   This file is part of the Vultr PHP library.
 *
 *   (c) Albert Leitato <wizqydy@gmail.com>
 *
 *   For the full copyright and license information, please view the LICENSE
 *   file that was distributed with this source code.
 */
namespace Vultr\Entity;

use Vultr\Support\Str;

abstract class AbstractEntity
{
    use Str;

    /**
     * @param \stdClass|array|null $parameters
     */
    public function __construct($parameters = null)
    {
        if (!$parameters) {
            return;
        }

        if ($parameters instanceof \stdClass) {
            $parameters = \get_object_vars($parameters);
        }

        $this->build($parameters);
    }

    /**
     * @param array $parameters
     */
    public function build(array $parameters)
    {
        foreach ($parameters as $property => $value) {
            $property = static::convertToCamelCase($property);

            if (\property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
        if (\property_exists($this, 'dates')) {
            foreach ($this->dates as $value) {
                $property        = static::convertToCamelCase($value);
                $this->$property = static::convertDateTime($this->$property);
            }
        }
    }
}
