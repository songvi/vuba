<?php

namespace VuBa\Services;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use GUMP;

class InputFilter implements  ServiceProviderInterface
{
    private static $_instance;

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $container A container instance
     */
    public function register(Container $container)
    {
        $container['vuba.service.inputfilter'] = new self();
    }

    private function __construct(){}

    private function  __clone(){}

    public function getInstance()
    {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();

        return self::$_instance;
    }

    public function isValidJsonString($string)
    {
        $arrString = array('json' => $string);

        $validated = GUMP::is_valid($arrString, array(
            'json' => 'required|valid_json_string'
        ));
        return $validated;
    }

    public function sanitize(array $input, array $fields = array())
    {
        $gump = new GUMP();
        $ret = $gump->sanitize($input, $fields, true);
        return $ret;
    }
}