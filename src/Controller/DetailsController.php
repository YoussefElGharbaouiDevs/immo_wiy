<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailsController extends AbstractController
{
    #[Route('/details/{id}', name: 'app_details')]
    public function details(int $id): Response
    {
        // Exemple de données pour les maisons (à remplacer par une base de données)
        $houses = [
            1 => ['id' => 1, 'title' => 'Maison Moderne', 'description' => 'Une maison spacieuse avec un grand jardin et piscine.', 'price' => 15000, 'image' => 'https://cloudfront-eu-central-1.images.arcpublishing.com/le360/VIAAKUU3AZAXXJCMKTOXS4JHMU.jpg'],
            2 => ['id' => 2, 'title' => 'Villa Familiale', 'description' => 'Une villa idéale pour les familles avec une vue magnifique.', 'price' => 30000, 'image' => 'https://c1.staticflickr.com/1/487/20013675828_e4edf95180_b.jpg'],
            3 => ['id' => 3, 'title' => 'Appartement Cosy', 'description' => 'Un appartement confortable en centre-ville.', 'price' => 9000, 'image' => 'https://cdn.pap.fr/photos/papvacances/06/d2/06d26a2e62fbaa85bbf3e956e612694f/0-p1.jpg'],
        ];

        // Vérifier si la maison existe
        if (!isset($houses[$id])) {
            throw $this->createNotFoundException("Maison non trouvée !");
        }

        // Afficher la page des détails de la maison
        return $this->render('details/details.html.twig', [
            'house' => $houses[$id],
        ]);
    }

    #[Route('/payment/{id}', name: 'app_payment')]
    public function payment(int $id): Response
    {
        // Exemple de données pour les maisons (à remplacer par une base de données)
        $houses = [
            1 => ['id' => 1, 'title' => 'Maison Moderne', 'description' => 'Une maison spacieuse avec un grand jardin et piscine.', 'price' => 15000, 'image' => 'https://cloudfront-eu-central-1.images.arcpublishing.com/le360/VIAAKUU3AZAXXJCMKTOXS4JHMU.jpg'],
            2 => ['id' => 2, 'title' => 'Villa Familiale', 'description' => 'Une villa idéale pour les familles avec une vue magnifique.', 'price' => 30000, 'image' => 'https://c1.staticflickr.com/1/487/20013675828_e4edf95180_b.jpg'],
            3 => ['id' => 3, 'title' => 'Appartement Cosy', 'description' => 'Un appartement confortable en centre-ville.', 'price' => 9000, 'image' => 'https://cdn.pap.fr/photos/papvacances/06/d2/06d26a2e62fbaa85bbf3e956e612694f/0-p1.jpg'],
        ];

        // Vérifier si la maison existe
        if (!isset($houses[$id])) {
            throw $this->createNotFoundException("Maison non trouvée !");
        }

        // Afficher la page de paiement
        return $this->render('payment/payment.html.twig', [
            'house' => $houses[$id],
        ]);
    }
}
