<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace VuBa\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClickAttachment
 *
 * @ORM\Entity(repositoryClass="VuBa\Repository\ClickAttachmentRepository")
 * @ORM\Table(name="click_attachment")
 *
 *
 */
class ClickAttachment
{
    /**
     *  @var integer
     *
     *  @ORM\Column(name="id", type="string", length=32 ,nullable=false)
     *  @ORM\Id
     *  @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Click", inversedBy="attachments")
     * @ORM\JoinColumn(name="click_id", referencedColumnName="id")
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
     * @ORM\Column(name="name", type="string", length=255, options={"comment":"file name of the attachment"})
     *
     */
    private $name = "attachment";

    /**
     * @var string
     *
     * @ORM\Column(name="upload_at", type="datetimetz", nullable=false)
     */
    private $upload_at;


    /**
     * @var string
     *
     * @ORM\Column(name="absoluted_path", type="string", nullable=false)
     */
    private $path;

    /**
     * @var integer
     *
     * @ORM\Column(name="size", type="integer", nullable=false)
     */
    private $size;


    /**
     * Get id
     *
     * @return string
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
     * @return ClickAttachment
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
     * Set name
     *
     * @param string $name
     *
     * @return ClickAttachment
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set uploadAt
     *
     * @param \DateTime $uploadAt
     *
     * @return ClickAttachment
     */
    public function setUploadAt($uploadAt)
    {
        $this->upload_at = $uploadAt;

        return $this;
    }

    /**
     * Get uploadAt
     *
     * @return \DateTime
     */
    public function getUploadAt()
    {
        return $this->upload_at;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return ClickAttachment
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set size
     *
     * @param integer $size
     *
     * @return ClickAttachment
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set click
     *
     * @param \VuBa\Entities\Click $click
     *
     * @return ClickAttachment
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
