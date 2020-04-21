<?php

/*
 * This file is part of the AwxV2 library.
 *
 * (c) Sdwru https://github.com/sdwru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AwxV2\Entity;

/**
 * 
 */
final class Ping extends AbstractEntity
{
    /**
     * @var string
     */
    public $ha;

    /**
     * @var version
     */
    public $version;

    /**
     * @var string
     */
    public $active_node;

    /**
     * @var string
     */
    public $install_uuid;

    /**
     * @var array
     */
    public $instances;
    
    /**
     * @var array
     */
    public $instance_groups;
}
