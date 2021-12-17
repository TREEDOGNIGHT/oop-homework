<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Form\EmailType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
//use Symfony\Component\Security\Core\Security\UserPasswordEncoderInterface;
class RegistrationController extends AbstractController
{

    /**
     * @Route("/registration", name="registration")
     */
    public function index(Request $request)
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        $plaintextPassword = 'passsss';
        if ($form->isSubmitted() && $form->isValid()) {
            // Encode the new users password
            $hashedPassword = $form->hashPassword(
                $user,
                $plaintextPassword
            );
            $user->setPassword($hashedPassword);

            // Set their role
            $user->setRoles(['ROLE_USER']);

            // Save
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}