<?php

namespace VuBa\Serialize;

use VuBa\States\ClickState;
use VuBa\Utilities\StringHelper;

class ClickSerializer implements \JsonSerializable
{
    /**
     * @var ClickState
     */
    private $clickState;

    public function __construct(ClickState $clickState)
    {
        $this->clickState = $clickState;
    }

    public function jsonSerialize(){
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
        //$ret = StringHelper::utf8_converter($ret);
        return $ret;
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
        //$ret = StringHelper::utf8_converter($ret);
        return $ret;
    }

    public function toArrayWithAttribute(array $attributes){
        $readableAtt = $this->clickState->getClick()->getByAttributes(
            $this->clickState->getReadableAttributes());
        $ret = array_intersect_key($readableAtt, array_flip($attributes));
        //$ret = StringHelper::utf8_converter($ret);
        return $ret;
    }
}