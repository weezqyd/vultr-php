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

use Vultr\Api\Auth;
use Vultr\Tests\TestCase;

class ApiKeyTest extends TestCase
{
    public function testGetKeyInformation()
    {
        $mock = $this->getRequest();
        $auth = new Auth($mock);
        $info = $auth->getKeyInformation();
        $this->assertInstanceOf('Vultr\Entity\Auth', $info);
        $this->assertEquals($info, new \Vultr\Entity\Auth($this->getResponse(true)));
        $this->assertEquals($info->email, 'example@vultr.com');
    }

    /**
     * Sample response.
     *
     * @return string
     **/
    protected function getResponse($decode = false)
    {
        $response = '{
                        "acls": [
                            "subscriptions",
                            "billing",
                            "support",
                            "provisioning"
                        ],
                        "email": "example@vultr.com",
                        "name": "Example Account"
                    }';
        if ($decode) {
            return \json_decode($response);
        }

        return $response;
    }
}
