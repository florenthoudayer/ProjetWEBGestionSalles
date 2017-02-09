<?php

namespace GestionSalleBundle\Controller;

use GestionSalleBundle\Entity\Salles;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

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
     * Creates a new salle entity.
     *
     * @Route("/new", name="salles_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $salle = new Salles();
        $form = $this->createForm('GestionSalleBundle\Form\SallesType', $salle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($salle);
            $em->flush($salle);

            return $this->redirectToRoute('salles_show', array('id' => $salle->getId()));
        }
        else
        {
            $this->addFlash('error', 'une erreur est survenu veuillez réessayer');
                
            return $this->render('salles/new.html.twig', array('salle' => $salle, 
                                                                 'form' => $form ->createView()));
        }
        return $this->render('salles/new.html.twig', array(
            'salle' => $salle,
            'form' => $form->createView(),
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
        $deleteForm = $this->createDeleteForm($salle);

        return $this->render('salles/show.html.twig', array(
            'salle' => $salle,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing salle entity.
     *
     * @Route("/{id}/edit", name="salles_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Salles $salle)
    {
        $deleteForm = $this->createDeleteForm($salle);
        $editForm = $this->createForm('GestionSalleBundle\Form\SallesType', $salle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('salles_edit', array('id' => $salle->getId()));
        }

        return $this->render('salles/edit.html.twig', array(
            'salle' => $salle,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a salle entity.
     *
     * @Route("/{id}", name="salles_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Salles $salle)
    {
        $form = $this->createDeleteForm($salle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($salle);
            $em->flush($salle);
        }

        return $this->redirectToRoute('salles_index');
    }

    /**
     * Creates a form to delete a salle entity.
     *
     * @param Salles $salle The salle entity
     *
     * @return Form The form
     */
    private function createDeleteForm(Salles $salle)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('salles_delete', array('id' => $salle->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
