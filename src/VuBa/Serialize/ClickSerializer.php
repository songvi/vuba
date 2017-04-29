<?php

namespace VuBa\Serialize;


use VuBa\States\ClickState;

class ClickSerializer
{
    /**
     * @var ClickState
     */
    private $clickState;

    public function __construct(ClickState $clickState)
    {
        $this->clickState = $clickState;
    }

    public function toJson(){
        $readableAtt = $this->clickState->getClick()->getByAttributes(
            $this->clickState->getReadableAttributes());

        $writableAtt = $this->clickState->getWritableAttributes();

        $funcs = $this->clickState->getAllowedFunctions();

        // TODO translated $funcs to ref
        $funcLinks = $funcs;

        $ret = array(
            'readable_att' => $readableAtt,
            'writable_att' => $writableAtt,
            'funcs'        => $funcLinks
        );

        return json_encode($ret);
    }

    public function toArray(){
        $readableAtt = $this->clickState->getClick()->getByAttributes(
            $this->clickState->getReadableAttributes());

        $writableAtt = $this->clickState->getWritableAttributes();

        $funcs = $this->clickState->getAllowedFunctions();

        // TODO translated $funcs to ref
        $funcLinks = $funcs;

        $ret = array(
            'readable_att' => $readableAtt,
            'writable_att' => $writableAtt,
            'funcs'        => $funcLinks
        );

        return $ret;
    }
}