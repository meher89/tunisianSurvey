<?php
    
namespace AppBundle\Entity\Proposition;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Proposition;

/**
* @ORM\Entity
* 
*/
class MultipleChoice extends Proposition {
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Proposition\Choice", mappedBy="multipleChoice")
    */
    private $choices;

    public function getType():string
    {
        return Proposition::MULTIPLE_CHOICE;
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
     * @return MultipleChoice
     */
    public function addChoice(\AppBundle\Entity\Proposition\Choice $choice)
    {
        $this->choices[] = $choice;
        $choice->setMultipleChoice($this);
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
