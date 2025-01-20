<?php
// src/Controller/PaymentController.php

namespace App\Controller;

use App\Entity\Payment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTimeImmutable;

class PaymentController extends AbstractController
{
    #[Route('/payment/{id}', name: 'app_payment')]
    public function payment(int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        // Exemple de récupération des données de la maison
        $houses = [
            1 => [
                'id' => 1, 
                'title' => 'Maison Moderne', 
                'price' => 15000, 
                'image' => 'https://cloudfront-eu-central-1.images.arcpublishing.com/le360/VIAAKUU3AZAXXJCMKTOXS4JHMU.jpg'
            ],
            2 => [
                'id' => 2,
                'title' => 'Villa Familiale', 
                'price' => 30000, 
                'image' => 'https://c1.staticflickr.com/1/487/20013675828_e4edf95180_b.jpg'
            ],
            3 => [
                'id' => 3,
                'title' => 'Appartement Cosy', 
                'price' => 9000, 
                'image' => 'https://cdn.pap.fr/photos/papvacances/06/d2/06d26a2e62fbaa85bbf3e956e612694f/0-p1.jpg'
            ],
        ];

        // Vérifier si la maison existe
        if (!isset($houses[$id])) {
            throw $this->createNotFoundException("Maison non trouvée !");
        }

        // Récupérer les données de la maison pour les passer à la vue
        $house = $houses[$id];

        // Si le formulaire est soumis
        if ($request->isMethod('POST')) {
            // Récupérer les données du formulaire
            $firstName = $request->request->get('nom'); // Prénom
            $lastName = $request->request->get('prenom'); // Nom
            $email = $request->request->get('email');
            $cardNumber = $request->request->get('carte');
            $expirationDate = $request->request->get('expiration'); // Format "YYYY-MM"
            $cvv = $request->request->get('cvv');
            $cardType = $request->request->get('type-carte');

            // Valider et transformer la date d'expiration (au format "YYYY-MM")
            $expirationDateObj = DateTimeImmutable::createFromFormat('!Y-m', $expirationDate);
            if (!$expirationDateObj) {
                throw $this->createNotFoundException("Date d'expiration invalide !");
            }

            // Créer une nouvelle instance de Payment
            $payment = new Payment();
            $payment->setFirstName($firstName) // Prénom
                    ->setLastName($lastName) // Nom
                    ->setCardNumber($cardNumber) // Numéro de la carte
                    ->setExpirationDate($expirationDateObj) // Date d'expiration
                    ->setCvv($cvv) // Code CVV
                    ->setPaymentAmount($house['price']) // Montant du paiement (prix de la maison)
                    ->setPaymentDate(new \DateTimeImmutable ()) // Date actuelle pour le paiement
                    ->setCardType($cardType) // Type de carte
                    ->setHouseId($house['id']); // Lier le paiement à la maison

            // Sauvegarder l'objet Payment dans la base de données
            $entityManager->persist($payment);
            $entityManager->flush();

            // Rediriger vers le contrôleur de reçu après le paiement
            return $this->redirectToRoute('app_receipt', ['paymentId' => $payment->getId()]);
        }

        // Passer les données de la maison à la vue
        return $this->render('payment/payment.html.twig', [
            'house' => $house,
        ]);
    }

    #[Route('/payment_success', name: 'payment_success')]
    public function success(): Response
    {
        // Afficher un message de succès ou rediriger vers une autre page
        return $this->render('payment/success.html.twig', [
            'message' => 'Paiement effectué avec succès !',
        ]);
    }

    #[Route('/receipt/{paymentId}', name: 'app_receipt')]
    public function receipt(int $paymentId, EntityManagerInterface $entityManager): Response
    {
        // Récupérer le paiement à partir de l'ID
        $payment = $entityManager->getRepository(Payment::class)->find($paymentId);

        // Vérifier si le paiement existe
        if (!$payment) {
            throw $this->createNotFoundException("Paiement non trouvé !");
        }

        // Passer les informations de paiement à la vue de reçu
        return $this->render('payment/receipt.html.twig', [
            'payment' => $payment,
        ]);
    }
}
