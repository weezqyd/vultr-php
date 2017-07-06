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

/**
 * @author Albert Leitato <wizqydy@gmail.com>
 */
final class FirewallGroup extends AbstractEntity
{
    /**
     * @var int
     */
    public $firewallgroupid;

    /**
     * @var string
     */
    public $description;

    /**
     * @var int
     */
    public $instanceCount;

    /**
     * @var int
     */
    public $ruleCount;

    /**
     * @var string
     */
    public $dateModified;

    /**
     * @var string
     */
    public $dateCreated;

    /**
     * @var int
     */
    public $maxRuleCount;

    /**
     * @var array Date attributes on this entity
     */
    protected $dates = [
        'date_created',
        'date_modified',
    ];
}
