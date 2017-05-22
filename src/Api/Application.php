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
     * @return ApplicationEntity
     */
    public function getAll()
    {
        $applications = $this->adapter->get(sprintf('%s/app/list', $this->endpoint));

        $applications = json_decode($applications);
        $this->extractMeta($applications);

        return array_map(function ($app) {
            return new ApplicationEntity($app);
        }, $applications);
    }
}
