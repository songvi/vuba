<?php

namespace VuBa\Entities;

class ClickState
{
    const OPEN_PRIVATE = 0;
    const OPEN_PUBLIC = 1;
    const WAIT_FOR_USER_CERTIFY = 2;
    const WAIT_FOR_USER_ACCEPTANCE = 3;
    const WAIT_FOR_FUND = 4;
    const IN_PROCESSING = 5;
    const FINISHED_WAIT_FOR_CONFIRMATION = 6;
    const FINISHED = 100;
}