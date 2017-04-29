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

    public function getDetail($format = Format::JSON)
    {
        switch($format)
        {
            case Format::JSON:
                return json_encode($this->getRawDetail(), JSON_PRETTY_PRINT);
                break;
            case Format::XML:
                break;
            default:
                break;
        }
    }

    public function getRawDetail()
    {
        $ret = array();

        $ret['id'] = $this->click->getId();
        $ret['subject'] = $this->click->getSubject();
        $ret['created_at'] = $this->click->getCreatedAt();
        $ret['expired_at'] = $this->click->getExpiredAt();
        $ret['description'] = $this->click->getDescription();
        $ret['clarification']   = $this->click->getClarification();
        $ret['click_type']= $this->click->getClickType();
        $ret['category'] = $this->click->getCategory();
        $ret['is_private'] = $this->click->getIsPrivate();
        $ret['priority'] = $this->click->getPriority();
        $ret['budget'] = $this->click->getBudget();
        $ret['attachments'] = $this->click->getAttachments();

        return $ret;
    }

    public function getClick($returnAttributes = array())
    {

    }
}
