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

use Vultr\Entity\Auth as AuthEntity;

/**
 * @author Albert Leitato <wizqydy@gmail.com>
 */
class Auth extends AbstractApi
{
    /**
     * Retrieve information about the current API key.
     *
     * @return AuthEntity
     */
    public function getKeyInformation()
    {
        $response = $this->adapter->get(\sprintf('%s/auth/info', $this->endpoint));

        return $this->handleResponse($response, AuthEntity::class);
    }
}
