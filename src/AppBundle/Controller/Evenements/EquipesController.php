<?php

namespace AppBundle\Controller\Evenements;

use AppBundle\Entity\Equipes;
use AppBundle\Form\EquipesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Psr\Container\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Doctrine\ORM\Mapping\Entity;

class EquipesController extends Controller
{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    function chaineRandom($car) {
        $string = "";
        $chaine = "abcdefghijklmnpqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
        srand((double)microtime()*1000000);
        for($i=0; $i<$car; $i++) {
            $string .= $chaine[rand()%strlen($chaine)];
        }
        return $string;
    }


    /**
     * @Rest\View(serializerGroups={"team"})
     * @Rest\Get("/evenements/{id}/equipes")
     */
    public function getEquipesAction(Request $request)
    {
        $event = $this->getDoctrine()->getRepository('AppBundle:Evenements')->find($request->get('id'));
        return $event->getEventListeEquipes();
    }

    /**
     * @Rest\View(serializerGroups={"team_membre"})
     * @Rest\Get("/equipes/{id}/membres")
     */
    public function getEquipeMembresAction(Request $request){
        $team = $this->getDoctrine()->getRepository('AppBundle:Equipes')->find($request->get('id'));
        $team_membres = $this->getDoctrine()->getRepository('AppBundle:EquipeMembres')->findBy(array('emTeam' => $team));
        return $team_membres;
    }

    /**
     * @Rest\View(serializerGroups={"team"})
     * @Rest\Get("equipes/{id}")
     */
    public function getEquipeAction(Request $request)
    {
        $team = $this->getDoctrine()->getRepository('AppBundle:Equipes')->find($request->get('id'));
        return $team;
    }

    /**
     * @Rest\View(serializerGroups={"team"})
     * @Rest\Delete("equipes/{id}")
     */
    public function removeEquipeAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $team_delete = $em->getRepository('AppBundle:Equipes')->find($request->get('id'));

        if ($team_delete){
            $em->remove($team_delete);
            $em->flush();
        }
    }

    /**
     * @Rest\View(serializerGroups={"team"})
     * @Rest\Post("/evenements/{id}/equipes")
     */
    public function postEquipeAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $event = $em->getRepository('AppBundle:Evenements')->find($request->get('id'));

        if (empty($event))
            return $this->eventNotFound();

        $team = new Equipes();

        $form = $this->createForm(EquipesType::class, $team);
        $form->submit($request->request->all()); // Validation des données
        if ($form->isValid()) {
            $team->setTeamNom($request->get('teamNom'))
                ->setTeamCode($this->chaineRandom(10))
                ->setTeamPrive($request->get('teamPrive'))
                ->setTeamPass($request->get('teamPass'))
                ->setTeamEvent($event);

            $em->persist($team);
            $em->flush();
            return $team;
        }else{
            return $form;
        }
    }

    public function updateEquipeAction()
    {
        return $this->render('AppBundle:Equipes:update_equipe.html.twig', array(
            // ...
        ));
    }

    private function eventNotFound(){
        return \FOS\RestBundle\View\View::create(['erreur' => 'Cet évenement n\'existe pas'], Response::HTTP_NOT_FOUND);
    }

}
