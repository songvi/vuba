<?php
namespace VuBa\State;
use VuBa\Context\IContext;
use VuBa\States\ClickState;
use VuBa\States\State;

class ClickStart extends ClickState
{
    public function getReadableAttributes()
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

    public function getWritableAttributes()
    {
        $ret = array(
            'subject',
            'expired_at',
            'description',
            'clarification',
            'click_type',
            'category',
            'budget',
            'attachments'
        );
        return $ret;
    }

    public function getAllowedFunctions()
    {
        $ret    = array(
            'getClickAttributes',
            'setClickAttributes',
            'publishForProposal'
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

    public function publishForProposal(IContext $context)
    {
        $this->getClick()->setState(State::CLOSE_FOR_NEGOCIATION);

        // TODO Save
        // TODO invalid cache
        // TODO notify

        return $this;
    }

    public function getClickAttributes($returnAttributes = array())
    {
        if(empty($returnAttributes)) return [];
        $readableAttributes = array_intersect($this->getReadableAttributes(),
                                                $returnAttributes);
        return $this->getClick()->getByAttributes($readableAttributes);
    }

    public function setClickAttributes($attributes = array())
    {
        if(empty($attributes)) return [];

        $writableAttributes = array_intersect($this->getReadableAttributes(),
                                                $attributes);
        return $this->getClick()->setByAttributes($writableAttributes);
    }
}
