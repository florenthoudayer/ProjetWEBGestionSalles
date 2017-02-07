<?php

namespace GestionSalleBundle\Controller;

use GestionSalleBundle\Entity\Formation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Formation controller.
 *
 * @Route("formation")
 */
class FormationController extends Controller
{
    /**
     * Lists all formation entities.
     *
     * @Route("/", name="formation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $formations = $em->getRepository('GestionSalleBundle:Formation')->findAll();

        return $this->render('formation/index.html.twig', array(
            'formations' => $formations,
        ));
    }

    /**
     * Finds and displays a formation entity.
     *
     * @Route("/{id}", name="formation_show")
     * @Method("GET")
     */
    public function showAction(Formation $formation)
    {

        return $this->render('formation/show.html.twig', array(
            'formation' => $formation,
        ));
    }
}
