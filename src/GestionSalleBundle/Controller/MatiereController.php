<?php

namespace GestionSalleBundle\Controller;

use GestionSalleBundle\Entity\Matiere;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Matiere controller.
 *
 * @Route("matiere")
 */
class MatiereController extends Controller
{
    /**
     * Lists all matiere entities.
     *
     * @Route("/", name="matiere_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $matieres = $em->getRepository('GestionSalleBundle:Matiere')->findAll();

        return $this->render('matiere/index.html.twig', array(
            'matieres' => $matieres,
        ));
    }

    /**
     * Finds and displays a matiere entity.
     *
     * @Route("/{id}", name="matiere_show")
     * @Method("GET")
     */
    public function showAction(Matiere $matiere)
    {

        return $this->render('matiere/show.html.twig', array(
            'matiere' => $matiere,
        ));
    }
}
