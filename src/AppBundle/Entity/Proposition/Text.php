<?php
    
namespace AppBundle\Entity\Proposition;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Proposition;


/**
* @ORM\Entity
* 
*/
class Text extends Proposition {

    public const FORMATS = [
        "Text" => "text",
        "Number" =>"number",
        "Date"   => "date"
    ];
    
    /**
    * 
    * @ORM\Column(type="string")
    * 
    */
    private $format;

    public function getType():string 
    {
        return Proposition::TEXT;
    }

    
    

    /**
     * Set format
     *
     * @param string $format
     *
     * @return Text
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }
}
