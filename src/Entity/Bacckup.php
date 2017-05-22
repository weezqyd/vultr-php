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

final class Backup extends AbstractEntity
{
    /**
     * @var string
     */
    public $BACKUPID;

    /**
     * @var string
     */
    public $date_created;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $status;

    /**
     * @var int
     */
    public $size;

    /**
     * @param string $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->date_created = static::convertDateTime($createdAt);
    }
}
