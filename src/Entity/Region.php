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
 * @author Yassir Hannoun <yassir.hannoun@gmail.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
final class Region extends AbstractEntity
{
    /**
     * @var string
     */
    public $slug;

    /**
     * @var string
     */
    public $name;

    /**
     * @var bool
     */
    public $available;

    /**
     * @var string[]
     */
    public $sizes = [];

    /**
     * @var string[]
     */
    public $features = [];
}
