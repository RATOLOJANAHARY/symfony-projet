<?php

namespace App\Controller;

use App\Entity\Grade;
use App\Repository\GradeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/grade")
 */
class GradeController extends AbstractController
{
    /**
     * @Route("/", name="grade_index", methods={"GET"})
     */
    public function index(GradeRepository $GradeRepository)
    {
        return $this->render('grade/index.html.twig', [
            'grades' =>$GradeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="grade_new", methods={"GET","POST"})
     */
    public function Ajout(Request $request): Response
    {
        $codegrade = $request->get('codegrade');
        $nomgrade = $request->get('nomgrade');
        
        $grade = new Grade();
        $grade->setCodeGrade($codegrade);
        $grade->setNomGrade($nomgrade);
        
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($grade);
            $entityManager->flush();


        return $this->redirectToRoute('grade_index');
    }

    /**
     * @Route("/edit", name="grade_edit", methods={"GET","POST"})
     */
    public function edit(Request $request): Response
    {
        $nomgrade = $request->get('nomgrade_mod');
        $codegrade = $request->get('codegrade_mod');
        $id = $request->get('idGrade');

            $entityManager = $this->getDoctrine()->getManager();
            $grad = $entityManager->getRepository(Grade::class);

            $grade = $grad->find($id);
            $grade->setCodeGrade($codegrade);
            $grade->setNomGrade($nomgrade);
          

            $entityManager->persist($grade);
            $entityManager->flush();

            return $this->redirectToRoute('grade_index');
    }
    /**
     * @Route("/{id}", name="grade_delete")
     */
    public function delete(Request $request, Grade $grade): Response
    {
            $id = $grade->getId();

            $entityManager = $this->getDoctrine()->getManager();
            $grad = $entityManager->getRepository(Grade::class);

            $grade = $grad->find($id);
            $entityManager->remove($grade);
            $entityManager->flush();

        return $this->redirectToRoute('grade_index');
    }
}
