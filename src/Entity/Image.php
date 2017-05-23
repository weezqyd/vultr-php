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
final class Image extends AbstractEntity
{
    /**
     * @var int
     */
    public $isoid;

    /**
     * @var string
     */
    public $filename;

    /**
     * @var string
     */
    public $md5sum;

    /**
     * @var string
     */
    public $status;

    /**
     * @var float
     */
    public $size;

    /**
     * @var string
     */
    public $dateCreated;
}
