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
final class FirewallGroup extends AbstractEntity
{
    /**
     * @var int
     */
    public $FIREWALLGROUPID;

    /**
     * @var string
     */
    public $description;

    /**
     * @var int
     */
    public $instance_count;

    /**
     * @var int
     */
    public $rule_count;

    /**
     * @var string
     */
    public $date_modified;

    /**
     * @var string
     */
    public $date_created;

    /**
     * @var int
     */
    public $max_rule_count;
}
