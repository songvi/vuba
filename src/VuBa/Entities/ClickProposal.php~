<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace VuBa\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClickProposal
 *
 * @ORM\Entity(repositoryClass="VuBa\Repository\ClickProposalRepository")
 * @ORM\Table(name="click_proposal")
 *
 *
 */
class ClickProposal
{
    /**
     *  @var integer
     *
     *  @ORM\Column(name="id", type="integer")
     *  @ORM\Id
     *  @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity="Click", inversedBy="proposals")
     * @ORM\JoinColumn(name="click_id", referencedColumnName="id")
     *
     */
    private $click;

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
     * @ORM\Column(name="created_at", type="datetimetz", nullable=false)
     */
    private $created_at;


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
     * @ORM\Column(name="description", type="text", options={"comment":"Detail of click"}, nullable=false)
     *
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="estimated_budget", type="decimal", precision=2, scale=1)
     */
    private $estimated_budget;


    /**
     * @var string
     *
     * @ORM\Column(name="attachments", type="simple_array", nullable=true)
     */
    private $attachments;

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
     * Set clickid
     *
     * @param integer $clickid
     *
     * @return ClickProposal
     */
    public function setClickid($clickid)
    {
        $this->clickid = $clickid;

        return $this;
    }

    /**
     * Get clickid
     *
     * @return integer
     */
    public function getClickid()
    {
        return $this->clickid;
    }

    /**
     * Set uuid
     *
     * @param string $uuid
     *
     * @return ClickProposal
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ClickProposal
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
     * Set subject
     *
     * @param string $subject
     *
     * @return ClickProposal
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
     * Set description
     *
     * @param string $description
     *
     * @return ClickProposal
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
     * Set estimatedBudget
     *
     * @param string $estimatedBudget
     *
     * @return ClickProposal
     */
    public function setEstimatedBudget($estimatedBudget)
    {
        $this->estimated_budget = $estimatedBudget;

        return $this;
    }

    /**
     * Get estimatedBudget
     *
     * @return string
     */
    public function getEstimatedBudget()
    {
        return $this->estimated_budget;
    }

    /**
     * Set attachments
     *
     * @param array $attachments
     *
     * @return ClickProposal
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
     * Set click
     *
     * @param \VuBa\Entities\Click $click
     *
     * @return ClickProposal
     */
    public function setClick(\VuBa\Entities\Click $click = null)
    {
        $this->click = $click;

        return $this;
    }

    /**
     * Get click
     *
     * @return \VuBa\Entities\Click
     */
    public function getClick()
    {
        return $this->click;
    }


}
