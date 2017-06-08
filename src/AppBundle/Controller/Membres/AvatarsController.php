<?php

namespace AppBundle\Controller\Membres;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AvatarsController extends Controller
{


    public function getAvatarsAction()
    {
        return $this->render('AppBundle:Avatars:get_avatars.html.twig', array(
            // ...
        ));
    }

    public function getAvatarAction($id)
    {
        return $this->render('AppBundle:Avatars:get_avatar.html.twig', array(
            // ...
        ));
    }

    public function postAvatarAction()
    {
        return $this->render('AppBundle:Avatars:post_avatar.html.twig', array(
            // ...
        ));
    }

    public function deleteAvatarAction($id)
    {
        return $this->render('AppBundle:Avatars:delete_avatar.html.twig', array(
            // ...
        ));
    }

    public function updateAvatarAction()
    {
        return $this->render('AppBundle:Avatars:update_avatar.html.twig', array(
            // ...
        ));
    }

}
