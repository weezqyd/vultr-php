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

use Vultr\Tests\TestCase;
use Vultr\Api\Application;

class ApplicationTest extends TestCase
{
    /**
     * undocumented function.
     *
     * @author
     **/
    public function testShouldReturnApplicationsAvailable()
    {
        $application = new Application($this->getRequest());
        $apps        = $application->list();
        $this->assertEquals(\count($apps), 2);
        $app = $apps[1];
        $this->assertInstanceOf('Vultr\Entity\Application', $app);
    }

    protected function getResponse($decode = false)
    {
        $response = '{
					    "1": {
					        "APPID": "1",
					        "name": "LEMP",
					        "short_name": "lemp",
					        "deploy_name": "LEMP on CentOS 6 x64",
					        "surcharge": 0
					    },
					    "2": {
					        "APPID": "2",
					        "name": "WordPress",
					        "short_name": "wordpress",
					        "deploy_name": "WordPress on CentOS 6 x64",
					        "surcharge": 0
					    }
					}';
        if ($decode) {
            return \json_decode($response);
        }

        return $response;
    }
}
