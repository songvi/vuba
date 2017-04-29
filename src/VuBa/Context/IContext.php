<?php

namespace VuBa\Context;

interface IContext
{
    /**
    * return
    */
    public function isEmpty();

    public function getUserId();

    public function getUuid();

    /**
    * - api
    * - web
    * -cli
    */
    public function getMode();

    public function getUserMode();
}
