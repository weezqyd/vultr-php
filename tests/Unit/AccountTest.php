<?php
/*
 *   This file is part of the Vultr PHP library.
 *
 *   (c) Albert Leitato <wizqydy@gmail.com>
 *
 *   For the full copyright and license information, please view the LICENSE
 *   file that was distributed with this source code.
 */

namespace Vultr\Tests\Unit;

use Vultr\Api\Account;
use Vultr\Tests\TestCase;

/**
 * @coversDefault Account
 */
class AccountTest extends TestCase
{
    /**
     * @covers ::getUserInformation
     * @covers ::__construct
     */
    public function testGetUserInformation()
    {
        $mock = $this->getRequest();
        $account = new Account($mock);
        $user = $account->getUserInformation();
        $this->assertInstanceOf('Vultr\Entity\Account', $user);
        $this->assertEquals($user, new \Vultr\Entity\Account($this->getResponse(true)));
    }

    /**
     * Sample response.
     *
     * @return string
     **/
    protected function getResponse($decode = false)
    {
        $response = '{"balance": "-5519.11", "pending_charges": "57.03", "last_payment_date": "2014-07-18 15:31:01", "last_payment_amount": "-1.00" }';
        if ($decode) {
            return \json_decode($response);
        }

        return $response;
    }
}
