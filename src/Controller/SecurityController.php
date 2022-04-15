<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function index(): Response
    {
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function dashboard(Request $request,EntityManagerInterface $manager, SessionInterface $session): Response
    {
			//récupération des infos du formulaire.
			$email = $request->request->get("email");
			$password = $request->request->get("password");
            $reponse = $manager -> getRepository(user :: class) -> findOneBy(['email' => $email]);
            if($reponse==NULL){
                $message = "⛔ ATTENTION : Le login ne peut pas être nul ⛔";
                $session -> clear ();
            }
            else{
                $hash = $reponse -> getPassword();
                if (password_verify($password, $hash)){
                    $message = "✔️ Connexion réussie ✔️";
                    $session -> set('identifiant',$reponse->getId());
                }
                else{
                    $message = "⛔ ATTENTION : Mot de passe incorrect ⛔";  
                    $session -> clear ();
                }
            }

            return $this->render('security/dashboard.html.twig', [
              'email' => $email,
              'password' => $password,
              'message'=> $message,
        
        ]);
    }
}
