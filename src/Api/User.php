<?php

/*
 * This file is part of the AwxV2 library.
 *
 * (c) Antoine Corcy <contact@sbin.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AwxV2\Api;

use AwxV2\Entity\User as UserEntity;
use AwxV2\Exception\HttpException;

/**
 * @author Yassir Hannoun <yassir.hannoun@gmail.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class User extends AbstractApi
{
    /**
     * @param int $per_page
     * @param int $page
     *
     * @return UserEntity[]
     */
    public function getAll($per_page = 200, $page = 1)
    {
        $users = $this->adapter->get(sprintf('%s/users/?page_size=%d&page=%d', $this->endpoint, $per_page, $page));

        $users = json_decode($users);

        return array_map(function ($user) {
            return new UserEntity($user);
        }, $users->results);
    }

    /**
     * @param string $userName
     *
     * @throws HttpException
     *
     * @return UserEntity
     */
    public function getByName($userName)
    {
        $user = $this->adapter->get(sprintf('%s/users/%s', $this->endpoint, $userName));

        $user = json_decode($user);

        return new UserEntity($user);
    }

    /**
     * @param string $name
     * @param string $ipAddress
     *
     * @throws HttpException
     *
     * @return UserEntity
     */
    public function create($name, $ipAddress)
    {
        $content = ['name' => $name, 'ip_address' => $ipAddress];

        $user = $this->adapter->post(sprintf('%s/users', $this->endpoint), $content);

        $user = json_decode($user);

        return new UserEntity($user);
    }

    /**
     * @param string $user
     *
     * @throws HttpException
     */
    public function delete($user)
    {
        $this->adapter->delete(sprintf('%s/users/%s', $this->endpoint, $user));
    }
}
