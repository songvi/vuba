<?php

namespace VuBa\Services\Attachment;

use Vuba\Services\Attachment\AbstractAttachment;

class FileStorageAttachment extends AbstractAttachment
{
    protected $workingDir;

    public function init($appId, $objectClass, $objectId, $fileName, $fileType)
    {
        parent::init($appId, $objectClass, $objectId, $fileName, $fileType);
    }

    public function  setWorkingDir($workingDir)
    {
        $this->workingDir = $workingDir;
    }

    public function save($binaryData)
    {
        $fileName = $this->workingDir.DIRECTORY_SEPARATOR.$this->attachId;
        if(file_exists($fileName)) return false;

        file_put_contents($fileName, $binaryData);
        return $this->attachId;
    }

    public function get()
    {
        $fileName = $this->workingDir.DIRECTORY_SEPARATOR.$this->attachId;
        if(file_exists($fileName))
        {
            return file_get_contents($fileName);
        }
        return false;
    }
}