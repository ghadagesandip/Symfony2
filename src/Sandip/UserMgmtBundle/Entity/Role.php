<?php

namespace Sandip\UserMgmtBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 * @ORM\Table(name="role")
 * @ORM\Entity
 */
class Role
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="role", type="string", length=50)
     */
    private $role;

    /**
     * @var \DateTime()
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @var \DateTime()
     * @ORM\Column(name="modified_at", type="datetime", nullable=true)
     */
    private $modified_at;


    /**
     * Set id
     *
     * @param integer $id
     * @return Role
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set role
     *
     * @param string $role
     * @return Role
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Role
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set modified_at
     *
     * @param \DateTime $modifiedAt
     * @return Role
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modified_at = $modifiedAt;

        return $this;
    }

    /**
     * Get modified_at
     *
     * @return \DateTime 
     */
    public function getModifiedAt()
    {
        return $this->modified_at;
    }
}
