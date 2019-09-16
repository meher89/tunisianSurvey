<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

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
}