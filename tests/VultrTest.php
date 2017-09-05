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
    /**
     * @covers \Vultr\Vultr::__get
     * @covers \Vultr\Vultr::getClass
     * @covers \Vultr\Vultr::__construct
     * @covers \Vultr\Support\Str::studly
     * @covers \Vultr\Api\AbstractApi::__construct
     */
    public function testAccount()
    {
        $account = $this->vultr->account;
        $this->assertInstanceOf('Vultr\Api\Account', $account);
    }
    /**
     * @covers \Vultr\Vultr::__get
     * @covers \Vultr\Vultr::getClass
     * @covers \Vultr\Vultr::__construct
     * @covers \Vultr\Support\Str::studly
     * @covers \Vultr\Api\AbstractApi::__construct
     */
    public function testApplication()
    {
        $application = $this->vultr->application;
        $this->assertInstanceOf('Vultr\Api\Application', $application);
    }
    /**
     * @covers \Vultr\Vultr::__get
     * @covers \Vultr\Vultr::getClass
     * @covers \Vultr\Vultr::__construct
     * @covers \Vultr\Support\Str::studly
     * @covers \Vultr\Api\AbstractApi::__construct
     */
    public function testAuth()
    {
        $this->assertInstanceOf('Vultr\Api\Auth', $this->vultr->auth);
    }
    /**
     * @covers \Vultr\Vultr::__get
     * @covers \Vultr\Vultr::getClass
     * @covers \Vultr\Vultr::__construct
     * @covers \Vultr\Support\Str::studly
     * @covers \Vultr\Api\AbstractApi::__construct
     */
    public function testBackup()
    {
        $this->assertInstanceOf('Vultr\Api\Backup', $this->vultr->backup);
    }
    /**
     * @covers \Vultr\Vultr::__get
     * @covers \Vultr\Vultr::getClass
     * @covers \Vultr\Vultr::__construct
     * @covers \Vultr\Support\Str::studly
     * @covers \Vultr\Api\AbstractApi::__construct
     */
    public function testDomain()
    {
        $this->assertInstanceOf('Vultr\Api\Domain', $this->vultr->domain);
    }
    /**
     * @covers \Vultr\Vultr::__get
     * @covers \Vultr\Vultr::getClass
     * @covers \Vultr\Vultr::__construct
     * @covers \Vultr\Support\Str::studly
     * @covers \Vultr\Api\AbstractApi::__construct
     */
    public function testBlock()
    {
        $this->assertInstanceOf('Vultr\Api\Block', $this->vultr->block);
    }

    /**
     * @covers \Vultr\Vultr::__get
     * @covers \Vultr\Vultr::getClass
     * @covers \Vultr\Vultr::__construct
     * @covers \Vultr\Support\Str::studly
     * @covers \Vultr\Api\AbstractApi::__construct
     */
    public function testDomainRecord()
    {
        $this->assertInstanceOf('Vultr\Api\DomainRecord', $this->vultr->domain_record);
    }

    /**
     * @covers \Vultr\Vultr::__get
     * @covers \Vultr\Vultr::getClass
     * @covers \Vultr\Vultr::__construct
     * @covers \Vultr\Support\Str::studly
     * @covers \Vultr\Api\AbstractApi::__construct
     */
    public function testFirewallGroup()
    {
        $this->assertInstanceOf('Vultr\Api\FirewallGroup', $this->vultr->firewall_group);
    }

    /**
     * @covers \Vultr\Vultr::__get
     * @covers \Vultr\Vultr::getClass
     * @covers \Vultr\Vultr::__construct
     * @covers \Vultr\Support\Str::studly
     * @covers \Vultr\Api\AbstractApi::__construct
     */
    public function testFirewallRule()
    {
        $this->assertInstanceOf('Vultr\Api\FirewallRule', $this->vultr->firewall_rule);
    }

    /**
     * @covers \Vultr\Vultr::__get
     * @covers \Vultr\Vultr::getClass
     * @covers \Vultr\Vultr::__construct
     * @covers \Vultr\Support\Str::studly
     * @covers \Vultr\Api\AbstractApi::__construct
     */
    public function testImage()
    {
        $this->assertInstanceOf('Vultr\Api\Image', $this->vultr->image);
    }

    /**
     * @covers \Vultr\Vultr::__get
     * @covers \Vultr\Vultr::getClass
     * @covers \Vultr\Vultr::__construct
     * @covers \Vultr\Support\Str::studly
     * @covers \Vultr\Api\AbstractApi::__construct
     */
    public function testOs()
    {
        $this->assertInstanceOf('Vultr\Api\Os', $this->vultr->os);
    }

    /**
     * @covers \Vultr\Vultr::__get
     * @covers \Vultr\Vultr::getClass
     * @covers \Vultr\Vultr::__construct
     * @covers \Vultr\Support\Str::studly
     * @covers \Vultr\Api\AbstractApi::__construct
     */
    public function testPlan()
    {
        $this->assertInstanceOf('Vultr\Api\Plan', $this->vultr->plan);
    }

    /**
     * @covers \Vultr\Vultr::__get
     * @covers \Vultr\Vultr::getClass
     * @covers \Vultr\Vultr::__construct
     * @covers \Vultr\Support\Str::studly
     * @covers \Vultr\Api\AbstractApi::__construct
     */
    public function testRegion()
    {
        $this->assertInstanceOf('Vultr\Api\Region', $this->vultr->region);
    }

    /**
     * @covers \Vultr\Vultr::__get
     * @covers \Vultr\Vultr::getClass
     * @covers \Vultr\Vultr::__construct
     * @covers \Vultr\Support\Str::studly
     * @covers \Vultr\Api\AbstractApi::__construct
     */
    public function testReservedIp()
    {
        $this->assertInstanceOf('Vultr\Api\ReservedIp', $this->vultr->reserved_ip);
    }

    /**
     * @covers \Vultr\Vultr::__get
     * @covers \Vultr\Vultr::getClass
     * @covers \Vultr\Vultr::__construct
     * @covers \Vultr\Support\Str::studly
     * @covers \Vultr\Api\AbstractApi::__construct
     */
    public function testServer()
    {
        $this->assertInstanceOf('Vultr\Api\Server', $this->vultr->server);
    }
}
