<?php


namespace GestionSalleBundle\Controller;

use GestionSalleBundle\Entity\Reservation;
use GestionSalleBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\User\UserInterface;


class DefaultController extends Controller
{
  /**
    *@Route("/login", name="login")
    */
  public function loginAction(Request $request)
  {
    if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
      return $this->redirectToRoute('reservation_index');
    }
    if ($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
      $user = new User();
      //$user = $this->UserProviderInterface->loadUserByUsername($authenticationUtils->getLastUsername());
    $user = $this->get('security.token_storage')->getToken()->getUser();
      return $this->redirectToRoute('defaultuser', array('id' => $user->getId()));
    }
    // Si le visiteur est déjà identifié, on le redirige vers l'accueil
    if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
      return $this->redirectToRoute('default');
    }
    // Le service authentication_utils permet de récupérer le nom d'utilisateur
    // et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide
    // (mauvais mot de passe par exemple)
    $authenticationUtils = $this->get('security.authentication_utils');

    return $this->render('GestionSalleBundle:Default:login.html.twig', array(
      'last_username' => $authenticationUtils->getLastUsername(),
      'error'         => $authenticationUtils->getLastAuthenticationError(),
    ));
  }

  /**
    *@Route("/", name="default")
    */
  public function defaultAction(Request $request)
  {
    return $this->redirectToRoute('login');
  }
  
  /**
    *@Route("/defaultuser/{id}", name="defaultuser")
     * @Security("has_role('ROLE_USER')")
    */
  public function defaultUserAction(Request $request, User $user)
  {
        $em = $this->getDoctrine()->getManager();
        if ($user->getIdTitre() == 'eleve')
        {
          $idFormation = $user->getIdFormation();
        $reservations = $em->getRepository('GestionSalleBundle:Reservation')->findWeekStud($idFormation);
        }
        if ($user->getIdTitre() == 'professeur')
        {
          $idUser = $user->getId();
          $reservations = $em->getRepository('GestionSalleBundle:Reservation')->findWeekProf($idUser);
        }

        //$reservations = $em->getRepository('gestionBundle:Reservation')->findAll();

        return $this->render('reservation/viewWeek.html.twig', array(
            'reservations' => $reservations,
        ));
  }
}

