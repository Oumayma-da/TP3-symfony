<?php

namespace App\Controller;

use App\Form\ProductFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/', name: 'product')]
    public function index(Request $request): Response
    {
        // Créer et traiter le formulaire
        $form = $this->createForm(ProductFormType::class);
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            // Traitement des données (ex. ajouter au panier, afficher un message)
            $this->addFlash('success', 'Product added to cart!');
        }

        // Retourner la vue
        return $this->render('product/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
