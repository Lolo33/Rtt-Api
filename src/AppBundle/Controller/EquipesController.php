<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EquipesController extends Controller
{
    public function getEquipesAction()
    {
        return $this->render('AppBundle:Equipes:get_equipes.html.twig', array(
            // ...
        ));
    }

    public function getEquipeAction($id)
    {
        return $this->render('AppBundle:Equipes:get_equipe.html.twig', array(
            // ...
        ));
    }

    public function removeEquipeAction($id)
    {
        return $this->render('AppBundle:Equipes:remove_equipe.html.twig', array(
            // ...
        ));
    }

    public function postEquipeAction()
    {
        return $this->render('AppBundle:Equipes:post_equipe.html.twig', array(
            // ...
        ));
    }

    public function updateEquipeAction()
    {
        return $this->render('AppBundle:Equipes:update_equipe.html.twig', array(
            // ...
        ));
    }

}
