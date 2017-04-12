<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace VuBa\Entities;

/**
 * User 
 * 
 * @Entity
 * @Table(name="user")
 */
class User implements \JsonSerializable
{
    /**
     *  @var integer
     * 
     *  @Column(name="id", type="integer")
     *  @Id
     *  @GeneratedValue(strategy="AUTO")    
     */
    private $id;
    
    
    /**
     * @var string
     * 
     * @Column(name="sid", type="string", length=255)
     */
    private $sid;
    
    
    /**
     * @var string
     * 
     * @Column(name="displayname", type="string", length=255)
     */
    private $display_name;
    
    /**
     * @var string
     * 
     * @Column(name="title", type="string", length=5)
     */
    private $title;
    
    /**
     * @var integer
     * 
     * @Column(name="sex", type="smallint")
     */    
    private $sex;
    
    /**
     * @var string
     * 
     * @Column(name="description", type="string", length=255)
     */      
    private $description;

    /**
     * @var integer
     * 
     * @Column(name="create_at", type="datetime")
     */     
    private $create_at;

    /**
     * @var string
     * 
     * @Column(name="auth_source", type="string", length=255)
     */          
    private $auth_source;
    
    /**
     * @var integer
     * 
     * @Column(name="user_type", type="smallint")
     */           
    private $user_type;
    
    /**
     * @var integer
     * 
     * @Column(name="is_locked", type="boolean")
     */            
    private $is_locked;
            
            

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
     * Set sid
     *
     * @param string $sid
     *
     * @return User
     */
    public function setSid($sid)
    {
        $this->sid = $sid;

        return $this;
    }

    /**
     * Get sid
     *
     * @return string
     */
    public function getSid()
    {
        return $this->sid;
    }

    /**
     * Set displayName
     *
     * @param string $displayName
     *
     * @return User
     */
    public function setDisplayName($displayName)
    {
        $this->display_name = $displayName;

        return $this;
    }

    /**
     * Get displayName
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return User
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set sex
     *
     * @param integer $sex
     *
     * @return User
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return integer
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return User
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
     * Set createAt
     *
     * @param integer $createAt
     *
     * @return User
     */
    public function setCreateAt($createAt)
    {
        $this->create_at = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return integer
     */
    public function getCreateAt()
    {
        return $this->create_at;
    }

    /**
     * Set authSource
     *
     * @param string $authSource
     *
     * @return User
     */
    public function setAuthSource($authSource)
    {
        $this->auth_source = $authSource;

        return $this;
    }

    /**
     * Get authSource
     *
     * @return string
     */
    public function getAuthSource()
    {
        return $this->auth_source;
    }

    /**
     * Set userType
     *
     * @param integer $userType
     *
     * @return User
     */
    public function setUserType($userType)
    {
        $this->user_type = $userType;

        return $this;
    }

    /**
     * Get userType
     *
     * @return integer
     */
    public function getUserType()
    {
        return $this->user_type;
    }

    /**
     * Set isLocked
     *
     * @param integer $isLocked
     *
     * @return User
     */
    public function setIsLocked($isLocked)
    {
        $this->is_locked = $isLocked;

        return $this;
    }

    /**
     * Get isLocked
     *
     * @return integer
     */
    public function getIsLocked()
    {
        return $this->is_locked;
    }

    public function jsonSerialize() {
        $vars = get_object_vars($this);
        unset($vars["sid"]);
        return $vars;
    }

}
