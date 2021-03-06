<?php

namespace TranslationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Projects
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="TranslationsBundle\Repository\ProjectsRepository")
 */
class Project
{

    /**
     * @ORM\ManyToOne(targetEntity="LanguagePair", inversedBy="projects")
     * @ORM\JoinColumn(name="languagePair_id", referencedColumnName="id")
     */
    private $languagePair;
    
    /**
     * @ORM\ManyToOne(targetEntity="Translator", inversedBy="projects")
     * @ORM\JoinColumn(name="translator_id", referencedColumnName="id")
     */
    private $translator;
    
     /**
     * @ORM\ManyToOne(targetEntity="Proofreader", inversedBy="projects")
     * @ORM\JoinColumn(name="proofreader_id", referencedColumnName="id")
     */
    private $proofreader;
    
    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="projects")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;
    
    
    
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
     * @ORM\Column(name="projectName", type="string", length=255, unique=true)
     */
    private $projectName;

    /**
     * @var int
     *
     * @ORM\Column(name="length", type="integer")
     */
    private $length;

    /**
     * @var string
     *
     * @ORM\Column(name="pathToSource", type="string", length=255)
     */
    private $pathToSource;

    /**
     * @var string
     *
     * @ORM\Column(name="pathToTranslation", type="string", length=255)
     */
    private $pathToTranslation;

    /**
     * @var string
     *
     * @ORM\Column(name="pathToVerified", type="string", length=255, unique=true)
     */
    private $pathToVerified;

    /**
     * @var int
     *
     * @ORM\Column(name="grade", type="integer", nullable=true)
     */
    private $grade;


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
     * Set projectName
     *
     * @param string $projectName
     * @return Projects
     */
    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;

        return $this;
    }

    /**
     * Get projectName
     *
     * @return string 
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * Set length
     *
     * @param integer $length
     * @return Projects
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return integer 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set pathToSource
     *
     * @param string $pathToSource
     * @return Projects
     */
    public function setPathToSource($pathToSource)
    {
        $this->pathToSource = $pathToSource;

        return $this;
    }

    /**
     * Get pathToSource
     *
     * @return string 
     */
    public function getPathToSource()
    {
        return $this->pathToSource;
    }

    /**
     * Set pathToTranslation
     *
     * @param string $pathToTranslation
     * @return Projects
     */
    public function setPathToTranslation($pathToTranslation)
    {
        $this->pathToTranslation = $pathToTranslation;

        return $this;
    }

    /**
     * Get pathToTranslation
     *
     * @return string 
     */
    public function getPathToTranslation()
    {
        return $this->pathToTranslation;
    }

    /**
     * Set pathToVerified
     *
     * @param string $pathToVerified
     * @return Projects
     */
    public function setPathToVerified($pathToVerified)
    {
        $this->pathToVerified = $pathToVerified;

        return $this;
    }

    /**
     * Get pathToVerified
     *
     * @return string 
     */
    public function getPathToVerified()
    {
        return $this->pathToVerified;
    }

    /**
     * Set grade
     *
     * @param integer $grade
     * @return Projects
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return integer 
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set languagePair
     *
     * @param \TranslationsBundle\Entity\LanguagePair $languagePair
     * @return Project
     */
    public function setLanguagePair(\TranslationsBundle\Entity\LanguagePair $languagePair = null)
    {
        $this->languagePair = $languagePair;

        return $this;
    }

    /**
     * Get languagePair
     *
     * @return \TranslationsBundle\Entity\LanguagePair 
     */
    public function getLanguagePair()
    {
        return $this->languagePair;
    }

    /**
     * Set translator
     *
     * @param \TranslationsBundle\Entity\Translator $translator
     * @return Project
     */
    public function setTranslator(\TranslationsBundle\Entity\Translator $translator = null)
    {
        $this->translator = $translator;

        return $this;
    }

    /**
     * Get translator
     *
     * @return \TranslationsBundle\Entity\Translator 
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * Set client
     *
     * @param \TranslationsBundle\Entity\Client $client
     * @return Project
     */
    public function setClient(\TranslationsBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \TranslationsBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set proofreader
     *
     * @param \TranslationsBundle\Entity\Proofreader $proofreader
     * @return Project
     */
    public function setProofreader(\TranslationsBundle\Entity\Proofreader $proofreader = null)
    {
        $this->proofreader = $proofreader;

        return $this;
    }

    /**
     * Get proofreader
     *
     * @return \TranslationsBundle\Entity\Proofreader 
     */
    public function getProofreader()
    {
        return $this->proofreader;
    }
}
