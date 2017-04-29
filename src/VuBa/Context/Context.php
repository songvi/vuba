<?php

namespace VuBa\Context;

use VuBa\Context\IContext;
class Context implements IContext
{
    const MODE_CLI = 'cli';
    const MODE_WEB = 'web';
    const MODE_API = 'api';

    const   UM_ANONYMOUS    = 1;
    const   UM_LOGGED       = 2;
    const   UM_OWNER        = 3;
    const   UM_PARTICIPATE  = 4;
    const   UM_SELECTED     = 5;
    const   UM_MODERATE     = 6;
    const   UM_ADMIN        = 100;

    private $userId;

    private $requestMode;

    private $userObject;
    /**
    * return
    */
    public function isEmpty(){
        return empty($this->userId);
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getUuid()
    {
        // TODO
        return ;
    }
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
    * - api
    * - web
    * - cli
    */
    public function getMode(){
        if(php_sapi_name() == "cli"){
            $this->requestMode = Context::MODE_CLI;
        }
        else {
            $this->requestMode = Context::MODE_WEB;
        }
    }


    public function getUserMode()
    {

    }
}
