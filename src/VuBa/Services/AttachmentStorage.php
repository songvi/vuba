<?php

namespace VuBa\Services;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use VuBa\Services\Attachment\FactoryAttachment;
use VuBa\Services\Attachment\AbstractAttachment;
use VuBa\Services\Attachment\FileStorageAttachment;

class AttachmentStorage implements ServiceProviderInterface
{

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        // TODO: Implement register() method.
        $factoryAttachment = new FactoryAttachment();

        $fac = $factoryAttachment->getStorageEngine($pimple['attachment.storage.type']);
        $fac->setWorkingDir($pimple['attachment.working.dir']);
        //$factoryAttachment
        $pimple['attachment.service'] = $fac;
    }
}