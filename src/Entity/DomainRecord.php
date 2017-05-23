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
final class DomainRecord extends AbstractEntity
{
    /**
     * @var int
     */
    public $recordid;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $data;

    /**
     * @var int
     */
    public $priority;

    /**
     * @var int
     */
    public $ttl;
}
