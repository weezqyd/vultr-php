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

use Vultr\Entity\DomainRecord as DomainRecordEntity;
use Vultr\Exceptions\HttpException;
use Vultr\Exceptions\InvalidRecordException;

/**
 * @author Yassir Hannoun <yassir.hannoun@gmail.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class DomainRecord extends AbstractApi
{
    /**
     * List all the records associated with a particular domain.
     *
     * @param string $domain Domain to list records for
     *
     * @return DomainRecordEntity
     */
    public function list($domain)
    {
        $domainRecords = $this->adapter->get(sprintf('%s/dns/records?domain=%s', $this->endpoint, $domain));

        return $this->handleResponse($domainRecords, DomainRecordEntity::class, true);
    }

    /**
     * Add a DNS record.
     *
     * @param string $domain   Domain name to add record to
     * @param string $type     Type (A, AAAA, MX, etc) of record
     * @param string $name     Name (subdomain) of record
     * @param string $data     Data for this record
     * @param int    $priority (only required for MX and SRV) Priority of this record (omit the priority from the data)
     * @param int    $ttl      TTL of this record
     *
     * @throws HttpException|InvalidRecordException
     */
    public function create($domain, $type, $name, $data, $priority = null, $ttl = null)
    {
        switch ($type = strtoupper($type)) {
            case 'A':
            case 'AAAA':
            case 'CNAME':
            case 'TXT':
                $content = ['name' => $name, 'type' => $type, 'data' => $data];
                break;

            case 'NS':
                $content = ['type' => $type, 'data' => $data];
                break;

            case 'SRV':
            case 'MX':
                $content = [
                    'name' => $name,
                    'type' => $type,
                    'data' => $data,
                    'priority' => (int) $priority,
                ];
                break;

            default:
                throw new InvalidRecordException('The domain record type is invalid.');
        }
        $content['domain'] = $domain;
        if (null !== $ttl) {
            $content['ttl'] = $ttl;
        }
        $domainRecord = $this->adapter->post(sprintf('%s/dns/create_record', $this->endpoint), $content);
    }

    /**
     * @param string      $domain   Domain name to update record
     * @param int         $recordId ID of record to update
     * @param string|null $name     Name (subdomain) of record
     * @param string|null $data     Data for this record
     * @param int|null    $priority Priority of this record
     * @param int|null    $ttl      TTL of this record
     *
     * @throws HttpException
     *
     * @return DomainRecordEntity
     */
    public function update($domain, $recordId, $name = null, $data = null, $priority = null, $ttl = null)
    {
        $content = compact('name', 'data', 'priority', 'ttl', 'domain');
        $content = array_filter($content, function ($val) {
            return $val !== null;
        });
        $content['RECORDID'] = $recordId;

        $this->adapter->post(sprintf('%s/dns/update_record', $this->endpoint), $content);
    }

    /**
     * Delete an individual DNS record.
     *
     * @param string $domain   Domain name to delete record from
     * @param int    $recordId ID of record to delete
     *
     * @throws HttpException
     */
    public function delete($domain, $recordId)
    {
        $data = [
            'domain' => $domain,
            'RECORDID' => $recordId,
        ];
        $this->adapter->post(sprintf('%s/dns/delete_record', $this->endpoint), $data);
    }
}
