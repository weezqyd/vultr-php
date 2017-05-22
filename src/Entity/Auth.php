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

final class Auth extends AbstractEntity
{
    /**
     * @var array
     */
    public $acls;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $name;
}
