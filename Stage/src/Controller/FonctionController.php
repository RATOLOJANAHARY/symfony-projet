<?php

namespace App\Controller;

use App\Entity\Fonction;
use App\Repository\FonctionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fonction")
 */
class FonctionController extends AbstractController
{
   /**
     * @Route("/", name="fonction_index", methods={"GET"})
     */
    public function index(FonctionRepository $fonctionRepository)
    {
        return $this->render('fonction/index.html.twig', [
            'fonctions' => $fonctionRepository->findAll(),
        ]);
    }


    /**
     * @Route("/new", name="fonction_new", methods={"GET","POST"})
     */
    public function Ajout(Request $request): Response
    {
        $nomfonction = $request->get('nomfonction');
        
        $fonction = new Fonction();
        $fonction->setNomFonction($nomfonction); 

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fonction);
            $entityManager->flush();


        return $this->redirectToRoute('fonction_index');
    }

    /**
     * @Route("/edit", name="fonction_edit", methods={"GET","POST"})
     */
    public function edit(Request $request): Response
    {
        $nomfonction = $request->get('nomfonction_mod');
        $id = $request->get('idFonction');

            $entityManager = $this->getDoctrine()->getManager();
            $fonct = $entityManager->getRepository(Fonction::class);

            $fonction = $fonct->find($id);
            $fonction->setNomFonction($nomfonction);

            $entityManager->persist($fonction);
            $entityManager->flush();

            return $this->redirectToRoute('fonction_index');
    }

    /**
     * @Route("/{id}", name="fonction_delete")
     */
    public function delete(Request $request, Fonction $fonction): Response
    {
            $id = $fonction->getId();

            $entityManager = $this->getDoctrine()->getManager();
            $fonct = $entityManager->getRepository(Fonction::class);
            
            $fonction = $fonct->find($id);
            $entityManager->remove($fonction);
            $entityManager->flush();

        return $this->redirectToRoute('fonction_index');
    }

}
