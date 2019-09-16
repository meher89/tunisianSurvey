<?php
    
namespace AppBundle\Entity\Proposition;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Proposition;


/**
* @ORM\Entity
* 
*/
class Text extends Proposition {
    
    /**
    * 
    * @ORM\Column(type="string")
    * 
    */
    private $content;

    public function getType():string 
    {
        return Proposition::TEXT;
    }

    
    

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Text
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
}
