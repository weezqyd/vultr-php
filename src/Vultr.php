<?php
/*
 *   This file is part of the Vultr PHP library.
 *
 *   (c) Albert Leitato <wizqydy@gmail.com>
 *
 *   For the full copyright and license information, please view the LICENSE
 *   file that was distributed with this source code.
 */

namespace Vultr;

/*
 * Vultr.com API Client.
 *
 * @version 1.0
 *
 * @author  Albert Leitato <wizqydy@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 *
 * @see     https://github.com/weezqyd/vultr-php
 */

use Http\Exceptions;
use Http\Adapter\GuzzleHttpAdapter;
use Http\Adapter\AdapterInterface;

class Vultr
{
    use Support\Str;

    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * Create a new Vultr API instance.
     *
     * This is the entry point to the api resource
     *
     * @param AdapterInterface $adapter
     */
    public function __construct($token, AdapterInterface $adapter = null)
    {
        $this->createAdapter($adapter, $token);
    }

    /**
     * Call API resources as though the were Vultr::class properties.
     *
     * @param mixed $resource
     *
     * @return mixed Api Resource if it exists
     **/
    public function __get($resource)
    {
        return $this->getClass($resource);
    }

    /**
     * Create resource instance.
     *
     * @return mixed
     **/
    protected function getClass($class)
    {
        $resource = static::studly($class);
        $class = 'Vultr\\Api\\'.$resource;
        if (\class_exists($class)) {
            return new $class($this->adapter);
        }
        throw new Exceptions\ErrorException("The class $class does not exist");
    }

    /**
     * Set the default client adapter.
     *
     * @param \Http\Adapter\AdapterInterface $adapter
     **/
    public function setClient(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * Set up the Guzzle adapter.
     *
     * @param string $token Api Token
     **/
    protected function createGuzzleAdapter($token)
    {
        $options = ['headers' => [
                        'API-Key' => $token,
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/x-www-form-urlencoded',
                    ],
                ];
        $adapter = new GuzzleHttpAdapter($options);
        $this->setClient($adapter);
    }

    /**
     * Create a client adapter.
     *
     * @param Http\Adapter\AdapterInterface|null $adapter
     * @param string|null                        $token   API Token
     **/
    protected function createAdapter($adapter, $token = null)
    {
        if ($adapter instanceof AdapterInterface) {
            $this->setClient($adapter);
        } else {
            $this->createGuzzleAdapter($token);
        }
    }
}
