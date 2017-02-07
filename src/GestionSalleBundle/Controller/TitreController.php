<?php

namespace GestionSalleBundle\Controller;

use GestionSalleBundle\Entity\Titre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Titre controller.
 *
 * @Route("titre")
 */
class TitreController extends Controller
{
    /**
     * Lists all titre entities.
     *
     * @Route("/", name="titre_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $titres = $em->getRepository('GestionSalleBundle:Titre')->findAll();

        return $this->render('titre/index.html.twig', array(
            'titres' => $titres,
        ));
    }

    /**
     * Finds and displays a titre entity.
     *
     * @Route("/{id}", name="titre_show")
     * @Method("GET")
     */
    public function showAction(Titre $titre)
    {

        return $this->render('titre/show.html.twig', array(
            'titre' => $titre,
        ));
    }
}
