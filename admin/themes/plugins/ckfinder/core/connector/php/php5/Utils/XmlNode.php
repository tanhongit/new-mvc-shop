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
 * Simple class which provides some basic API for creating XML nodes and adding attributes.
 *
 * @copyright CKSource - Frederico Knabben
 */
class Ckfinder_Connector_Utils_XmlNode
{
    /**
     * Array that stores XML attributes.
     *
     * @var array
     */
    private $_attributes = [];
    /**
     * Array that stores child nodes.
     *
     * @var array
     */
    private $_childNodes = [];
    /**
     * Node name.
     *
     * @var string
     */
    private $_name;
    /**
     * Node value.
     *
     * @var string
     */
    private $_value;

    /**
     * Create new node.
     *
     * @param string $nodeName  node name
     * @param string $nodeValue node value
     *
     * @return Ckfinder_Connector_Utils_XmlNode
     */
    public function __construct($nodeName, $nodeValue = null)
    {
        $this->_name = $nodeName;
        if (!is_null($nodeValue)) {
            $this->_value = $nodeValue;
        }
    }

    public function getChild($name)
    {
        foreach ($this->_childNodes as $i => $node) {
            if ($node->_name == $name) {
                return $this->_childNodes[$i];
            }
        }

        return null;
    }

    /**
     * Add attribute.
     *
     * @param string $name
     * @param string $value
     */
    public function addAttribute($name, $value)
    {
        $this->_attributes[$name] = $value;
    }

    /**
     * Get attribute value.
     *
     * @param string $name
     */
    public function getAttribute($name)
    {
        return $this->_attributes[$name];
    }

    /**
     * Set element value.
     *
     * @param string $name
     * @param string $value
     */
    public function setValue($value)
    {
        $this->_value = $value;
    }

    /**
     * Get element value.
     *
     * @param string $name
     * @param string $value
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * Adds new child at the end of the children.
     *
     * @param Ckfinder_Connector_Utils_XmlNode $node
     */
    public function addChild(&$node)
    {
        $this->_childNodes[] = &$node;
    }

    /**
     * Checks whether the string is valid UTF8.
     *
     * @param string $string
     */
    public function asUTF8($string)
    {
        if (CKFinder_Connector_Utils_Misc::isValidUTF8($string)) {
            return $string;
        }

        $ret = '';
        for ($i = 0; $i < strlen($string); $i++) {
            $ret .= CKFinder_Connector_Utils_Misc::isValidUTF8($string[$i]) ? $string[$i] : "\xEF\xBF\xBD";
        }

        return $ret;
    }

    /**
     * Return a well-formed XML string based on Ckfinder_Connector_Utils_XmlNode element.
     *
     * @return string
     */
    public function asXML()
    {
        $ret = '<'.$this->_name;

        //print Attributes
        if (sizeof($this->_attributes) > 0) {
            foreach ($this->_attributes as $_name => $_value) {
                $ret .= ' '.$_name.'="'.htmlspecialchars($this->asUTF8($_value)).'"';
            }
        }

        //if there is nothing more todo, close empty tag and exit
        if (is_null($this->_value) && !sizeof($this->_childNodes)) {
            $ret .= ' />';

            return $ret;
        }

        //close opening tag
        $ret .= '>';

        //print value
        if (!is_null($this->_value)) {
            $ret .= htmlspecialchars($this->asUTF8($this->_value));
        }

        //print child nodes
        if (sizeof($this->_childNodes) > 0) {
            foreach ($this->_childNodes as $_node) {
                $ret .= $_node->asXml();
            }
        }

        $ret .= '</'.$this->_name.'>';

        return $ret;
    }
}
