<?php
    
namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="fos_user")
*/
class User extends BaseUser
{
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

   /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Survey", mappedBy="user")
   */   
   private $surveys;

            

    /**
     * Add survey
     *
     * @param \App\Entity\Survey $survey
     *
     * @return User
     */
    public function addSurvey(\App\Entity\Survey $survey)
    {
        $this->surveys[] = $survey;
        $survey->setUser($this);
        return $this;
    }

    /**
     * Remove survey
     *
     * @param \App\Entity\Survey $survey
     */
    public function removeSurvey(\App\Entity\Survey $survey)
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
