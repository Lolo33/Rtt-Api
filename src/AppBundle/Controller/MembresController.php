<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Avatars;
use AppBundle\Form\MembresType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Psr\Container\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Doctrine\ORM\Mapping\Entity;
use AppBundle\Entity\Membres;

class MembresController extends Controller
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
     * @Rest\View(serializerGroups={"membres"})
     * @Rest\Get("/membres")
     */
    public function getMembresAction(Request $request)
    {
        $membres = $this->getDoctrine()->getRepository('AppBundle:Membres')->findAll();

        return $membres;
    }

    /**
     * @Rest\View(serializerGroups={"membres"})
     * @Rest\Get("/membres/{id}")
     */
    public function getMembreAction(Request $request)
    {
        $membre = $this->getDoctrine()->getRepository('AppBundle:Membres')->find($request->get('id'));

        return $membre;
    }

    /**
     * @Rest\View(serializerGroups={"membres"})
     * @Rest\Post("/membres")
     */
    public function postMembreAction(Request $request)
    {

        $encoder = $this->get('security.password_encoder');

        $membre = new Membres();
        $membre->setMembrePseudo($request->get('membrePseudo'))
            ->setMembrePass(md5($request->get('membrePass')))
            ->setMembreTel($request->get('membreTel'))
            ->setMembreMail($request->get('membreMail'))
            ->setMembreOrga($request->get('membreOrga'))
            //Optionnels
            ->setMembreIpInscription($request->get('membreIpInscription'))
            ->setMembreIpDerniereConnexion($request->get('membreIpDerniereConnexion'))
            ->setMembreValidation(false);

        $form = $this->createForm(MembresType::class, $membre);
        $form->submit($request->request->all());
        if ($form->isValid()) {
            $em = $this->get('doctrine.orm.entity_manager');
            $membre->setMembreCodeValidation($this->chaineRandom(10))
                ->setMembreDateInscription(new \DateTime('now'))
                ->setMembreDerniereConnexion(new \DateTime('now'))
                ->setMembreAvatar($em->getRepository('AppBundle:Avatars')->find(1));
            $em->persist($membre);
            $em->flush();
            return $membre;
        } else {
            return $form;
        }
    }

    /**
     * @Rest\View(serializerGroups={"membres"})
     * @Rest\Post("/connexion")
     */
    public function connexionMembreAction(Request $request)
    {
        $membre_a_connecter = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Membres')
            ->findOneBy(
                array('membrePseudo' => $request->get('membrePseudo'),
                    'membrePass' => md5($request->get('membrePass'))
                ));

        if (empty($membre_a_connecter))
            return \FOS\RestBundle\View\View::create(['erreur' => 'err_user_pass'], Response::HTTP_FORBIDDEN);

        return $membre_a_connecter;
    }

    /**
     * @Rest\View(serializerGroups={"membres"})
     * @Rest\Delete("/membres/{id}")
     */
    public function deleteMembreAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $membre_delete = $em->getRepository('AppBundle:Membres')->find($request->get('id'));

        if ($membre_delete){
            $em->remove($membre_delete);
            $em->flush();
        }
    }

    public function updateMembreAction($id)
    {
        return $this->render('AppBundle:Membres:update_membre.html.twig', array(
            // ...
        ));
    }

}
