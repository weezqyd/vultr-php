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
final class Os extends AbstractEntity
{
    /**
     * @var int
     */
    public $osid;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $arch;

    /**
     * @var bool
     */
    public $windows;

    /**
     * @var string
     */
    public $family;
}
