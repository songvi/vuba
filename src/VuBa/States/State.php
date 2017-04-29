<?php

namespace VuBa\States;

class State
{
    const   START = 0;
    const   OPEN_FOR_PROPOSAL = 1;
    const   CLOSE_FOR_NEGOCIATION = 2;

    // issued by user
    const   CLOSE_FUND_REQUEST  = 3;

    // fund updated, wait for admin confirmation
    const   CLOSE_FUND_WAIT_FOR_ADMIN_CONFIRMATION = 4;

    // issued by ownder
    const   CLOSE_REQUEST_USER_CERTIFICATION = 5;

    // user updated profile, identity ...
    const   CLOSE_REQUEST_USER_WAIT_FOR_ADMIN_CONFIRMATION = 6;

    const   INPROCESSING = 7;

    const   FINISHED_WAIT_FOR_CONFIRMATION_OWNER = 8;

    const   FINISHED_WAIT_FOR_CONFIRMATION_USER = 9;

    const   FINISHED_WAIT_FOR_CONFIRMATION_ADMIN = 10;

    const   CLOSE_USER_REJECT   = 11;

    const   FUND_TRANSFER_REQUEST = 12;

    const   FINISHED = 100;
}
