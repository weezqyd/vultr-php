<?php

/*
 * This file is part of the Vultr PHP library.
 *
 * (c) Albert Leitato <wizqydy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vultr\Entity;

/**
 * @author Albert Leitato <wizqydy@gmail.com>
 */
final class Domain extends AbstractEntity
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $date_created;

    /**
     * @param string $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->date_created = static::convertDateTime($createdAt);
    }
}
