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

use Vultr\Entity\Os as OsEntity;

/**
 * @author Albert Leitato <wizqydy@gmail.com>
 */
class Os extends AbstractApi
{
    /**
     * Retrieve a list of available operating systems.
     *
     * If the "windows" flag is true,
     * a Windows license will be included with the instance,
     * which will increase the cost.
     *
     * @return OsEntity[]
     */
    public function list()
    {
        $response = $this->adapter->get(sprintf('%s/iso/list', $this->endpoint));

        $osList = json_decode($response);

        $this->extractMeta($osList);

        return array_map(function ($os) {
            return new OsEntity($os);
        }, $osList);
    }
}
