<?php

// src/Controller/CatController.php
namespace App\Controller;

// ...
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Cat;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

class CatController extends AbstractController
{

    private function create_input_forms() {



    }



    #[Route('/cats', name: 'cat_show_all')]
    public function index(ManagerRegistry $doctrine): Response
    {

        $cats =  $doctrine->getRepository(Cat::class)->findAll();
        return $this->render('cat/index.html.twig', [
            'controller_name' => 'CatController',
        ]);
    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    #[Route('/cats/add_new', name: 'create_cat')]
    public function createCat(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $cat = new Cat();
        $color = ['green', 'red', 'white'];
        $size = ['small', 'medium', 'big'];
        $cat->setName('www');
        $cat->setNickname($this->generateRandomString(7));
        $cat->setColor($color[array_rand($color)]);
        $cat->setSize($size[array_rand($size)]);
        $cat->setLovePoint(rand(1, 10000));
        $cat->setImage('https://random.imagecdn.app/500/500');

        // tell Doctrine you want to (eventually) save the Cat (no queries yet)
        $entityManager->persist($cat);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new Cat with id ' . $cat->getId());
    }

    #[Route('/cats/{id}', name: 'cat_show')]
    public function show(ManagerRegistry $doctrine, int $id): Response
    {
        $cat = $doctrine->getRepository(Cat::class)->find($id);

        if (!$cat) {
            throw $this->createNotFoundException(
                'No cats found for id ' . $id
            );
        }

        return new Response('Check out this great cats: ' . $cat->getImage());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }

}

