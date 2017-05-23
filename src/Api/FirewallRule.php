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

use Vultr\Entity\FirewallRule as FirewallRuleEntity;
use Vultr\Exceptions\EntityNotFoundException;

/**
 * @author Albert Leitato <wizqydy@gmail.com>
 */
class FirewallRule extends AbstractApi
{
    /**
     * List all firewall groups on the current account.
     *
     * @see https://www.vultr.com/api/#firewall_group_list
     *
     * @return FirewallRuleEntity
     */
    public function getAll()
    {
        $response = $this->getAny();

        $groups = json_decode($response);
        $this->extractMeta($groups);

        return array_map(function ($group) {
            return new FirewallRuleEntity($group);
        }, $groups);
    }

    /**
     * Get a firewall group by its id.
     *
     * @param string $groupId ID for the firewall group
     *
     * @return FirewallRuleEntity
     *
     * @throws EntityNotFoundException
     **/
    public function getById($groupId)
    {
        $response = $this->getAny($groupId);
        $object = json_decode($response);
        try {
            $group = $object->$groupId;
        } catch (\Exception $e) {
            throw new EntityNotFoundException($e->getMessage());
        }

        return new FirewallRuleEntity($group);
    }

    /**
     * Get a firewall group by its id.
     *
     * @param string $groupId ID for the firewall group
     *
     * @return string API response
     */
    protected function getAny($groupId = null)
    {
        $params = null !== $groupId ? '?FIREWALLGROUPID=%s' : '';

        return $this->adapter->get(sprintf('%s/firewall/group_list'.$params, $this->endpoint, $groupId));
    }

    /**
     * Create a new firewall group on the current account.
     *
     * @param string $description Description of firewall group
     *
     * @return FirewallRuleEntity
     **/
    public function create($description = null)
    {
        $response = $this->adapter->post(sprintf('%s/firewall/group_create', $this->endpoint), compact('description'));
        $object = json_decode($response);

        return $this->getById($object->FIREWALLGROUPID);
    }

    /**
     * Change the description on a firewall group.
     *
     * @param string $groupId     Firewall group to update
     * @param string $description Description of firewall group
     *
     * @throws HttpException
     */
    public function setDescription($groupId, $description)
    {
        $data = [
            'FIREWALLGROUPID' => $groupId,
            'description' => $description,
        ];
        $this->adapter->post(sprintf('%s/firewall/group_set_description', $this->endpoint), $data);
    }

    /**
     * Delete a firewall group.
     *
     * Use this function with caution because the firewall group being deleted
     * will be detached from all servers. This can result in open ports accessible
     * to the internet
     *
     * @param string $groupId Firewall group to delete
     *
     * @throws HttpException
     */
    public function delete($groupId)
    {
        $data = [
            'FIREWALLGROUPID' => $groupId,
        ];
        $this->adapter->post(sprintf('%s/firewall/group_delete', $this->endpoint), $data);
    }
}
