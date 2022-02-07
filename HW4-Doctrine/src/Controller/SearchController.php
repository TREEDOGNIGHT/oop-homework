<?php

namespace App\Controller;

use App\Entity\Cat;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'search')]
    public function index(): Response
    {
        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }

    public function searchBar(ManagerRegistry $doctrine)
    {
        $form = $this->createFormBuilder(null)
            ->add('query', TextType::class)
            ->add('search', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
            ->getForm();

        if (!empty($_POST['form']['query'])) {

            $value = $_POST['form']['query'];

            $search = $doctrine->getRepository(Cat::class)
                ->findOneBy(['name' => $value]);

            //var_dump($search);
            return $this->render('search/result.html.twig', [
                'results' => $search
            ]);
        }


        return $this->render('search/searchBar.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function connectionAction(Request $request)
    {
        $request = $request->request->get();
        return $request->request->get();
    }

//    public function findBySearch(string $value)
//
//    {
//        return $this->createQueryBuilder('a')
//            ->where('a.category = :category')
//            ->andWhere('a.region = :region')
//            ->andWhere('a.title LIKE :value')
//            ->orWhere('a.description LIKE :value')
//            ->setParameters([
//                'value' => $value,
//                'region' => $region,
//                'category' => $category
//            ])
//            ->getQuery()
//            ->getResult();
//
//    }

}
