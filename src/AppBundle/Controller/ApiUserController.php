<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ApiUser;
use AppBundle\Form\ApiUserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Psr\Container\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class ApiUserController extends Controller
{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @Rest\View(serializerGroups={"userApi"})
     * @Rest\Get("/api-users")
     */
    public function getApiUsersAction(Request $request)
    {
        $users = $this->getDoctrine()->getRepository('AppBundle:ApiUser')->findAll();

        return $users;
    }

    /**
     * @Rest\View(serializerGroups={"userApi"})
     * @Rest\Get("/api-users/{id}")
     */
    public function getApiUserAction(Request $request)
    {
        $users = $this->getDoctrine()->getRepository('AppBundle:ApiUser')->find($request->get("id"));

        return $users;
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/api-users")
     */
    public function postApiUserAction(Request $request)
    {
        $user = new ApiUser();
        $form = $this->createForm(ApiUserType::class, $user);

        $form->submit($request->request->all());
        if ($form->isValid()) {
            $encoder = $this->get('security.password_encoder');
            // le mot de passe en clair est encodé avant la sauvegarde
            $encoded = $encoder->encodePassword($user, $user->getUserPlainPassword());
            $user->setUserPassword($encoded);

            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($user);
            $em->flush();
            return $user;
        } else {
            return $form;
        }
    }

    public function deleteApiUserAction()
    {
        return $this->render('AppBundle:ApiUser:delete_api_user.html.twig', array(
            // ...
        ));
    }

    public function updateApiUserAction()
    {
        return $this->render('AppBundle:ApiUser:update_api_user.html.twig', array(
            // ...
        ));
    }

}
