<?php

namespace AppBundle\Controller;

use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Departements;


class StatutController extends Controller
{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @Rest\View()
     * @Rest\Get("/statuts")
     */
    public function listeStatutAction(Request $request)
    {
        $this->container =
        $statuts = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:StatutJoueur')
            ->findAll();

        return $statuts;
    }

    /**
     * @Rest\View()
     * @Rest\Get("/statuts/{statut_id}")
     */
    public function getStatutAction($statut_id, Request $request)
    {
        $statut = $this->getDoctrine()
            ->getRepository('AppBundle:StatutJoueur')
            ->find($request->get("statut_id"));

        return $statut;
    }

}
