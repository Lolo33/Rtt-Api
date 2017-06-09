<?php

namespace AppBundle\Controller\Membres;

use AppBundle\Entity\Comptes;
use AppBundle\Form\ComptesType;
use Psr\Container\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class ComptesController extends Controller
{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @Rest\View(serializerGroups={"comptes"})
     * @Rest\Get("/membres/{id}/comptes")
     */
    public function getComptesAction(Request $request)
    {
        $membre = $this->getDoctrine()->getRepository('AppBundle:Membres')->find($request->get('id'));
        return $membre->getMembreComptes();
    }

    /**
     * @Rest\View(serializerGroups={"comptes"})
     * @Rest\Get("/comptes/{id}")
     */
    public function getCompteAction(Request $request)
    {
        $compte = $this->getDoctrine()->getRepository('AppBundle:Comptes')->find($request->get('id'));
        return $compte;
    }

    /**
     * @Rest\View(serializerGroups={"comptes"})
     * @Rest\Post("membres/{id}/comptes")
     */
    public function postCompteAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $membre = $em->getRepository('AppBundle:Membres')->find($request->get('id'));

        if (empty($membre))
            return $this->membreNotFound();

        $compte = new Comptes();
        $compte->setCompteNom($request->get('compteNom'))
            ->setComptePrenom($request->get('comptePrenom'))
            ->setCompteVille($request->get('compteVille'))
            ->setCompteCp($request->get('compteCp'))
            ->setCompteAdresseL1($request->get('compteAdresseL1'))
            ->setCompteAdresseL2($request->get('compteAdresseL2'))
            ->setCompteRibBic($request->get('compteRibBic'))
            ->setCompteRibIban($request->get('compteRibIban'))
            ->setCompteMembre($membre);

        $form = $this->createForm(ComptesType::class, $compte);
        $form->submit($request->request->all()); // Validation des données
        if ($form->isValid()) {

            $em->persist($compte);
            $em->flush();
            return $compte;
        }else{
            return $form;
        }
    }

    /**
     * @Rest\View(serializerGroups={"comptes"})
     * @Rest\Delete("/comptes/{id}")
     */
    public function removeCompteAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $compte = $em->getRepository('AppBundle:Comptes')->find($request->get('id'));

        if (!empty($compte)){
            $em->remove($compte);
            $em->flush();
        }
    }

    public function updateCompteAction($id)
    {
        return $this->render('AppBundle:Comptes:update_compte.html.twig', array(
            // ...
        ));
    }

    private function membreNotFound(){
        return \FOS\RestBundle\View\View::create(['erreur' => 'Ce membre n\'existe pas'], Response::HTTP_NOT_FOUND);
    }

}
