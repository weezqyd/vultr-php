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
final class FirewallRule extends AbstractEntity
{
    /**
     * @var string
     */
    public $firewallgroupid;

    /**
     * @var string
     */
    public $direction;

    /**
     * @var int
     */
    public $rulenumber;

    /**
     * @var string
     */
    public $ipType;

    /**
     * @var string
     */
    public $subnet;

    /**
     * @var int
     */
    public $subnetSize;

    /**
     * @var int|string
     */
    public $port;
}
