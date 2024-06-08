<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\CalcService;
use App\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

    class HelloController extends AbstractController {

        private $calcservice;

        public function __construct(CalcService $calcService){
            $this->calcservice = $calcService;
        }

        #[Route('new')]
        public function new(Request $request, ValidatorInterface $validator): Response {
            $user = new User();
            $user->setUsername('Daniel');
            $user->setEmail('fear@gmail.com');

            $form = $this->createForm(UserType::class, $user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                // Validate the User entity
                $errors = $validator->validate($user);
                if (count($errors) > 0) {
                    return $this->render('user/new.html.twig', [
                        'form' => $form,
                        'errors' => $errors,
                    ]);
                }
            }

            return $this->render('user/new.html.twig', [
                'form' => $form
            ]);
        }

        #[Route('hello/{name}', defaults: ['name' => 'World'])]
        public function saludar(string $name): Response {
            return new Response('Hello '. $name);
        }

        #[Route('add/{a}/{b}')]
        public function addNumbers(int $a, int $b) {
            return new Response('Result: '. $this->calcservice->add($a, $b));
        }
    }