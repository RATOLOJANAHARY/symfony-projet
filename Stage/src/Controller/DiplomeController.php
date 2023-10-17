<?php

namespace App\Controller;

use App\Entity\Diplome;
use App\Repository\DiplomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/diplome")
 */
class DiplomeController extends AbstractController
{
    /**
     * @Route("/", name="diplome_index", methods={"GET"})
     */
    public function index(DiplomeRepository $diplomeRepository): Response
    {

        return $this->render('diplome/index.html.twig', [
            'diplomes' => $diplomeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="diplome_new", methods={"GET","POST"})
     */
    public function Ajout(Request $request): Response
    {
        $nomdiplome = $request->get('nomdiplome');
        
        $diplome = new Diplome();
        $diplome->setNomDiplome($nomdiplome);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($diplome);
            $entityManager->flush();

            return $this->redirectToRoute('diplome_index');
    }
    
    /**
     * @Route("/edit", name="diplome_edit", methods={"GET","POST"})
     */
    public function edit(Request $request): Response
    {
        $nomdiplome = $request->get('nomdiplome_mod');
        $id = $request->get('idDiplome');

            $entityManager = $this->getDoctrine()->getManager();
            $dip = $entityManager->getRepository(Diplome::class);

            $diplome = $dip->find($id);
            $diplome->setNomDiplome($nomdiplome);

            $entityManager->persist($diplome);
            $entityManager->flush();

            return $this->redirectToRoute('diplome_index');
    }

    /**
     * @Route("/{id}", name="diplome_delete")
     */
    public function delete(Request $request, Diplome $diplome): Response
    {
            $id = $diplome->getId();

            $entityManager = $this->getDoctrine()->getManager();
            $dip = $entityManager->getRepository(Diplome::class);

            $diplome = $dip->find($id);
            $entityManager->remove($diplome);
            $entityManager->flush();

        return $this->redirectToRoute('diplome_index');
    }
}
