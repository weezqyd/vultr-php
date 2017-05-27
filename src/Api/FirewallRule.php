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

/**
 * @author Albert Leitato <wizqydy@gmail.com>
 */
class FirewallRule extends AbstractApi
{
    /**
     * List all firewall rules on the current account.
     *
     * @see https://www.vultr.com/api/#firewall_rule_list
     *
     * @return FirewallRuleEntity
     */
    public function list($groupId, $direction, $ipType)
    {
        $params = 'FIREWALLGROUPID=%s&direction=%s&ip_type=%s';
        $response = $this->adapter->get(sprintf('%s/firewall/rule_list'.$params, $this->endpoint, $groupId, $direction, $ipType));

        return $this->handleResponse($response, self::class, true);
    }

    /**
     * Create a rule in a firewall group.
     *
     * @param string $groupId    Target firewall group
     * @param string $direction  Direction of rule. Possible values: "in".
     * @param string $ipType     IP address type. Possible values: "v4", "v6".
     * @param string $protocol   Protocol type. Possible
     * @param string $subnet     IP address representing a subnet
     * @param int    $subnetSize iP prefix size in bits
     * @param string $port       tCP/UDP only
     *
     * @throws HttpException
     */
    public function create(string $groupId, string $direction, string $ipType, string $protocol, string $subnet, int $subnetSize, $port = null)
    {
        $content = [
            'FIREWALLGROUPID' => $groupId,
            'direction' => $direction,
            'ip_type' => $ipType,
            'protocol' => $protocol,
            'subnet' => $subnet,
            'subnet_size' => $subnetSize,
        ];
        if (null !== $port) {
            $content['port'] = $port;
        }

        $response = $this->adapter->post(sprintf('%s/firewall/rule_create', $this->endpoint), $content);

        return json_decode($response);
    }

    /**
     * Delete a rule in a firewall group.
     *
     * @param string $groupId    Firewall group to delete
     * @param int    $ruleNumber Rule number to delete
     *
     * @throws HttpException
     */
    public function delete($groupId, $ruleNumber)
    {
        $data = [
            'FIREWALLGROUPID' => $groupId,
            'rulenumber' => $ruleNumber,
        ];
        $this->adapter->post(sprintf('%s/firewall/rule_delete', $this->endpoint), $data);
    }
}
