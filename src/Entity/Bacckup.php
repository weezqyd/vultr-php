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
    public $backupid;

    /**
     * @var string
     */
    public $dateCreated;

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
     * @var array Date attributes on this entity
     */
    protected $dates = [
        'date_created',
    ];
}
