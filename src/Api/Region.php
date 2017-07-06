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

use Vultr\Entity\Region as RegionEntity;

/**
 * @author Albert Leitato <wizqydy@gmail.com>
 */
class Region extends AbstractApi
{
    /**
     * @return RegionEntity[]
     */
    public function list($availability = null)
    {
        $regions = $this->adapter->get(\sprintf('%s/regions/list?availability=%d', $this->endpoint, $availability));

        $regions = \json_decode($regions);

        $this->extractMeta($regions);

        return \array_map(function ($region) {
            return new RegionEntity($region);
        }, $regions->regions);
    }
}
