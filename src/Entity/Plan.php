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
final class Plan extends AbstractEntity
{
    /**
     * @var int
     */
    public $vpsplanid;

    /**
     * @var int
     */
    public $vcpuCount;

    /**
     * @var int
     */
    public $ram;

    /**
     * @var int
     */
    public $bandwidth;

    /**
     * @var int
     */
    public $disk;

    /**
     * @var float
     */
    public $pricePerMonth;

    /**
     * @var string
     */
    public $planType;

    /**
     * @var array
     */
    public $availableLocations = [];

    /**
     * @var bool
     */
    public $windows = false;

    /**
     * @var bool
     */
    public $deprecated = false;
}
