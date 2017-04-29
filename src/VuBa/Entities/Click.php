<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace VuBa\Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * Click
 *
 * @ORM\Entity(repositoryClass="VuBa\Repository\ClickRepository")
 * @ORM\Table(name="click")
 *
  */
class Click
{
    /**
     *  @var integer
     *
     *  @ORM\Column(name="id", type="integer",nullable=false)
     *  @ORM\Id
     *  @ORM\GeneratedValue(strategy="AUTO")
     *
     */

    private $id;


    /**
     * Global Unique User Id (owner)
     * @var string
     *
     * @ORM\Column(name="uuid", type="string", length=36, options={"comment":"Global Unique User Id"}, nullable=false)
     *
     */
    private $uuid;


    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255, options={"comment":"Subject of the post"}, nullable=false)
     *
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="created_at", type="datetimetz", nullable=false)
     */
    private $created_at;


    /**
     * @var string
     *
     * @ORM\Column(name="modified_at", type="datetimetz", nullable=false)
     */
    private $modified_at;

    /**
     * @var string
     *
     * @ORM\Column(name="expired_at", type="datetimetz", nullable=true)
     */
    private $expired_at;


    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", options={"comment":"Detail of click"}, nullable=false)
     *
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="clarification", type="text", options={"comment":"Clarification of click"}, nullable=true)
     *
     */
    private $clarification;


    /**
     * @var integer
     *
     * @ORM\Column(name="click_type", type="smallint")
     *
     * - 0: remote
     * - 1: sur place
     */
    private $click_type = 0;


    /**
     * @ORM\ManyToOne(targetEntity="ClickCategory", inversedBy="clicks")
     * @ORM\JoinColumn(name="category", referencedColumnName="name")
     *
     */
    private $category;

    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="smallint")
     *
     * - default: 1
     * - 0: prepare (not publish)
     * - 1: open
     * - 2: open_wait_for_user_acceptance. Close for proposal posting. In this state, owner selected a candidate and wait for his/her agreement
     *      user can: 1: ask for warranty; 2: accept and go to in processing. 3: Reject
     * - 2.1: wait for warranty
     * - 3: in_processing
     * - 4: finished_wait_for_owner_confirmation
     * - 5: finished
     */
    private $state = 0;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_private", type="boolean")
     *
     */
    private $is_private = false;


    /**
     * @var boolean
     *
     * @ORM\Column(name="priority", type="smallint")
     */
    private $priority = 0;

    /**
     * @var float
     *
     * @ORM\Column(name="budget", type="decimal", precision=2, scale=1)
     */
    private $budget = 0.00;


    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="ClickAttachment", mappedBy="click")
     *
     */
    private $attachments;


    /**
     * @var integer
     *
     * @ORM\Column(name="accepted_proposal", type="integer", nullable=true)
     */
    private $accepted_proposal;


    /**
     * @ORM\OneToMany(targetEntity="ClickProposal", mappedBy="click")
     */
    private $proposals;

    /**
     * @var string
     *
     * @ORM\Column(name="finished_owner_comments", type="text", nullable=true)
     *
     */
    private $finished_owner_comments;

    /**
     * @var string
     *
     * @ORM\Column(name="finished_worker_comments", type="text", nullable=true)
     *
     */
    private $finished_worker_comments;

    /**
     * @var string
     *
     * @ORM\Column(name="finished_admin_comments", type="text", nullable=true)
     *
     */
    private $finished_admin_comments;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->proposals = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set uuid
     *
     * @param string $uuid
     *
     * @return Click
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Get uuid
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Set subject
     *
     * @param string $subject
     *
     * @return Click
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Click
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set expiredAt
     *
     * @param \DateTime $expiredAt
     *
     * @return Click
     */
    public function setExpiredAt($expiredAt)
    {
        $this->expired_at = $expiredAt;

        return $this;
    }

    /**
     * Get expiredAt
     *
     * @return \DateTime
     */
    public function getExpiredAt()
    {
        return $this->expired_at;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Click
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set clickType
     *
     * @param integer $clickType
     *
     * @return Click
     */
    public function setClickType($clickType)
    {
        $this->click_type = $clickType;

        return $this;
    }

    /**
     * Get clickType
     *
     * @return integer
     */
    public function getClickType()
    {
        return $this->click_type;
    }

    /**
     * Set categoryId
     *
     * @param integer $categoryId
     *
     * @return Click
     */
    public function setCategoryId($categoryId)
    {
        $this->category_id = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return integer
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set state
     *
     * @param integer $state
     *
     * @return Click
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set isPrivate
     *
     * @param boolean $isPrivate
     *
     * @return Click
     */
    public function setIsPrivate($isPrivate)
    {
        $this->is_private = $isPrivate;

        return $this;
    }

    /**
     * Get isPrivate
     *
     * @return boolean
     */
    public function getIsPrivate()
    {
        return $this->is_private;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return Click
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set budget
     *
     * @param string $budget
     *
     * @return Click
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return string
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set attachments
     *
     * @param array $attachments
     *
     * @return Click
     */
    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;

        return $this;
    }

    /**
     * Get attachments
     *
     * @return array
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * Set acceptedProposal
     *
     * @param integer $acceptedProposal
     *
     * @return Click
     */
    public function setAcceptedProposal($acceptedProposal)
    {
        $this->accepted_proposal = $acceptedProposal;

        return $this;
    }

    /**
     * Get acceptedProposal
     *
     * @return integer
     */
    public function getAcceptedProposal()
    {
        return $this->accepted_proposal;
    }

    /**
     * Add proposal
     *
     * @param \VuBa\Entities\ClickProposal $proposal
     *
     * @return Click
     */
    public function addProposal(\VuBa\Entities\ClickProposal $proposal)
    {
        $this->proposals[] = $proposal;

        return $this;
    }

    /**
     * Remove proposal
     *
     * @param \VuBa\Entities\ClickProposal $proposal
     */
    public function removeProposal(\VuBa\Entities\ClickProposal $proposal)
    {
        $this->proposals->removeElement($proposal);
    }

    /**
     * Get proposals
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProposals()
    {
        return $this->proposals;
    }

    /**
     * Add attachment
     *
     * @param \VuBa\Entities\ClickAttachment $attachment
     *
     * @return Click
     */
    public function addAttachment(\VuBa\Entities\ClickAttachment $attachment)
    {
        $this->attachments[] = $attachment;

        return $this;
    }

    /**
     * Remove attachment
     *
     * @param \VuBa\Entities\ClickAttachment $attachment
     */
    public function removeAttachment(\VuBa\Entities\ClickAttachment $attachment)
    {
        $this->attachments->removeElement($attachment);
    }

    /**
     * Set category
     *
     * @param \VuBa\Entities\ClickCategory $category
     *
     * @return Click
     */
    public function setCategory(\VuBa\Entities\ClickCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \VuBa\Entities\ClickCategory
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set clarification
     *
     * @param string $clarification
     *
     * @return Click
     */
    public function setClarification($clarification)
    {
        $this->clarification = $clarification;

        return $this;
    }

    /**
     * Get clarification
     *
     * @return string
     */
    public function getClarification()
    {
        return $this->clarification;
    }

    /**
     * Get modified
     */
    public function getModifiedAt()
    {
        return $this->modified_at;
    }

    /**
     * ===================================
     */

    /**
     * @param array $attributes
     * @return array
     */
    public function getByAttributes(array $attributes){
        if(empty($attributes)) return [];

        $ret = [];
        foreach($attributes as $attribute)
        {
            $att = strtolower($attribute);
            switch($att)
            {
                case 'id':
                    $ret[$att] = $this->getId();
                    break;
                case 'uuid':
                    $ret[$att] = $this->getUuid();
                    break;
                case 'subject':
                    $ret[$att] = $this->getSubject();
                    break;
                case 'created_at':
                    $ret[$att] = $this->getCreatedAt();
                    break;
                case 'modified_at':
                    $ret[$att] = $this->getModifiedAt();
                    break;
                case 'expired_at':
                    $ret[$att] = $this->getExpiredAt();
                    break;
                case 'description':
                    $ret[$att] = $this->getDescription();
                    break;
                case 'clarification':
                    $ret[$att] = $this->getClarification();
                    break;
                case 'click_type':
                    $ret[$att] = $this->getClickType();
                    break;
                case 'category':
                    $ret[$att] = $this->getCategory();
                    break;
                case 'is_private':
                    $ret[$att] = $this->getIsPrivate();
                    break;
                case 'priority':
                    $ret[$att] = $this->getPriority();
                    break;
                case 'budget':
                    $ret[$att] = $this->getBudget();
                    break;
                case 'attachments':
                    $ret[$att] = $this->getAttachments();
                    break;
                case 'accepted_proposal':
                    $ret[$att] = $this->getAcceptedProposal();
                    break;
                case 'proposals':
                    $ret[$att] = $this->getProposals();
                    break;
                default:
                    break;
            }
        }

        return $ret;
    }

    public function setByAttributes(array $attributes){
        if(empty($attributes)) return [];

        foreach($attributes as $attribute => $value)
        {
            $att = strtolower($attribute);
            switch($att)
            {
                case 'id':
                    // do nothing
                    break;
                case 'uuid':
                    // do nothing
                    break;
                case 'subject':
                    $this->setSubject($value);
                    break;
                case 'created_at':
                    // no nothing
                    break;
                case 'modified_at':
                    // do nothing
                    break;
                case 'expired_at':
                    $this->setExpiredAt($value);
                    break;
                case 'description':
                    $this->setDescription($value);
                    break;
                case 'clarification':
                    $this->setClarification($value);
                    break;
                case 'click_type':
                    $this->setClickType($value);
                    break;
                case 'category':
                    $this->setCategory($value);
                    break;
                case 'is_private':
                    $this->setIsPrivate($value);
                    break;
                case 'priority':
                    $this->setPriority($value);
                    break;
                case 'budget':
                    $this->setBudget($value);
                    break;
                case 'attachments':
                    $this->setAttachments($value);
                    break;
                case 'accepted_proposal':
                    $this->setAcceptedProposal($value);
                    break;
                case 'proposals':
                    $this->addProposal($value);
                    break;
                default:
                    break;
            }
        }
    }

    public function isFunded()
    {
        // TODO
        // call payment service
        return false;
    }

    /**
     * Set modifiedAt
     *
     * @param \DateTime $modifiedAt
     *
     * @return Click
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modified_at = $modifiedAt;

        return $this;
    }

    /**
     * Set finishedOwnerComments
     *
     * @param string $finishedOwnerComments
     *
     * @return Click
     */
    public function setFinishedOwnerComments($finishedOwnerComments)
    {
        $this->finished_owner_comments = $finishedOwnerComments;

        return $this;
    }

    /**
     * Get finishedOwnerComments
     *
     * @return string
     */
    public function getFinishedOwnerComments()
    {
        return $this->finished_owner_comments;
    }

    /**
     * Set finishedWorkerComments
     *
     * @param string $finishedWorkerComments
     *
     * @return Click
     */
    public function setFinishedWorkerComments($finishedWorkerComments)
    {
        $this->finished_worker_comments = $finishedWorkerComments;

        return $this;
    }

    /**
     * Get finishedWorkerComments
     *
     * @return string
     */
    public function getFinishedWorkerComments()
    {
        return $this->finished_worker_comments;
    }

    /**
     * Set finishedAdminComments
     *
     * @param string $finishedAdminComments
     *
     * @return Click
     */
    public function setFinishedAdminComments($finishedAdminComments)
    {
        $this->finished_admin_comments = $finishedAdminComments;

        return $this;
    }

    /**
     * Get finishedAdminComments
     *
     * @return string
     */
    public function getFinishedAdminComments()
    {
        return $this->finished_admin_comments;
    }

    public function getIdCache()
    {
        return 'click'.$this->id;
    }
}
