<?php

namespace VuBa\States;

class ClickWaitForFund extends ClickState
{
    public function getReadableAttributes()
    {
        $ret = array(
            'id',
            'subject',
            'created_at',
            'modified_at',
            'expired_at',
            'description',
            'clarification',
            'click_type',
            'category',
            'priority',
            'budget',
            'attachments',
            'proposals'
        );
        return $ret;
    }

    public function getWritableAttributes()
    {
        $ret = array(
            //'category'
        );
        return $ret;
    }

    public function getAllowedFunctions()
    {
        $ret    = array(
            'getClickAttributes',
            'setClickAttributes',
            'reOpenForProposal',
            'close',
            'requestForUserCertification',
            'goInProcessing'
        );

        return $ret;
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

        $writableAttributes = array_intersect($this->getWritableAttributes(),
            $attributes);
        return $this->getClick()->setByAttributes($writableAttributes);
    }

    public function reOpenForProposal()
    {
        $this->getClick()->setState(State::OPEN_FOR_PROPOSAL);
    }

    public function close()
    {
        $this->getClick()->setState(State::FINISHED);
    }

    public function requestForUserCertification()
    {
        $this->getClick()->setState(State::CLOSE_REQUEST_USER_CERTIFICATION);
    }

    public function goInProcessing()
    {
        $this->getClick()->setState(State::INPROCESSING);
    }
}