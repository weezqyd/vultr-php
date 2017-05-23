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
 * @author Yassir Hannoun <yassir.hannoun@gmail.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class Image extends AbstractApi
{
    /**
     * @param array $criteria
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
     * @param int    $id
     * @param string $name
     *
     * @throws HttpException
     *
     * @return ImageEntity
     */
    public function create($id, $name)
    {
        $image = $this->adapter->put(sprintf('%s/images/%d', $this->endpoint, $id), ['name' => $name]);

        $image = json_decode($image);

        return new ImageEntity($image->image);
    }
}
