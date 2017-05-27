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

use Vultr\Entity\Plan as PlanEntity;

/**
 * @author Albert Leitato <wizqydy@gmail.com>
 */
class Plan extends AbstractApi
{
    /**
     * Retrieve a list of all active plans.
     *
     * Plans that are no longer available will not be shown.
     *
     * @param string $type the type of plans to return
     *
     * @return PlanEntity[]
     */
    public function list($type = 'all')
    {
        $response = $this->adapter->get(sprintf('%s/plans/list?type=%s', $this->endpoint, $type));

        return $this->handleResponse($response, PlanEntity::class, true);
    }
}
