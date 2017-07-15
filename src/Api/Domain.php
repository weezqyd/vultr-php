<?php
/*
 *   This file is part of the Vultr PHP library.
 *
 *   (c) Albert Leitato <wizqydy@gmail.com>
 *
 *   For the full copyright and license information, please view the LICENSE
 *   file that was distributed with this source code.
 */
namespace Vultr\Api;

use Vultr\Entity\Domain as DomainEntity;
use Vultr\Exceptions\HttpException;

/**
 * @author Albert Leitato <wizqydy@gmail.com>
 */
class Domain extends AbstractApi
{
    /**
     * List all domains associated with the current account.
     *
     * @return DomainEntity[]
     */
    public function list()
    {
        $domains = $this->adapter->get(\sprintf('%s/dns/list', $this->endpoint));

        return $this->heanleResponse($domains, DomainEntity::class, true);
    }

    /**
     * Create a domain name in DNS.
     *
     * @param string $name      Domain name to create
     * @param string $ipAddress IP to use when creating default records (A and MX)
     *
     * @throws HttpException
     *
     * @return DomainEntity
     */
    public function create($name, $ipAddress)
    {
        $content = ['name' => $name, 'serverip' => $ipAddress];

        $domain = $this->adapter->post(\sprintf('%s/dns/create_domain', $this->endpoint), http_build_query($content));

        $domain = \json_decode($domain);

        return new DomainEntity($domain->domain);
    }

    /**
     * Delete a domain name and all associated records.
     *
     * @param string $domain Domain name to delete
     *
     * @throws HttpException
     */
    public function delete($domain)
    {
        $this->adapter->post(\sprintf('%s/dns/delete_domain', $this->endpoint), http_build_query(compact('domain')));
    }
}
