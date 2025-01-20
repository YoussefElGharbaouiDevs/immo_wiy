<?php
// src/Controller/ReceiptController.php

namespace App\Controller;

use App\Entity\Payment;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReceiptController extends AbstractController
{
    #[Route('/receipt/{paymentId}', name: 'app_receipt')]
    public function receipt(int $paymentId, EntityManagerInterface $entityManager): Response
    {
        // Récupérer le paiement depuis la base de données
        $payment = $entityManager->getRepository(Payment::class)->find($paymentId);

        // Vérifier si le paiement existe
        if (!$payment) {
            throw $this->createNotFoundException('Reçu introuvable pour ce paiement.');
        }

        // Récupérer les informations de la maison en fonction de l'ID
        $houses = [
            1 => ['title' => 'Maison Moderne', 'price' => 15000],
            2 => ['title' => 'Villa Familiale', 'price' => 30000],
            3 => ['title' => 'Appartement Cosy', 'price' => 9000],
        ];

        // Ici, on suppose que vous avez déjà l'ID de la maison dans le paiement
        $houseId = $payment->getHouseId(); // Vous devez ajouter un champ `houseId` dans votre entité Payment
        $house = $houses[$houseId] ?? null;

        if (!$house) {
            throw $this->createNotFoundException('Maison non trouvée pour ce paiement.');
        }

        // Générer le contenu HTML du reçu
        $html = $this->renderView('receipt/receipt.html.twig', [
            'payment' => $payment,
            'house' => $house,
        ]);

        // Option pour DomPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        // Initialiser DomPDF
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->render();

        // Télécharger le PDF
        $pdf = $dompdf->output();
        return new Response($pdf, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="recu_paiement.pdf"',
        ]);
    }
}

