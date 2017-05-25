<?php

namespace VuBa\Services\Attachment;

use VuBa\Services\Attachment\AbstractAttachment;

class FactoryAttachment
{
    public function  getStorageEngine($storageType = 'file')
    {
        switch(strtolower($storageType))
        {
            case 'file':
                $storage = new FileStorageAttachment();
                return $storage;
                break;

            case 'mysql';

                break;

            case 'service':

                break;
        }
    }

}