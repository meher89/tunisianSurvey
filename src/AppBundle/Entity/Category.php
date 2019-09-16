<?php
    
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="category")
*/
class Category extends AbstractEntity {
   
   /**
    * 
    * @ORM\Column(type="string")
    * 
   */
   private $name;

   /**
    * 
    * @ORM\Column(type="string")
    * 
   */
   private $label;
   
   /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Survey", mappedBy="category")
   */   
   private $surveys;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->surveys = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Category
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
     * Set label
     *
     * @param string $label
     *
     * @return Category
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Add survey
     *
     * @param \AppBundle\Entity\Survey $survey
     *
     * @return Category
     */
    public function addSurvey(\AppBundle\Entity\Survey $survey)
    {
        $this->surveys[] = $survey;
        $survey->setCategory($this);
        return $this;
    }

    /**
     * Remove survey
     *
     * @param \AppBundle\Entity\Survey $survey
     */
    public function removeSurvey(\AppBundle\Entity\Survey $survey)
    {
        $this->surveys->removeElement($survey);
    }

    /**
     * Get surveys
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSurveys()
    {
        return $this->surveys;
    }
}
