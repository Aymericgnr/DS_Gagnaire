<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TacheControlleController extends AbstractController
{
    /**
     * @Route("/listeTaches", name="listeTaches")
     */
    public function index(): Response
    {
        return $this->render('tache_controlle/index.html.twig', [
            'controller_name' => 'TacheControlleController',
        ]);
    }
    /**
    * @Route("/supprTache/{id}",name="supprTache")
    */
    public function supprTache(EntityManagerInterface $manager,Utilisateur $editutil): Response 
    {
    $manager->remove($editutil);
    $manager->flush();
    // Affiche de nouveau la liste des utilisateurs
    return $this->redirectToRoute ('listeTaches');
    }
}
