<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use AppBundle\Form\SurveyType;
use AppBundle\Entity\Survey;

/**
* @Route("/myaccount")
*/
class MyAccountController extends Controller
{
    /**
     * @Route("/", name="myaccount_homepage")
     * @IsGranted("ROLE_USER")
    */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('@App/myaccount/home.html.twig', []);
    }


    /**
     * @Route("/new/survey", name="myaccount_new_survey")
     * @IsGranted("ROLE_USER")
    */
    public function newSurveyAction(Request $request)
    {
        $survey = new Survey;
        $form = $this->createForm(SurveyType::class, $survey);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $survey->setUser($this->getUser());
            
            $em->persist($survey);
            $em->flush();
            return $this->redirectToRoute('homepage', []);
        }
        return $this->render('@App/myaccount/newSurvey.html.twig', ["form"=>$form->createView()]);
    }
}