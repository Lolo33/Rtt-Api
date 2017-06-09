<?php

namespace AppBundle\Controller\Membres;

use AppBundle\Entity\InfosMango;
use AppBundle\Form\InfosMangoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Psr\Container\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Doctrine\ORM\Mapping\Entity;

class InfosMangoController extends Controller
{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @Rest\View(serializerGroups={"mango"})
     * @Rest\Get("/membres/{id}/infos-mango")
     */
    public function getInfosMangoAction(Request $request)
    {
        $membre = $this->getDoctrine()->getRepository('AppBundle:Membres')->find($request->get('id'));
        return $membre->getMembreMango();
    }

    /**
     * @Rest\View(serializerGroups={"mango"})
     * @Rest\Get("infos-mango/{id}")
     */
    public function getInfoMangoAction(Request $request)
    {
        $im = $this->getDoctrine()->getRepository('AppBundle:InfosMango')->find($request->get('id'));
        return $im;
    }

    /**
     * @Rest\View(serializerGroups={"mango"})
     * @Rest\Post("membres/{id}/infos-mango")
     */
    public function postInfoMangoAction(Request $request)
    {
        $em = $this->get("doctrine.orm.entity_manager");

        $membre = $em->getRepository('AppBundle:Membres')->find($request->get('id'));

        $im = new InfosMango();

        $form = $this->createForm(InfosMangoType::class, $im);
        $form->submit($request->request->all());
        if ($form->isValid()) {
            $im->setImMangoId($request->get("imMangoId"))
                ->setImMembre($membre)
                ->setImWalletId($request->get("imWalletId"));
            $em->persist($im);
            $em->flush();
            return $im;
        } else {
            return $form;
        }

    }

    /**
     * @Rest\View(serializerGroups={"mango"})
     * @Rest\Delete("infos-mango/{id}")
     */
    public function removeInfoMangoAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $im_delete = $em->getRepository('AppBundle:InfosMango')->find($request->get('id'));

        if ($im_delete){
            $em->remove($im_delete);
            $em->flush();
        }
    }

    public function updateInfoMangoAction(Request $request)
    {
        return $this->render('AppBundle:InfosMango:update_info_mango.html.twig', array(
            // ...
        ));
    }

}
