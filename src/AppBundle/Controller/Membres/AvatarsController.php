<?php

namespace AppBundle\Controller\Membres;

use Psr\Container\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class AvatarsController extends Controller
{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @Rest\View()
     * @Rest\Get("/avatars")
     */
    public function getAvatarsAction(Request $request)
    {
        $avatars = $this->getDoctrine()->getRepository('AppBundle:Avatars')->findAll();
        return $avatars;
    }

    /**
     * @Rest\View()
     * @Rest\Get("/membres/{id}/avatar")
     */
    public function getAvatarMembreAction(Request $request)
    {
        $membre = $this->getDoctrine()->getRepository('AppBundle:Membres')->find($request->get('id'));
        return $membre->getMembreAvatar();
    }

    /**
     * @Rest\View()
     * @Rest\Get("/avatars/{id}")
     */
    public function getAvatarAction(Request $request)
    {
        $avatar = $this->getDoctrine()->getRepository('AppBundle:Avatars')->find($request->get('id'));
    }

    public function postAvatarAction()
    {

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
