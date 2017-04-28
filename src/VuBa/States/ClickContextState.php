<?php

namespace VuBa\State;
use VuBa\States\ClickState;
use VuBa\Context\IContext;

class ClickContextState
{

    /**
    *   @var ClickState
    */
    private $state;

    /**
    *   @var IContext
    */
    private $context;

    /**
    *   @var VuBa\Entities\Click
    *
    */
    public function __construct(Click $click, IContext $context)
    {
        $this->context = $context;

        // TOTO construct click state base on click object and context
        $clickState = new ClickState($click);
        $this->state = $clickState;
    }
    public function setState(ClickState $clickState)
    {
        $this->state = $clickState;
    }

    public function getState(){

        return $this->state;
    }
}
