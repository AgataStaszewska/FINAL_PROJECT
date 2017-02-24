<?php

namespace TranslationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * LanguagePair
 *
 * @ORM\Table(name="language_pair")
 * @ORM\Entity(repositoryClass="TranslationsBundle\Repository\LanguagePairRepository")
 */
class LanguagePair
{
    /**
     * @ORM\ManyToMany(targetEntity="Translator", inversedBy="languagePairs")
     * @ORM\JoinTable(name="translators_languagePairs")
     */
    private $translators;
    
    /**
     * @ORM\ManyToMany(targetEntity="Proofreader", inversedBy="languagePairs")
     * @ORM\JoinTable(name="proofreaders_languagePairs")
     */
    private $proofreaders;
    
    
    /**
     * @ORM\OneToMany(targetEntity="Project", mappedBy="languagePair")
     */
    private $projects;
    
    
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
     * @ORM\Column(name="languagePair", type="string", length=10, unique=true)
     */
    private $languagePair;


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
     * Set languagePair
     *
     * @param string $languagePair
     * @return LanguagePair
     */
    public function setLanguagePair($languagePair)
    {
        $this->languagePair = $languagePair;

        return $this;
    }

    /**
     * Get languagePair
     *
     * @return string 
     */
    public function getLanguagePair()
    {
        return $this->languagePair;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->translators = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projects = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add translators
     *
     * @param \TranslationsBundle\Entity\Translator $translators
     * @return LanguagePair
     */
    public function addTranslator(\TranslationsBundle\Entity\Translator $translators)
    {
        $this->translators[] = $translators;

        return $this;
    }

    /**
     * Remove translators
     *
     * @param \TranslationsBundle\Entity\Translator $translators
     */
    public function removeTranslator(\TranslationsBundle\Entity\Translator $translators)
    {
        $this->translators->removeElement($translators);
    }

    /**
     * Get translators
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTranslators()
    {
        return $this->translators;
    }

    /**
     * Add projects
     *
     * @param \TranslationsBundle\Entity\Project $projects
     * @return LanguagePair
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
     * Add proofreaders
     *
     * @param \TranslationsBundle\Entity\Proofreader $proofreaders
     * @return LanguagePair
     */
    public function addProofreader(\TranslationsBundle\Entity\Proofreader $proofreaders)
    {
        $this->proofreaders[] = $proofreaders;

        return $this;
    }

    /**
     * Remove proofreaders
     *
     * @param \TranslationsBundle\Entity\Proofreader $proofreaders
     */
    public function removeProofreader(\TranslationsBundle\Entity\Proofreader $proofreaders)
    {
        $this->proofreaders->removeElement($proofreaders);
    }

    /**
     * Get proofreaders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProofreaders()
    {
        return $this->proofreaders;
    }
}
