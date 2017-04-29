<?php

namespace VuBa\Serialize;


use VuBa\States\ClickState;

class ClickSerializer
{
    public function __construct(ClickState $clickState)
    {
        $ret = array();
        foreach($clickState->getAllowedAttributes() as $attribute)
        {

        }
    }
}