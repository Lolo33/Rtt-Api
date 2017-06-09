<?php

namespace AppBundle\Controller\Departements\Lieux;

use AppBundle\Entity\Evenements;
use AppBundle\Form\EvenementsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Psr\Container\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\Validator\Constraints\Date;

class EvenementsController extends Controller
{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @Rest\View(serializerGroups={"event"})
     * @Rest\Get("/lieux/{id}/evenements")
     */
    public function getEvenementsLieuAction(Request $request)
    {
        $lieu = $this->getDoctrine()->getRepository('AppBundle:Lieux')->find($request->get('id'));
        if (empty($lieu))
            return $this->lieuNotFound();
        return $lieu->getListeEvents();
    }

    /**
     * @Rest\View(serializerGroups={"event"})
     * @Rest\Get("/departements/{id}/evenements")
     */
    public function getEvenementsDptAction(Request $request)
    {
        $dpt = $this->getDoctrine()->getRepository('AppBundle:Departements')->find($request->get('id'));
        $listeLieux = $dpt->getLieux();

        if (empty($dpt))
            return $this->departementNotFound();

        $listeEvents = [];
        foreach ($listeLieux as $unLieu){
            if (!empty($unLieu->getListeEvents()))
                $listeEvents[] = $unLieu->getListeEvents();
        }

        return $listeEvents;
    }

    /**
     * @Rest\View(serializerGroups={"event"})
     * @Rest\Get("/evenements")
     */
    public function getEvenementsAction(Request $request)
    {
        $events = $this->getDoctrine()->getRepository('AppBundle:Evenements')->findAll();
        return $events;
    }

    /**
     * @Rest\View(serializerGroups={"event"})
     * @Rest\Get("/evenements/{id}")
     */
    public function getEvenementAction(Request $request)
    {
        $event = $this->getDoctrine()->getRepository('AppBundle:Evenements')->find($request->get('id'));
        return $event;
    }

    /**
     * @Rest\View(serializerGroups={"event"})
     * @Rest\Post("/lieux/{id}/evenements")
     */
    public function postEvenementAction(Request $request)
    {
        $em = $this->get("doctrine.orm.entity_manager");

        $lieu = $em->getRepository('AppBundle:Lieux')->find($request->get('id'));
        $compte = $em->getRepository('AppBundle:Comptes')->find($request->get('eventCompteId'));
        $im = $em->getRepository('AppBundle:InfosMango')->find($request->get('eventMangoId'));
        $orga = $em->getRepository('AppBundle:Membres')->find($request->get('eventOrgaId'));
        if (!empty($request->get('eventOrga2Id')))
            $orga2 = $em->getRepository('AppBundle:Membres')->find($request->get('eventOrga2Id'));
        else
            $orga2 = null;

        if (empty($compte) || empty($im) || empty($orga))
            return $this->elementsNotFound();

        $event = new Evenements();

        $form = $this->createForm(EvenementsType::class, $event);
        $form->submit($request->request->all());
        if ($form->isValid()) {
            $event->setEventTitre($request->get('eventTitre'))
                ->setEventNbEquipes($request->get('eventNbEquipes'))
                ->setEventJoueursMax($request->get('eventJoueursMax'))
                ->setEventJoueursMin($request->get('eventJoueursMin'))
                ->setEventLieu($lieu)
                ->setEventPaiement($request->get('eventPaiement'))
                ->setEventTarif($request->get('eventTarif'))
                ->setEventDate(new \DateTime($request->get('eventDate')))
                ->setEventHeureDebut(new \DateTime($request->get('eventHeureDebut')))
                ->setEventHeureFin(new \DateTime($request->get('eventHeureFin')))
                ->setEventPrive($request->get('eventPrive'))
                ->setEventPass($request->get('eventPass'))
                ->setEventCompte($compte)
                ->setEventMango($im)
                ->setEventTarificationEquipe($request->get('eventTarificationEquipe'))
                ->setEventOrga($orga)
                ->setEventOrga2($orga2)
                ->setEventImg($request->get('eventImg'))
                ->setEventDescriptif($request->get('eventDescriptif'))
                ->setEventTournoi($request->get('eventTournoi'));
            $em->persist($event);
            $em->flush();
            return $event;
        } else {
            return $form;
        }
    }

    public function removeEvenementAction()
    {
        return $this->render('AppBundle:Evenements:remove_evenement.html.twig', array(
            // ...
        ));
    }

    public function updateEvenementAction()
    {
        return $this->render('AppBundle:Evenements:update_evenement.html.twig', array(
            // ...
        ));
    }

    private function departementNotFound(){
        return \FOS\RestBundle\View\View::create(['erreur' => 'Ce département n\'existe pas'], Response::HTTP_NOT_FOUND);
    }
    private function lieuNotFound(){
        return \FOS\RestBundle\View\View::create(['erreur' => 'Ce lieu n\'existe pas'], Response::HTTP_NOT_FOUND);
    }
    private function elementsNotFound(){
        return \FOS\RestBundle\View\View::create(['erreur' => 'Une ou plusieurs informations envoyées n\'existent pas'], Response::HTTP_NOT_FOUND);
    }

}
