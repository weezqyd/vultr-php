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

final class Block extends AbstractEntity
{
    /**
     * @var int
     */
    public $subid;

    /**
     * @var int
     */
    public $dcid;

    /**
     * @var string
     */
    public $dateCreated;

    /**
     * @var int|null
     */
    public $attachedToSubid;

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
    public $sizeGb;

    /**
     * @var array Date attributes on this entity
     */
    protected $dates = [
        'date_created',
    ];
}
