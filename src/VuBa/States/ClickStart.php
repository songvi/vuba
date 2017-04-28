<?php
namespace VuBa\State;
use VuBa\States\ClickState;

class ClickStart extends ClickState
{
    public function getAllowedAttributes()
    {
        $ret = array(
            'id',
            'subject',
            'create_at',
            'modify_at',
            'expired_at',
            'description',
            'clarification',
            'click_type',
            'category',
            'priority',
            'budget'
        );
        return $ret;
    }

    public function getAllowedFunctions()
    {

    }
}
