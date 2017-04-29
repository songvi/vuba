<?php

namespace VuBa\States;

use VuBa\States\State;
use \VuBa\Entities\ClickProposal;

class ClickOpenForProposal extends ClickState
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
            'clarification',
            'click_type',
            'category',
            'attachments'
        );
        return $ret;
    }

    public function getAllowedFunctions()
    {
        $ret    = array(
            'getClickAttributes',
            'setClickAttributes',
            'addProposal',
            'acceptProposal',
            'reOpenForProposal',
            'acceptProposal',
            'close'
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

    /**
     * @param \VuBa\Entities\ClickProposal $proposal
     * @return $this
     *
     */
    public function addProposal(ClickProposal $proposal)
    {
        $this->getClick()->addProposal($proposal);
        return $this;
    }

    /**
     * @param $proposalId
     * @return $this
     */
    public function acceptProposal($proposalId)
    {
        // Select proposal
        $this->getClick()->setAcceptedProposal($proposalId);

        // Change state
        $this->getClick()->setState(State::CLOSE_FOR_NEGOCIATION);
        return $this;
    }

    public function reOpenForProposal()
    {
        $this->getClick()->setState(State::OPEN_FOR_PROPOSAL);
    }

    public function close()
    {
        $this->getClick()->setState(State::FINISHED);
    }
}