<?php
    
namespace AppBundle\Entity\Proposition;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\AbstractEntity;


/**
* @ORM\Entity
* @ORM\Table(name="choice")
*/
class Choice extends AbstractEntity {
    
    /**
    * 
    * @ORM\Column(type="string")
    * 
    */
    private $content;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Proposition\MultipleChoice", inversedBy="choices")
    */
    private $multipleChoice;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Proposition\UniqueChoice", inversedBy="choices")
    */
    private $uniqueChoice;
    
    

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Choice
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set multipleChoice
     *
     * @param \AppBundle\Entity\Proposition\MultipleChoice $multipleChoice
     *
     * @return Choice
     */
    public function setMultipleChoice(\AppBundle\Entity\Proposition\MultipleChoice $multipleChoice = null)
    {
        $this->multipleChoice = $multipleChoice;

        return $this;
    }

    /**
     * Get multipleChoice
     *
     * @return \AppBundle\Entity\Proposition\MultipleChoice
     */
    public function getMultipleChoice()
    {
        return $this->multipleChoice;
    }

    /**
     * Set uniqueChoice
     *
     * @param \AppBundle\Entity\Proposition\UniqueChoice $uniqueChoice
     *
     * @return Choice
     */
    public function setUniqueChoice(\AppBundle\Entity\Proposition\UniqueChoice $uniqueChoice = null)
    {
        $this->uniqueChoice = $uniqueChoice;

        return $this;
    }

    /**
     * Get uniqueChoice
     *
     * @return \AppBundle\Entity\Proposition\UniqueChoice
     */
    public function getUniqueChoice()
    {
        return $this->uniqueChoice;
    }
}
