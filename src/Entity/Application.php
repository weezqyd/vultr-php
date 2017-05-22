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

final class Application extends AbstractEntity
{
    /**
     * @var int
     */
    public $APPID;

    /**
     * @var string
     */
    public $short_name;

    /**
     * @var string
     */
    public $deploy_name;

    /**
     * @var int
     */
    public $surcharge;
}
