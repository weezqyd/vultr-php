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

use Vultr\Entity\ReservedIp as ReservedIpEntity;
use Vultr\Exception\HttpException;

/**
 * @author Albert Leitato <wizqydy@gmail.com>
 */
class ReservedIp extends AbstractApi
{
    /**
     * List all the active reserved IPs on this account.
     *
     * @return ReservedIpEntity[]
     */
    public function list()
    {
        $response = $this->adapter->get(sprintf('%s/reservedip/list', $this->endpoint));

        $ips = json_decode($response);

        $this->extractMeta($ips);

        return array_map(function ($ip) {
            return new ReservedIpEntity($ip);
        }, $ips);
    }

    /**
     * Create a new reserved IP.
     *
     * Reserved IPs can only be used within the same datacenter for which
     * they were created.
     *
     * @param int    $dcId
     * @param string $ipType
     * @param string $label
     *
     * @throws HttpException
     *
     * @return FloatingIpEntity
     */
    public function create($dcId, $ipType, $label = null)
    {
        $content = [
            'DCID' => $dcId,
            'ip_type' => $ipType,
        ];
        if (null !== $label) {
            $content['label'] = $label;
        }
        $response = $this->adapter->post(sprintf('%s/reservedip/create', $this->endpoint), $content);

        return json_decode($response);
    }

    /**
     * Remove a reserved IP from your account.
     *
     * After making this call, you will not be able to recover the IP address.
     *
     * @param int $ipAddressipAddress
     *
     * @throws HttpException
     */
    public function delete($ipAddressipAddress)
    {
        $this->adapter->delete(sprintf('%s/reservedip/destroy', $this->endpoint), ['ip_address' => $ipAddressipAddress]);
    }

    /**
     * Convert an existing IP on a subscription to a reserved IP.
     *
     * @param int    $serverId  SUBID of the server that currently has the IP address
     * @param string $ipAddress IP address you want to convert
     * @param string $paramname Label for this reserved IP
     *
     * @throws HttpException
     */
    public function convert($serverIdd, $ipAddress, $label = null)
    {
        $content = [
            'SUBID' => $serverIdd,
            'ip_address' => $ipAddress,
        ];
        if (null !== $label) {
            $content['label'] = $label;
        }
        $this->adapter->post(sprintf('%s/reservedip/conver', $this->endpoint), $content);
    }

    /**
     * Attach a reserved IP to an existing subscription.
     *
     * @param int $ipAddress Reserved IP to attach to your account
     * @param int $serverId  Server to attach the reserved IP to
     *
     * @throws HttpException
     *
     * @return ActionEntity
     */
    public function attach($ipAddress, $serverId)
    {
        return $this->executeAction($ipAddress, $serverId, 'attach');
    }

    /**
     * @param int $ipAddress
     * @param int $serverId
     *
     * @throws HttpException
     */
    public function detach($ipAddress, $serverId)
    {
        return $this->executeAction($ipAddress, $serverId, 'detach');
    }

    /**
     * Detach a reserved IP from an existing subscription.
     *
     * @param string $ipAddress
     * @param int    $serverId
     * @param string $action
     *
     * @throws HttpException
     */
    private function executeAction($ipAddress, $serverId, $action)
    {
        return $this->adapter->post(sprintf('%s/reservedip/'.$action, $this->endpoint), ['ip_address' => $ipAddress, 'attach_SUBID' => $serverId]);
    }
}
