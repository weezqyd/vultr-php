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
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * Bind response to Entity.
     *
     * Decode API response and bind the response to the respective entity
     *
     * @param string $response the response from the API
     * @param string $class    Entity to bind the response to
     * @param bool   $isArray  If the response is a collection
     *
     * @return object Entity instance
     **/
    protected function handleResponse($response, $class, $isArray = false)
    {
        $object = \json_decode($response, true);
        if ($isArray) {
            return \array_map(function ($entity) use ($class) {
                return new $class($entity);
            }, $object);
        }

        return new $class($object);
    }
}
