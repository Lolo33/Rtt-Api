<?php

namespace AppBundle\Controller\Departements;

use AppBundle\Entity\Lieux;
use AppBundle\Form\DepartementsType;
use AppBundle\Form\LieuxType;
use Psr\Container\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class LieuxController extends Controller
{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    //serializerGroups={"lieux"}
    /**
     * @Rest\View()
     * @Rest\Get("/departements/{id}/lieux")
     *
     */
    public function getLieuxAction(Request $request)
    {
        $dpt = $this->getDoctrine()
            ->getRepository('AppBundle:Departements')
            ->find($request->get('id'));

        $listeLieux = $this->getDoctrine()->getRepository('AppBundle:Lieux')->findBy(array('lieuDpt' => $dpt));

        if (empty($listeLieux))
            return $this->lieuNotFound();

        return $listeLieux;
    }

    /**
     * @Rest\View()
     * @Rest\Get("/lieux/{id}")
     */
    public function getLieuAction(Request $request)
    {
        $lieu = $this->getDoctrine()
            ->getRepository('AppBundle:Lieux')
            ->find($request->get("id"));

        if (empty($lieu))
            return $this->lieuNotFound();

        return $lieu;
    }

    /**
     * @Rest\View()
     * @Rest\Post("/lieux")
     */
    public function postLieuAction(Request $request)
    {

        $dpt = $this->getDoctrine()
            ->getRepository('AppBundle:Departements')
            ->find($request->get('lieuDpt'));

        $lieu = new Lieux();
        $lieu->setLieuNom($request->get('lieuNom'))
            ->setLieuCp($request->get('lieuCp'))
            ->setLieuAdresseL1($request->get('lieuAdresseL1'))
            ->setLieuAdresseL2($request->get('lieuAdresseL2'))
            ->setLieuVille($request->get('lieuVille'))
            ->setLieuDpt($dpt)
            ->setLieuLogo($request->get('lieuLogo'));


        $form = $this->createForm(LieuxType::class, $lieu);

        $form->submit($request->request->all()); // Validation des données

        if ($form->isValid()) {
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($lieu);
            $em->flush();
            return $lieu;
        }else{
            return $form;
        }
    }

    /**
     * @Rest\View()
     * @Rest\Delete("/lieux/{id}")
     */
    public function removeLieuAction(Request $request)
    {
        return $this->render('AppBundle:Lieux:remove_lieu.html.twig', array(
            // ...
        ));
    }

    private function lieuNotFound()
    {
        return \FOS\RestBundle\View\View::create(['erreur' => 'Lieu not found'], Response::HTTP_NOT_FOUND);
    }

}
