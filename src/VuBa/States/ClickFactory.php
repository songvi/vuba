<?php

namespace VuBa\State;

use VuBa\States\ClickCloseForNegociation;
use VuBa\States\ClickFinished;
use VuBa\States\ClickInProcessing;
use VuBa\States\ClickOpenForProposal;
use VuBa\States\ClickState;
use VuBa\States\ClickWaitForFund;
use VuBa\States\State;
use VuBa\Entities\Click;

class ClickFactory
{

    /**
    *   @var ClickState
    */
    private $state = null;

    /**
    *   @var Click
    *
    */
    public function __construct(Click $click)
    {
        if(!($click instanceof Click)) return;
        switch($click->getState())
        {
            case State::OPEN_FOR_PROPOSAL:
                $clickState = new ClickOpenForProposal($click);
                break;

            case State::CLOSE_FUND_REQUEST:
                $clickState = new ClickWaitForFund($click);
                break;

            case State::FINISHED:
                $clickState = new ClickFinished($click);
                break;

            case State::INPROCESSING:
                $clickState = new ClickInProcessing($click);
                break;

            case State::CLOSE_FOR_NEGOCIATION:
                $clickState = new ClickCloseForNegociation($click);
                break;

            case State::START   :
                $clickState = new ClickStart($click);
                break;

            default:
                $clickState = new ClickStart($click);
                break;
        }
        $this->state = $clickState;
    }

    public function setState(ClickState $clickState)
    {
        $this->state = $clickState;
    }

    public function getState(){

        return $this->state;
    }

    public function getClick(){
        return $this->getClick();
    }
}
