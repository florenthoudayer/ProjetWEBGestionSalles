<?php

namespace GestionSalleBundle\Controller;

use GestionSalleBundle\Entity\Salles;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Salle controller.
 *
 * @Route("salles")
 */
class SallesController extends Controller
{
    /**
     * Lists all salle entities.
     *
     * @Route("/", name="salles_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $salles = $em->getRepository('GestionSalleBundle:Salles')->findAll();

        return $this->render('salles/index.html.twig', array(
            'salles' => $salles,
        ));
    }

    /**
     * Finds and displays a salle entity.
     *
     * @Route("/{id}", name="salles_show")
     * @Method("GET")
     */
    public function showAction(Salles $salle)
    {

        return $this->render('salles/show.html.twig', array(
            'salle' => $salle,
        ));
    }
}
