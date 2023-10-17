<?php

namespace App\Controller;

use App\Entity\Direction;
use App\Repository\DirectionRepository;
use App\Entity\Service;
use App\Repository\ServiceRepository;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/service")
 */
class ServiceController extends AbstractController
{
    /**
     * @Route("/", name="service_index", methods={"GET"})
     */
    public function index(ServiceRepository $ServiceRepository,DirectionRepository $DirectionRepository )
    {
        return $this->render('service/index.html.twig', [
            'services' => $ServiceRepository->findAll(),
            'directions'=>$DirectionRepository->findAll(),
        ]);
    }
    /**
     * @Route("/new", name="service_new", methods={"GET","POST"})
     */
    public function Ajout(Request $request): Response
    {
        $nomservice = $request->get('nomservice');
        $codeservice = $request->get('codeservice');
        $iddirection = $request->get('iddir');
        
        $service = new service();
        $service->setCodeservice($codeservice);
        $service->setNomservice($nomservice);

            $entityManager = $this->getDoctrine()->getManager();
            $dir = $entityManager->getRepository(Direction::class);

            $direction = $dir->find($iddirection);
            $service->setDirection($direction);

            $entityManager->persist($service);
            $entityManager->flush();

            return $this->redirectToRoute('service_index');
    }

    /**
     * @Route("/edit", name="service_edit", methods={"GET","POST"})
     */
    public function edit(Request $request): Response
    {
        $id = $request->get('idservice');

        $nomservice = $request->get('nomservice_mod');
        $codeservice = $request->get('codeservice_mod');
        $iddirection = $request->get('iddir_mod');
            $entityManager = $this->getDoctrine()->getManager();
            $serv = $entityManager->getRepository(Service::class);

            $service = $serv->find($id);
            $service->setCodeservice($codeservice);
            $service->setNomservice($nomservice);
            $dir = $entityManager->getRepository(Direction::class);
            $direction = $dir->find($iddirection);
            $service->setDirection($direction);
            $entityManager->persist($service);
            $entityManager->flush();

            return $this->redirectToRoute('service_index');
    }
    /**
     * @Route("/{id}", name="service_delete")
     */
    public function delete(Request $request, Service $service): Response
    {
            $id = $service->getId();

            $entityManager = $this->getDoctrine()->getManager();
            $serv = $entityManager->getRepository(Service::class);

            $service = $serv->find($id);
            $entityManager->remove($service);
            $entityManager->flush();

        return $this->redirectToRoute('service_index');
    }

}
