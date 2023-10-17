<?php

namespace App\Controller;

use App\Entity\Personnel;
use App\Repository\PersonnelRepository;
use App\Entity\Grade;
use App\Repository\GradeRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Include Dompdf required namespaces
use Dompdf\Dompdf;
use Dompdf\Options;

class AffichageRetraiteController extends AbstractController
{
    /**
     * @Route("/affichageretraite", name="affichageretraite")
     */
    public function index(PersonnelRepository $PersonnelRepository)
    {
        return $this->render('affichage_retraite/index.html.twig', [
            'personnels' => $PersonnelRepository->affichageRetraite(),
        ]);
    }

    /**
     * @Route("/imprimer_retraite", name="impression_retraite")
     */
    public function impression_retraite(PersonnelRepository $PersonnelRepository)
    {
    	// Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('affichage_efa/imprimer_efa.html.twig', [
            'personnels' => $PersonnelRepository->affichageRetraite(),
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
    }

}
