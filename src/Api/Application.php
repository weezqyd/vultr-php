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

use Vultr\Entity\Application as ApplicationEntity;

/**
 * @author Albert Leitato <wizqydy@gmail.com>
 */
class Application extends AbstractApi
{
    /**
     * Retrieve a list of available applications.
     * These refer to applications that can be launched when creating a Vultr VPS.
     *
     * @see https://www.vultr.com/api/#app_app_list
     *
     * @return ApplicationEntity
     */
    public function list()
    {
        $response = $this->adapter->get(sprintf('%s/app/list', $this->endpoint));

        $applications = json_decode($response);
        $this->extractMeta($applications);
        
        return array_map(function ($app) {
            return new ApplicationEntity($app);
        }, get_object_vars($applications));
    }
}
