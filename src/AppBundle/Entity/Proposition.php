<?php
    
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proposition
 *
 * @ORM\Table(name="proposition")
 * @ORM\Entity()
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *                        "MultipleChoice" = "AppBundle\Entity\Proposition\MultipleChoice", 
 *                        "Text"           = "AppBundle\Entity\Proposition\Text", 
 *                        "UniqueChoice"   = "AppBundle\Entity\Proposition\UniqueChoice", 
 *                        
 * 
 *                       })
 */
abstract class Proposition extends AbstractEntity  {
    
    const MULTIPLE_CHOICE = 'MultipleChoice';
    const UNIQUE_CHOICE = 'UniqueChoice';
    const TEXT = 'Text';

    abstract public function getType():string;

    
}