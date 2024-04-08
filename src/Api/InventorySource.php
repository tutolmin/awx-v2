<?php

/*
 * This file is part of the AwxV2 library.
 *
 * (c) Sdwru https://github.com/sdwru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AwxV2\Api;

use AwxV2\Entity\InventorySource as InventorySourceEntity;
use AwxV2\Exception\HttpException;

/**
 *
 *
 */
class InventorySource extends AbstractApi
{
    /**
     * @param int $per_page
     * @param int $page
     *
     * @return InventorySourceEntity[]
     */
    public function getAll($per_page = 200, $page = 1)
    {
        $vars = $this->adapter->get(sprintf('%s/inventory_sources/?page_size=%d&page=%d', $this->endpoint, $per_page, $page));

        $vars = json_decode($vars);

        return array_map(function ($var) {
            return new InventorySourceEntity($var);
        }, $vars->results);
    }
    
    /**
     * @param int $id
     *
     * @return InventorySourceEntity
     */
    public function getById($id)
    {
        $var = $this->adapter->get(sprintf('%s/inventory_sources/%d/', $this->endpoint, $id));

        $var = json_decode($var);
        
        return new InventorySourceEntity($var);
    }
    
    /**
     * @param int $id
     *
     * @return InventorySourceEntity
     */
    public function update($id, $body = [])
    {
        $response = $this->adapter->post(sprintf('%s/inventory_sources/%d/update/', $this->endpoint, $id), $body);
        $response = json_decode($response);
        
        return new InventorySourceEntity($response);
    }
}
