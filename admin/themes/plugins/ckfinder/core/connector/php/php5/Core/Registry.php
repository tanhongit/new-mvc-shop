<?php
/*
 * CKFinder
 * ========
 * http://cksource.com/ckfinder
 * Copyright (C) 2007-2015, CKSource - Frederico Knabben. All rights reserved.
 *
 * The software, this file and its contents are subject to the CKFinder
 * License. Please read the license.txt file before using, installing, copying,
 * modifying or distribute this file or part of its contents. The contents of
 * this file is part of the Source Code of CKFinder.
 */
if (!defined('IN_CKFINDER')) {
    exit;
}

/**
 * @copyright CKSource - Frederico Knabben
 */

/**
 * Registry for storing global variables values (not references).
 *
 * @copyright CKSource - Frederico Knabben
 */
class CKFinder_Connector_Core_Registry
{
    /**
     * Arrat that stores all values.
     *
     * @var array
     */
    private $_store = [];

    /**
     * Chacke if value has been set.
     *
     * @param string $key
     *
     * @return bool
     */
    private function isValid($key)
    {
        return array_key_exists($key, $this->_store);
    }

    /**
     * Set value.
     *
     * @param string $key
     * @param mixed  $obj
     */
    public function set($key, $obj)
    {
        $this->_store[$key] = $obj;
    }

    /**
     * Get value.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get($key)
    {
        if ($this->isValid($key)) {
            return $this->_store[$key];
        }
    }
}
