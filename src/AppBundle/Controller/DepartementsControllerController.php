<?php

namespace AppBundle\Controller;

use AppBundle\Form\DepartementsType;
use Psr\Container\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Entity\Departements;

class DepartementsControllerController extends Controller
{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @Rest\View()
     * @Rest\Get("/departements")
     */
    public function getDepartementsAction(Request $request)
    {
        $dpts = $this->getDoctrine()
            ->getRepository('AppBundle:Departements')
            ->findAll();

        return $dpts;

    }

    /**
     * @Rest\View()
     * @Rest\Get("/departements/{id}")
     */
    public function getDepartementAction($id, Request $request)
    {
        $dpt = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Departements')
            ->find($request->get('id'));

        if (empty($dpt)) {
            return new JsonResponse(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }

        return $dpt;
    }

    /**
     * @Rest\View()
     * @Rest\Post("/departements")
     */
    public function postDepartementAction(Request $request)
    {
        $dpt = new Departements();
        $dpt->setDptCode($request->get('dptCode'))
            ->setDptNom($request->get('dptNom'));


        $form = $this->createForm(DepartementsType::class, $dpt);

        $form->submit($request->request->all()); // Validation des données

        if ($form->isValid()) {
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($dpt);
            $em->flush();
            return $dpt;
        }else{
            return $form;
        }
    }

}
