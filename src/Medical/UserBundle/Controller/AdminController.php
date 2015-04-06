<?php

namespace Medical\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $queryParams = [];
        if ($this->getUser()) {
            $queryParams['by_user'] = $this->getUser()->getId();
        }
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $this->get('app.condition.repository')->getElements($queryParams),
            $request->query->get('page', 1),
            10
        );

        return $this->render('UserBundle:Admin:index.html.twig', array('pagination' => $pagination));
    }
}
