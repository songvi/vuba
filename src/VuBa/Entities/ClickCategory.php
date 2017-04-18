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
 * @ORM\Entity(repositoryClass="VuBa\Repository\ClickCategoryRepository")
 * @ORM\Table(name="click_category")
 *
 *
 */
class ClickCategory
{
    /**
     *  @var integer
     *
     *  @ORM\Column(name="name", type="string", length=255)
     *  @ORM\Id
     *  @ORM\GeneratedValue(strategy="AUTO")
     *
     */

    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Click", mappedBy="category_id")
     */
    private $clicks;

    /**
     *  @var string
     *
     *  @ORM\Column(name="parent", type="string", nullable=true)
     *
     */

    private $parent;


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
     * Set parent
     *
     * @param integer $parent
     *
     * @return ClickCategory
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return integer
     */
    public function getParent()
    {
        return $this->parent;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clicks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add click
     *
     * @param \VuBa\Entities\Click $click
     *
     * @return ClickCategory
     */
    public function addClick(\VuBa\Entities\Click $click)
    {
        $this->clicks[] = $click;

        return $this;
    }

    /**
     * Remove click
     *
     * @param \VuBa\Entities\Click $click
     */
    public function removeClick(\VuBa\Entities\Click $click)
    {
        $this->clicks->removeElement($click);
    }

    /**
     * Get clicks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClicks()
    {
        return $this->clicks;
    }
}
