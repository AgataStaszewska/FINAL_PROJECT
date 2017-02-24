<?php

namespace TranslationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Proofreader
 *
 * @ORM\Table(name="proofreader")
 * @ORM\Entity(repositoryClass="TranslationsBundle\Repository\ProofreaderRepository")
 */
class Proofreader
{
    /**
     * @ORM\OneToMany(targetEntity="Project", mappedBy="proofreader")
     */
    
    private $projects;
    
    /**
     * @ORM\ManyToMany(targetEntity="LanguagePair", mappedBy="proofreaders")
     */
    private $languagePairs;
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=30)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, unique=true)
     */
    private $phone;


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
     * Set name
     *
     * @param string $name
     * @return Proofreader
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
     * Set surname
     *
     * @param string $surname
     * @return Proofreader
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Proofreader
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Proofreader
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projects = new \Doctrine\Common\Collections\ArrayCollection();
        $this->languagePairs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add projects
     *
     * @param \TranslationsBundle\Entity\Project $projects
     * @return Proofreader
     */
    public function addProject(\TranslationsBundle\Entity\Project $projects)
    {
        $this->projects[] = $projects;

        return $this;
    }

    /**
     * Remove projects
     *
     * @param \TranslationsBundle\Entity\Project $projects
     */
    public function removeProject(\TranslationsBundle\Entity\Project $projects)
    {
        $this->projects->removeElement($projects);
    }

    /**
     * Get projects
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Add languagePairs
     *
     * @param \TranslationsBundle\Entity\languagePair $languagePairs
     * @return Proofreader
     */
    public function addLanguagePair(\TranslationsBundle\Entity\languagePair $languagePairs)
    {
        $this->languagePairs[] = $languagePairs;

        return $this;
    }

    /**
     * Remove languagePairs
     *
     * @param \TranslationsBundle\Entity\languagePair $languagePairs
     */
    public function removeLanguagePair(\TranslationsBundle\Entity\languagePair $languagePairs)
    {
        $this->languagePairs->removeElement($languagePairs);
    }

    /**
     * Get languagePairs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLanguagePairs()
    {
        return $this->languagePairs;
    }
}
