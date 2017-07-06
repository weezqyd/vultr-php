<?php
/*
 *   This file is part of the Vultr PHP library.
 *
 *   (c) Albert Leitato <wizqydy@gmail.com>
 *
 *   For the full copyright and license information, please view the LICENSE
 *   file that was distributed with this source code.
 */
namespace DigitalOceanV2\Entity;

/**
 * @author Yassir Hannoun <yassir.hannoun@gmail.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
final class RateLimit extends AbstractEntity
{
    /**
     * @var int
     */
    public $limit;

    /**
     * @var int
     */
    public $remaining;

    /**
     * @var int
     */
    public $reset;
}
