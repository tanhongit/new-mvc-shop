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
 * This class keeps images configuration.
 *
 * @copyright CKSource - Frederico Knabben
 */
class CKFinder_Connector_Core_ImagesConfig
{
    /**
     * Max width for images, 0 to disable resizing.
     *
     * @var int
     */
    private $_maxWidth = 0;
    /**
     * Max height for images, 0 to disable resizing.
     *
     * @var int
     */
    private $_maxHeight = 0;
    /**
     * Quality of thumbnails.
     *
     * @var int
     */
    private $_quality = 80;

    public function __construct($imagesNode)
    {
        if (isset($imagesNode['maxWidth'])) {
            $_maxWidth = intval($imagesNode['maxWidth']);
            if ($_maxWidth >= 0) {
                $this->_maxWidth = $_maxWidth;
            }
        }
        if (isset($imagesNode['maxHeight'])) {
            $_maxHeight = intval($imagesNode['maxHeight']);
            if ($_maxHeight >= 0) {
                $this->_maxHeight = $_maxHeight;
            }
        }
        if (isset($imagesNode['quality'])) {
            $_quality = intval($imagesNode['quality']);
            if ($_quality > 0 && $_quality <= 100) {
                $this->_quality = $_quality;
            }
        }
    }

    /**
     * Get maximum width of a thumbnail.
     *
     * @return int
     */
    public function getMaxWidth()
    {
        return $this->_maxWidth;
    }

    /**
     * Get maximum height of a thumbnail.
     *
     * @return int
     */
    public function getMaxHeight()
    {
        return $this->_maxHeight;
    }

    /**
     * Get quality of a thumbnail (1-100).
     *
     * @return int
     */
    public function getQuality()
    {
        return $this->_quality;
    }
}
