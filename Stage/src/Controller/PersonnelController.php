<?php

namespace App\Controller;

use App\Entity\Personnel;
use App\Repository\PersonnelRepository;
use App\Entity\Service;
use App\Repository\ServiceRepository;
use App\Entity\Direction;
use App\Repository\DirectionRepository;
use App\Entity\Fonction;
use App\Repository\FonctionRepository;
use App\Entity\Grade;
use App\Repository\GradeRepository;
use App\Entity\Diplome;
use App\Repository\DiplomeRepository;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/personnel")
 */
class PersonnelController extends AbstractController
{
    /**
     * @Route("/", name="personnel_index", methods={"GET"})
     */
    public function index(PersonnelRepository $PersonnelRepository, ServiceRepository $ServiceRepository,DirectionRepository $DirectionRepository,FonctionRepository $FonctionRepository,GradeRepository $GradeRepository,DiplomeRepository $DiplomeRepository)
    {
        return $this->render('personnel/index.html.twig', [
            'personnels' => $PersonnelRepository->findAll(),
            'services' => $ServiceRepository->findAll(),
            'directions'=>$DirectionRepository->findAll(),
            'fonctions'=>$FonctionRepository->findAll(),
            'grades'=>$GradeRepository->findAll(),
            'diplomes'=>$DiplomeRepository->findAll(),
        ]);
    }
    /**
     * @Route("/new", name="personnel_new", methods={"GET","POST"})
     */
    public function Ajout(Request $request): Response
    {
        $cin = $request->get('cin');
        $nummatricule = $request->get('nummatricule');
        $nom = $request->get('nom');
        $prenom = $request->get('prenom');
        $sexe = $request->get('sexe');
        $datenaissance = $request->get('datenaissance');
        $idservice = $request->get('idservice');
        $idfonction = $request->get('idfonction');
        $idgrade = $request->get('idgrade');
        $iddiplome = $request->get('iddiplome');
        $categorie = $request->get('categorie');
        $indice = $request->get('indice');
        $classe = $request->get('classe');
        $echelon = $request->get('echellon');
        $dateaffectation = $request->get('dateaffectation');
        $dateeffetdernier = $request->get('dateeffetdernier');
        $dateentre = $request->get('dateentre');
        
        $personnel = new personnel();
        $personnel->setCIN($cin);
        $personnel->setNumMatricule($nummatricule);
        $personnel->setNom($nom);
        $personnel->setPrenom($prenom);
        $personnel->setSexe($sexe);
        $personnel->setDateNaissance(new \DateTime($datenaissance));
        $personnel->setCategorie($categorie);
        $personnel->setIndice($indice);
        $personnel->setClasse($classe);
        $personnel->setEchellon($echelon);
        $personnel->setDateAffectation(new \DateTime($dateaffectation));
        $personnel->setDateEffetDernier(new \DateTime($dateeffetdernier));
        $personnel->setDateEntre(new \DateTime($dateentre));

            $entityManager = $this->getDoctrine()->getManager();
            $ser = $entityManager->getRepository(Service::class);
            $fonct = $entityManager->getRepository(Fonction::class);
            $grad = $entityManager->getRepository(Grade::class);
            $dip = $entityManager->getRepository(Diplome::class);

            $service = $ser->find($idservice);
            $fonction = $fonct->find($idfonction);
            $grade = $grad->find($idgrade);
            $diplome = $dip->find($iddiplome);

            $personnel->setService($service);
            $personnel->setFonction($fonction);
            $personnel->setGrade($grade);
            $personnel->setDiplome($diplome);

            $entityManager->persist($personnel);
            $entityManager->flush();

            return $this->redirectToRoute('personnel_index');
    }
    /**
     * @Route("/edit", name="personnel_edit", methods={"GET","POST"})
     */
    public function edit(Request $request): Response
    {
        $id = $request->get('idper');

        $nummatricule = $request->get('nummatricule_mod');
        $nom = $request->get('nom_mod');
        $prenom = $request->get('prenom_mod');
        $sexe = $request->get('sexe_mod');
        $datenaissance = $request->get('datenaissance_mod');
        $idservice = $request->get('idservice_mod');
        $idfonction = $request->get('idfonction_mod');
        $idgrade = $request->get('idgrade_mod');
        $iddiplome = $request->get('iddiplome_mod');
        $categorie = $request->get('categorie_mod');
        $indice = $request->get('indice_mod');
        $classe = $request->get('classe_mod');
        $echelon = $request->get('echellon_mod');
        $dateaffectation = $request->get('dateaffectation_mod');
        $dateeffetdernier = $request->get('dateeffetdernier_mod');
        $dateentre = $request->get('dateentre_mod');
            $entityManager = $this->getDoctrine()->getManager();
            $pers = $entityManager->getRepository(Personnel::class);

            $personnel = $pers->find($id);
            $personnel->setNumMatricule($nummatricule);
            $personnel->setNom($nom);
            $personnel->setPrenom($prenom);
            $personnel->setSexe($sexe);
            $personnel->setDateNaissance(new \DateTime($datenaissance));
            $personnel->setCategorie($categorie);
            $personnel->setIndice($indice);
            $personnel->setClasse($classe);
            $personnel->setEchellon($echelon);
            $personnel->setDateAffectation(new \DateTime($dateaffectation));
            $personnel->setDateEffetDernier(new \DateTime($dateeffetdernier));
            $personnel->setDateEntre(new \DateTime($dateentre));

            $ser = $entityManager->getRepository(Service::class);
            $dir = $entityManager->getRepository(Direction::class);
            $fonct = $entityManager->getRepository(Fonction::class);
            $grad = $entityManager->getRepository(Grade::class);
            $dip = $entityManager->getRepository(Diplome::class);

            $service = $ser->find($idservice);
            $fonction = $fonct->find($idfonction);
            $grade = $grad->find($idgrade);
            $diplome = $dip->find($iddiplome);

            $personnel->setService($service);
            $personnel->setFonction($fonction);
            $personnel->setGrade($grade);
            $personnel->setDiplome($diplome);

            $entityManager->persist($personnel);
            $entityManager->flush();

            return $this->redirectToRoute('personnel_index');
    }
    /**
     * @Route("/{id}", name="personnel_delete")
     */
    public function delete(Request $request, Personnel $personnel): Response
    {
            $id = $personnel->getId();

            $entityManager = $this->getDoctrine()->getManager();
            $pers = $entityManager->getRepository(Personnel::class);

            $personnel = $pers->find($id);
            $entityManager->remove($personnel);
            $entityManager->flush();

        return $this->redirectToRoute('personnel_index');
    }
}
