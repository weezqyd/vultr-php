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

use Vultr\Entity\Image as ImageEntity;
use Vultr\Exception\HttpException;

/**
 * @author Albert Leitato <wizqydy@gmail.com>
 */
class Image extends AbstractApi
{
    /**
     * List all ISOs currently available on this account.
     *
     * @return ImageEntity[]
     */
    public function list()
    {
        $images = $this->adapter->get(sprintf('%s/iso/list', $this->endpoint));

        $images = json_decode($images);

        $this->extractMeta($images);

        return array_map(function ($image) {
            return new ImageEntity($image);
        }, $images);
    }

    /**
     * Create a new ISO image on the current account.
     *
     * The ISO image will be downloaded from a given URL.
     * Download status can be checked with the v1/iso/list call.
     *
     * @param string $url
     *
     * @throws HttpException
     *
     * @return mixed Api response
     */
    public function create($url)
    {
        $image = $this->adapter->post(sprintf('%s/iso/create_from_url', $this->endpoint), ['url' => $url]);

        return json_decode($image);
    }
}
