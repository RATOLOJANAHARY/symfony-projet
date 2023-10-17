<?php

namespace App\Controller;

use App\Entity\Direction;
use App\Repository\DirectionRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/direction")
 */

class DirectionController extends AbstractController
{
    /**
     * @Route("/", name="direction_index", methods={"GET"})
     */
    public function index(DirectionRepository $directionRepository): Response
    {
        return $this->render('direction/index.html.twig', [
            'direction' =>$directionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="direction_new", methods={"GET","POST"})
     */
    public function Ajout(Request $request): Response
    {
        $nomdir = $request->get('nomdirection');
        $codedir = $request->get('codedirection');
        
        $direction = new Direction();
        $direction->setCodeDirection($codedir);
        $direction->setNomDirection($nomdir);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($direction);
            $entityManager->flush();

            return $this->redirectToRoute('direction_index');
    }

    /**
     * @Route("/edit", name="direction_edit", methods={"GET","POST"})
     */
    public function edit(Request $request): Response
    {
        $nomdir = $request->get('nomdirection_mod');
        $codedir = $request->get('codedirection_mod');
        $id = $request->get('iddirection');

            $entityManager = $this->getDoctrine()->getManager();
            $dir = $entityManager->getRepository(Direction::class);

            $direction = $dir->find($id);
            $direction->setCodeDirection($codedir);
            $direction->setNomDirection($nomdir);
          

            $entityManager->persist($direction);
            $entityManager->flush();

            return $this->redirectToRoute('direction_index');
    }
    /**
     * @Route("/{id}", name="direction_delete")
     */
    public function delete(Request $request, Direction $direction): Response
    {
            $id = $direction->getId();

            $entityManager = $this->getDoctrine()->getManager();
            $dir = $entityManager->getRepository(Direction::class);

            $direction = $dir->find($id);
            $entityManager->remove($direction);
            $entityManager->flush();

        return $this->redirectToRoute('direction_index');
    }
}
