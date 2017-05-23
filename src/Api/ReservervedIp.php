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

use Vultr\Entity\Action as ActionEntity;
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
     * @param string $regionSlug
     *
     * @throws HttpException
     *
     * @return FloatingIpEntity
     */
    public function createReserved($regionSlug)
    {
        $ip = $this->adapter->post(sprintf('%s/floating_ips', $this->endpoint), ['region' => $regionSlug]);

        $ip = json_decode($ip);

        return new FloatingIpEntity($ip->floating_ip);
    }

    /**
     * @param int $id
     *
     * @throws HttpException
     */
    public function delete($id)
    {
        $this->adapter->delete(sprintf('%s/floating_ips/%s', $this->endpoint, $id));
    }

    /**
     * @param int $id
     *
     * @return ActionEntity[]
     */
    public function getActions($id)
    {
        $actions = $this->adapter->get(sprintf('%s/floating_ips/%s/actions?per_page=%d', $this->endpoint, $id, 200));

        $actions = json_decode($actions);

        $this->meta = $this->extractMeta($actions);

        return array_map(function ($action) {
            return new ActionEntity($action);
        }, $actions->actions);
    }

    /**
     * @param int $id
     * @param int $actionId
     *
     * @return ActionEntity
     */
    public function getActionById($id, $actionId)
    {
        $action = $this->adapter->get(sprintf('%s/floating_ips/%s/actions/%d', $this->endpoint, $id, $actionId));

        $action = json_decode($action);

        return new ActionEntity($action->action);
    }

    /**
     * @param int $id
     * @param int $dropletId
     *
     * @throws HttpException
     *
     * @return ActionEntity
     */
    public function assign($id, $dropletId)
    {
        return $this->executeAction($id, ['type' => 'assign', 'droplet_id' => $dropletId]);
    }

    /**
     * @param int $id
     *
     * @throws HttpException
     *
     * @return ActionEntity
     */
    public function unassign($id)
    {
        return $this->executeAction($id, ['type' => 'unassign']);
    }

    /**
     * @param int   $id
     * @param array $options
     *
     * @throws HttpException
     *
     * @return ActionEntity
     */
    private function executeAction($id, array $options)
    {
        $action = $this->adapter->post(sprintf('%s/floating_ips/%s/actions', $this->endpoint, $id), $options);

        $action = json_decode($action);

        return new ActionEntity($action->action);
    }
}
