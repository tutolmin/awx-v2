<?php

/*
 * This file is part of the AwxV2 library.
 *
 * (c) Antoine Corcy <contact@sbin.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AwxV2;

use AwxV2\Adapter\AdapterInterface;
use AwxV2\Api\Credential;
use AwxV2\Api\Config;
use AwxV2\Api\Job;
use AwxV2\Api\JobTemplate;
use AwxV2\Api\Me;
use AwxV2\Api\Organization;
use AwxV2\Api\Ping;
use AwxV2\Api\Project;
use AwxV2\Api\Setting;
use AwxV2\Api\User;
use AwxV2\Api\Inventory;
use AwxV2\Api\InventorySource;

/**
 * @author Antoine Corcy <contact@sbin.dk>
 * @author Graham Campbell <graham@alt-three.com>
 */
class AwxV2
{
    /**
     * @var AdapterInterface
     */
    protected $adapter;
    
    /**
     * @string $url
     */
    protected $url;

    /**
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter, $baseApiUrl)
    {
        $this->adapter = $adapter;
        $this->url = $baseApiUrl;
    }

    /**
     * @return config
     */
    public function config()
    {
        return new Config($this->adapter, $this->url);
    }
    
    /**
     * @return credential
     */
    public function credential()
    {
        return new Credential($this->adapter, $this->url);
    }

    /**
     * @return Job
     */
    public function job()
    {
        return new Job($this->adapter, $this->url);
    }
    
    /**
     * @return JobTemplate
     */
    public function jobTemplate()
    {
        return new JobTemplate($this->adapter, $this->url);
    }
    
    /**
     * @return me
     */
    public function me()
    {
        return new Me($this->adapter, $this->url);
    }
    
    /**
     * @return organization
     */
    public function organization()
    {
        return new Organization($this->adapter, $this->url);
    }
    
    /**
     * @return ping
     */
    public function ping()
    {
        return new Ping($this->adapter, $this->url);
    }
    
    /**
     * @return project
     */
    public function project()
    {
        return new Project($this->adapter, $this->url);
    }

    /**
     * @return inventorySource
     */
    public function inventorySource()
    {
        return new InventorySource($this->adapter, $this->url);
    }
    
    /**
     * @return inventory
     */
    public function inventory()
    {
        return new Inventory($this->adapter, $this->url);
    }
    
    /**
     * @return setting
     */
    public function setting()
    {
        return new Setting($this->adapter, $this->url);
    }
    
    /**
     * @return User
     */
    public function user()
    {
        return new User($this->adapter, $this->url);
    }
}
