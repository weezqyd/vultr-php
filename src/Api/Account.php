<?php

/*
 * This file is part of the Vultr PHP library.
 *
 * (c) Albert Leitato <wizqydy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vultr\Api;

use Vultr\Entity\Account as AccountEntity;

/**
 * @author Albert Leitato <wizqydy@gmail.com>
 */
class Account extends AbstractApi
{
    /**
     * Retrieve information about the current account.
     *
     * @see https://www.vultr.com/api/#account
     *
     * @return AccountEntity
     */
    public function getUserInformation()
    {
        $account = $this->adapter->get(sprintf('%s/account/info', $this->endpoint));

        $account = json_decode($account);

        return new AccountEntity($account);
    }
}
