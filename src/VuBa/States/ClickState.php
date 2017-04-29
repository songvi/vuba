<?php

namespace VuBa\States;

use VuBa\Context\Context;
use Vuba\States\State;
use VuBa\Entities\Click;
use VuBa\States\ClickContextState;

class ClickState
{
    protected $click;

    /**
     * @param Click $click
     */
    public function __construct(Click $click)
    {
        $this->click = $click;
        $this->click->setState(State::START);
    }

    public function setClick(Click $click)
    {

    }
    public function getClick()
    {
        return $this->click;
    }
    public function getReadableAttributes()
    {
        return array();
    }

    public function getWritableAttributes()
    {
        return $this;
    }
    public function getAllowedFunctions()
    {
        return array();
    }

    public function getRawDetail(array $attributes)
    {
        return array();
    }

    public function setClickAttributes($attributes = array())
    {

    }

    public function getClickAttributes($returnAttributes = array())
    {

    }

    public function publishForProposal(IContext $context)
    {
        $this->getClick()->setState(State::OPEN_FOR_PROPOSAL);
        return $this;
    }
}
