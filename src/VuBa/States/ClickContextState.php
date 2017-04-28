<?php

namespace VuBa\State;
use VuBa\States\ClickState;

class ClickContextState
{

    /**
    *   @var ClickState
    */
    private $state;

    public function setState(ClickState $clickState)
    {
        $this->state = $clickState;
    }

    public function getState(){
        return $this->state;
    }
}
