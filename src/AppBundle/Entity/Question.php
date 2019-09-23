<?php
    
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="question")
*/
class Question extends AbstractEntity {
    
    /**
    * 
    * @ORM\Column(type="string")
    * 
    */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Survey", inversedBy="questions")
    */
    private $survey;
    
    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Proposition",cascade={"persist"})     
    */
    private $proposition;

    

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Question
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
     * Set survey
     *
     * @param \AppBundle\Entity\Survey $survey
     *
     * @return Question
     */
    public function setSurvey(\AppBundle\Entity\Survey $survey = null)
    {
        $this->survey = $survey;

        return $this;
    }

    /**
     * Get survey
     *
     * @return \AppBundle\Entity\Survey
     */
    public function getSurvey()
    {
        return $this->survey;
    }

    /**
     * Set proposition
     *
     * @param \AppBundle\Entity\Proposition $proposition
     *
     * @return Question
     */
    public function setProposition(\AppBundle\Entity\Proposition $proposition = null)
    {
        $this->proposition = $proposition;

        return $this;
    }

    /**
     * Get proposition
     *
     * @return \AppBundle\Entity\Proposition
     */
    public function getProposition()
    {
        return $this->proposition;
    }
}
