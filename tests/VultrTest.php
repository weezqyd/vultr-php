<?php
/*
 *   This file is part of the Vultr PHP library.
 *
 *   (c) Albert Leitato <wizqydy@gmail.com>
 *
 *   For the full copyright and license information, please view the LICENSE
 *   file that was distributed with this source code.
 */
namespace Vultr\Tests;

class VultrTest extends TestCase
{
    public function testAccount()
    {
        $account = $this->vultr->account;
        $this->assertInstanceOf('Vultr\Api\Account', $account);
    }

    public function testApplication()
    {
        $application = $this->vultr->application;
        $this->assertInstanceOf('Vultr\Api\Application', $application);
    }

    public function testAuth()
    {
        $this->assertInstanceOf('Vultr\Api\Auth', $this->vultr->auth);
    }

    public function testBackup()
    {
        $this->assertInstanceOf('Vultr\Api\Backup', $this->vultr->backup);
    }

    public function testDomain()
    {
        $this->assertInstanceOf('Vultr\Api\Domain', $this->vultr->domain);
    }
    public function testBlock()
    {
        $this->assertInstanceOf('Vultr\Api\Block', $this->vultr->block);
    }

    public function testDomainRecord()
    {
        $this->assertInstanceOf('Vultr\Api\DomainRecord', $this->vultr->domain_record);
    }

    public function testFirewallGroup()
    {
        $this->assertInstanceOf('Vultr\Api\FirewallGroup', $this->vultr->firewall_group);
    }

    public function testFirewallRule()
    {
        $this->assertInstanceOf('Vultr\Api\FirewallRule', $this->vultr->firewall_rule);
    }

    public function testImage()
    {
        $this->assertInstanceOf('Vultr\Api\Image', $this->vultr->image);
    }

    public function testOs()
    {
        $this->assertInstanceOf('Vultr\Api\Os', $this->vultr->os);
    }

    public function testPlan()
    {
        $this->assertInstanceOf('Vultr\Api\Plan', $this->vultr->plan);
    }

    public function testRegion()
    {
        $this->assertInstanceOf('Vultr\Api\Region', $this->vultr->region);
    }

    public function testReservedIp()
    {
        $this->assertInstanceOf('Vultr\Api\ReservedIp', $this->vultr->reserved_ip);
    }

    public function testServer()
    {
        $this->assertInstanceOf('Vultr\Api\Server', $this->vultr->server);
    }
}
