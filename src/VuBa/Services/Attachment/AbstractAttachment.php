<?php

namespace Vuba\Services\Attachment;

class AbstractAttachment
{
    protected $appId;
    protected $objectClass;
    protected $objectId;
    protected $fileName;
    protected $fileType;
    protected $fileSize;
    protected $createdDate;
    protected $attachId;
    protected $salt = 'ZZddsoduf2346234';

    public function init($appId, $objectClass, $objectId, $fileName, $fileType)
    {
        $this->appId = $appId;
        $this->objectClass = $objectClass;
        $this->objectId = $objectId;
        $this->fileName = $fileName;
        $this->fileType = $fileType;

        $this->attachId = md5(strtolower($this->appId).
                                strtolower($this->objectClass).
                                strtolower($this->objectId).
                                strtolower($this->fileName).
                                strtolower($this->fileType).
                                $this->salt.
                                time());

    }

    public function save($binaryData)
    {
        return false;
    }

    public function getAttachments($attackId)
    {
        return false;
    }
}