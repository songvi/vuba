<?php

namespace VuBa\States;

use VuBa\Entities\Click;

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
        return array();
    }
    public function getAllowedFunctions()
    {
        return array();
    }



    public function setClickAttributes($attributes = array())
    {

    }

    public function getClickAttributes($returnAttributes = array())
    {

    }
}
