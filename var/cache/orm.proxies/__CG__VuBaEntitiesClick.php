<?php

namespace DoctrineProxy\__CG__\VuBa\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Click extends \VuBa\Entities\Click implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'id', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'uuid', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'subject', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'created_at', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'expired_at', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'description', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'clarification', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'click_type', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'category', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'state', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'is_private', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'priority', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'budget', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'attachments', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'accepted_proposal', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'proposals'];
        }

        return ['__isInitialized__', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'id', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'uuid', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'subject', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'created_at', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'expired_at', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'description', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'clarification', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'click_type', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'category', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'state', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'is_private', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'priority', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'budget', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'attachments', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'accepted_proposal', '' . "\0" . 'VuBa\\Entities\\Click' . "\0" . 'proposals'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Click $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setUuid($uuid)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUuid', [$uuid]);

        return parent::setUuid($uuid);
    }

    /**
     * {@inheritDoc}
     */
    public function getUuid()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUuid', []);

        return parent::getUuid();
    }

    /**
     * {@inheritDoc}
     */
    public function setSubject($subject)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSubject', [$subject]);

        return parent::setSubject($subject);
    }

    /**
     * {@inheritDoc}
     */
    public function getSubject()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSubject', []);

        return parent::getSubject();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt($createdAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', [$createdAt]);

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', []);

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setExpiredAt($expiredAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setExpiredAt', [$expiredAt]);

        return parent::setExpiredAt($expiredAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getExpiredAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getExpiredAt', []);

        return parent::getExpiredAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescription', [$description]);

        return parent::setDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescription', []);

        return parent::getDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setClickType($clickType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClickType', [$clickType]);

        return parent::setClickType($clickType);
    }

    /**
     * {@inheritDoc}
     */
    public function getClickType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClickType', []);

        return parent::getClickType();
    }

    /**
     * {@inheritDoc}
     */
    public function setCategoryId($categoryId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCategoryId', [$categoryId]);

        return parent::setCategoryId($categoryId);
    }

    /**
     * {@inheritDoc}
     */
    public function getCategoryId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCategoryId', []);

        return parent::getCategoryId();
    }

    /**
     * {@inheritDoc}
     */
    public function setState($state)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setState', [$state]);

        return parent::setState($state);
    }

    /**
     * {@inheritDoc}
     */
    public function getState()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getState', []);

        return parent::getState();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsPrivate($isPrivate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsPrivate', [$isPrivate]);

        return parent::setIsPrivate($isPrivate);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsPrivate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsPrivate', []);

        return parent::getIsPrivate();
    }

    /**
     * {@inheritDoc}
     */
    public function setPriority($priority)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPriority', [$priority]);

        return parent::setPriority($priority);
    }

    /**
     * {@inheritDoc}
     */
    public function getPriority()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPriority', []);

        return parent::getPriority();
    }

    /**
     * {@inheritDoc}
     */
    public function setBudget($budget)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBudget', [$budget]);

        return parent::setBudget($budget);
    }

    /**
     * {@inheritDoc}
     */
    public function getBudget()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBudget', []);

        return parent::getBudget();
    }

    /**
     * {@inheritDoc}
     */
    public function setAttachments($attachments)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAttachments', [$attachments]);

        return parent::setAttachments($attachments);
    }

    /**
     * {@inheritDoc}
     */
    public function getAttachments()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAttachments', []);

        return parent::getAttachments();
    }

    /**
     * {@inheritDoc}
     */
    public function setAcceptedProposal($acceptedProposal)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAcceptedProposal', [$acceptedProposal]);

        return parent::setAcceptedProposal($acceptedProposal);
    }

    /**
     * {@inheritDoc}
     */
    public function getAcceptedProposal()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAcceptedProposal', []);

        return parent::getAcceptedProposal();
    }

    /**
     * {@inheritDoc}
     */
    public function addProposal(\VuBa\Entities\ClickProposal $proposal)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addProposal', [$proposal]);

        return parent::addProposal($proposal);
    }

    /**
     * {@inheritDoc}
     */
    public function removeProposal(\VuBa\Entities\ClickProposal $proposal)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeProposal', [$proposal]);

        return parent::removeProposal($proposal);
    }

    /**
     * {@inheritDoc}
     */
    public function getProposals()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProposals', []);

        return parent::getProposals();
    }

    /**
     * {@inheritDoc}
     */
    public function addAttachment(\VuBa\Entities\ClickAttachment $attachment)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addAttachment', [$attachment]);

        return parent::addAttachment($attachment);
    }

    /**
     * {@inheritDoc}
     */
    public function removeAttachment(\VuBa\Entities\ClickAttachment $attachment)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeAttachment', [$attachment]);

        return parent::removeAttachment($attachment);
    }

    /**
     * {@inheritDoc}
     */
    public function setCategory(\VuBa\Entities\ClickCategory $category = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCategory', [$category]);

        return parent::setCategory($category);
    }

    /**
     * {@inheritDoc}
     */
    public function getCategory()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCategory', []);

        return parent::getCategory();
    }

    /**
     * {@inheritDoc}
     */
    public function setClarification($clarification)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClarification', [$clarification]);

        return parent::setClarification($clarification);
    }

    /**
     * {@inheritDoc}
     */
    public function getClarification()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClarification', []);

        return parent::getClarification();
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'jsonSerialize', []);

        return parent::jsonSerialize();
    }

}
