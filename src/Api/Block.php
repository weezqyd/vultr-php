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

use Vultr\Entity\Block as BlockEntity;

/**
 * @author Albert Leitato <wizqydy@gmail.com>
 */
class Block extends AbstractApi
{
    /**
     * Retrieve a list of any active block storage subscriptions on this account.
     *
     * @return BlockEntity
     */
    public function list()
    {
        $blocks = $this->adapter->get(sprintf('%s/block/list', $this->endpoint));

        $blocks = json_decode($blocks, true);

        return array_map(function ($block) {
            return new BlockEntity($block);
        }, $blocks);
    }

    /**
     * Retrieve a list of any active block storage subscriptions on this account
     *
     * @return BlockEntity
     *
     * @param int $subId Id for the Block storage
     */
    public function getById($subId)
    {
        $response = $this->adapter->get(sprintf('%s/block/list?SUBID=%d', $this->endpoint, $subId));

        return $this->handleResponse($blocks,  BlockEntity::class);
    }

    /**
     * Create a block storage subscription.
     *
     * @param int    $dc_id DCID of the location to create this subscription in
     * @param int    $size  size (in GB) of this subscription
     * @param string $label Text label that will be associated with the subscription
     **/
    public function create($dc_id, int $size, $label = '')
    {
        $data = [
            'DCID' => $dc_id,
            'size_gb' => $size,
        ];
        if (!empty($label)) {
            $data['label'] = $label;
        }
        $response = $this->adapter->post(sprintf('%s/block/create', $this->endpoint), $data);

        return json_decode($response);
    }

    /**
     * Delete a block storage subscription. All data will be permanently lost.
     *
     * There is no going back from this call.
     *
     * @param int $subid ID of the block storage subscription to delete
     *
     * @throws HttpException
     */
    public function delete($subid)
    {
        $this->adapter->post(sprintf('%s/block/delete', $this->endpoint), ['SUBID' => $subid]);
    }

    /**
     * Detach a block storage subscription from the currently attached instance.
     *
     * @param int $subid ID of the block storage subscription to detach
     *
     * @throws HttpException
     */
    public function detach($subid)
    {
        $this->adapter->post(sprintf('%s/block/detach', $this->endpoint), ['SUBID' => $subid]);
    }

    /**
     * Set the label of a block storage subscription.
     *
     * @param int    $subid ID of the block storage subscription to detach
     * @param string $label Text label that will be shown in the control panel
     *
     * @throws HttpException
     */
    public function labelSet($subid, $label)
    {
        $data = [
            'SUBID' => $subid,
            'label' => $label,
        ];
        $this->adapter->post(sprintf('%s/block/label_set', $this->endpoint), $data);
    }

    /**
     * Resize the block storage volume to a new size.
     *
     * WARNING: When shrinking the volume,
     * you must manually shrink the filesystem and partitions beforehand,
     * or you will lose data.
     *
     * @param int    $subid ID of the block storage subscription to resize
     * @param string $size  New size (in GB) of the block storage subscription
     *
     * @throws HttpException
     */
    public function resize($subid, $size)
    {
        $data = [
            'SUBID' => $subid,
            'size_gb' => $size,
        ];
        $this->adapter->post(sprintf('%s/block/resize', $this->endpoint), $data);
    }
}
