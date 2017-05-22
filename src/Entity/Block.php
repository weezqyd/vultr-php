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
     * @var int
     */
    public $SUBID;

    /**
     * @var int
     */
    public $DCID;

    /**
     * @var string
     */
    public $date_created;

    /**
     * @var int|null
     */
    public $attached_to_SUBID;

    /**
     * @var string
     */
    public $status;

    /**
     * @var string
     */
    public $label;
    /**
     * @var int
     */
    public $size_gb;

    /**
     * @param string $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->date_created = static::convertDateTime($createdAt);
    }
}
