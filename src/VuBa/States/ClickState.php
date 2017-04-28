<?php

namespace VuBa\States;

use VuBa\Context\Context;
use Vuba\States\State;
use VuBa\Entities\Click;
use VuBa\States\ClickContextState;

class ClickState
{
    private $state = State::START;
    private $click;

    public function __construct(Click $click)
    {
        $this->click = $click;
    }

    public function setClick(Click $click)
    {

    }
    public function getAllowedAttributes()
    {

    }

    public function getAllowedFunctions()
    {

    }

    public function nextState(ClickContextState $clickContextState)
    {
        $clickContextState.setState(this);
    }
}
