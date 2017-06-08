<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ComptesController extends Controller
{
    public function getComptesAction()
    {
        return $this->render('AppBundle:Comptes:get_comptes.html.twig', array(
            // ...
        ));
    }

    public function getCompteAction($id)
    {
        return $this->render('AppBundle:Comptes:get_compte.html.twig', array(
            // ...
        ));
    }

    public function postCompteAction()
    {
        return $this->render('AppBundle:Comptes:post_compte.html.twig', array(
            // ...
        ));
    }

    public function removeCompteAction($id)
    {
        return $this->render('AppBundle:Comptes:remove_compte.html.twig', array(
            // ...
        ));
    }

    public function updateCompteAction($id)
    {
        return $this->render('AppBundle:Comptes:update_compte.html.twig', array(
            // ...
        ));
    }

}
