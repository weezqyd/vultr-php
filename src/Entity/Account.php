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

final class Account extends AbstractEntity
{
    /**
     * @var float
     */
    public $balance;

    /**
     * @var float
     */
    public $pendingCharges;

    /**
     * @var string
     */
    public $lastPaymentDate;

    /**
     * @var float
     */
    public $lastPaymentAmount;

    /**
     *  @var array Date attributes on this entity
     */
    protected $dates = [
        'last_payment_date',
    ];
}
