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
            'budget',
            'attachments'
        );
        return $ret;
    }

    public function getAllowedFunctions()
    {
        $ret    = array(
            //'getdetail',
            //'getclick'
        );

        return $ret;
    }

    /*
    public function getDetail($format)
    {
        return parent::getDetail($format);
    }

    public function getClick($returnAttributes = array())
    {
        $ret = array();
        foreach($returnAttributes as $attribute)
        {
            if(in_array($attribute, $this->getAllowedAttributes()))
            {
                $ret[$attribute] = $this->getRawDetail()[$attribute];
            }
        }
    }
    */
}
