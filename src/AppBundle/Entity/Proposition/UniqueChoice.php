<?php
    
namespace AppBundle\Entity\Proposition;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Proposition;


/**
* @ORM\Entity
* 
*/
class UniqueChoice extends Proposition {
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Proposition\Choice", mappedBy="uniqueChoice")
    */
    private $choices;

    public function getType():string
    {
        return Proposition::TEXT;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->choices = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add choice
     *
     * @param \AppBundle\Entity\Proposition\Choice $choice
     *
     * @return UniqueChoice
     */
    public function addChoice(\AppBundle\Entity\Proposition\Choice $choice)
    {
        $this->choices[] = $choice;
        $choice->setUniqueChoice($this);
        return $this;
    }

    /**
     * Remove choice
     *
     * @param \AppBundle\Entity\Proposition\Choice $choice
     */
    public function removeChoice(\AppBundle\Entity\Proposition\Choice $choice)
    {
        $this->choices->removeElement($choice);
    }

    /**
     * Get choices
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChoices()
    {
        return $this->choices;
    }
}
