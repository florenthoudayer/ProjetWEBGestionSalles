<?php

namespace GestionSalleBundle\Controller;

use GestionSalleBundle\Entity\Titre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

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
     * Creates a new titre entity.
     *
     * @Route("/new", name="titre_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $titre = new Titre();
        $form = $this->createForm('GestionSalleBundle\Form\TitreType', $titre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($titre);
            $em->flush($titre);

            return $this->redirectToRoute('titre_show', array('id' => $titre->getId()));
        }
        else
        {
            $this->addFlash('error', 'une erreur est survenu veuillez réessayer');
                
            return $this->render('titre/new.html.twig', array('titre' => $titre, 
                                                                 'form' => $form ->createView()));
        }        

        return $this->render('titre/new.html.twig', array(
            'titre' => $titre,
            'form' => $form->createView(),
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
        $deleteForm = $this->createDeleteForm($titre);

        return $this->render('titre/show.html.twig', array(
            'titre' => $titre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing titre entity.
     *
     * @Route("/{id}/edit", name="titre_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Titre $titre)
    {
        $deleteForm = $this->createDeleteForm($titre);
        $editForm = $this->createForm('GestionSalleBundle\Form\TitreType', $titre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('titre_edit', array('id' => $titre->getId()));
        }

        return $this->render('titre/edit.html.twig', array(
            'titre' => $titre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a titre entity.
     *
     * @Route("/{id}", name="titre_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Titre $titre)
    {
        $form = $this->createDeleteForm($titre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($titre);
            $em->flush($titre);
        }

        return $this->redirectToRoute('titre_index');
    }

    /**
     * Creates a form to delete a titre entity.
     *
     * @param Titre $titre The titre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Titre $titre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('titre_delete', array('id' => $titre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
