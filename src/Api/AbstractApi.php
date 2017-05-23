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

use Vultr\Adapter\AdapterInterface;
use Vultr\Entity\Meta;

/**
 * @author Albert Leitato <wizqydy@gmail.com>
 */
abstract class AbstractApi
{
    /**
     * @var string
     */
    protected $endpoint = 'https://api.vultr.com/v1';

    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * @var Meta
     */
    protected $meta;

    /**
     * @param AdapterInterface $adapter
     * @param string|null      $endpoint
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @param \stdClass $data
     *
     * @return Meta|null
     */
    protected function extractMeta(\StdClass $data)
    {
        if (isset($data->meta)) {
            $this->meta = new Meta($data->meta);
        }

        return $this->meta;
    }

    /**
     * @return Meta|null
     */
    public function getMeta()
    {
        return $this->meta;
    }
}
