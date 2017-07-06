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

use Mockery;
use Vultr\Vultr;
use Vultr\Adapter\AdapterInterface;
use PHPUnit\Framework\TestCase as PHPUnit;

abstract class TestCase extends PHPUnit
{
    protected $vultr;

    public function setUp()
    {
        $this->vultr = new Vultr(Mockery::mock(AdapterInterface::class));
    }

    public function tearDown()
    {
        Mockery::close();
    }

    protected function getRequest()
    {
        return Mockery::mock(AdapterInterface::class)->shouldReceive('get')->andReturn($this->getResponse())->mock();
    }
}
