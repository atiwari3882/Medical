<?php

namespace Medical\MedicalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        return $this->render('MedicalBundle:Index:index.html.twig', array('name' => 'sddfds'));
    }
}
