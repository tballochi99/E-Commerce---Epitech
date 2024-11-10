<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login', methods: ['POST'])]
    public function login(Request $request, UserRepository $userRepository, UserPasswordHasherInterface $passwordHasher, LoggerInterface $logger, EntityManagerInterface $em, JWTTokenManagerInterface $jwtManager): Response
    {
        $logger->info('Login method started');
        $logger->info('Request Content: ' . $request->getContent());

        $parameters = json_decode($request->getContent(), true);
        if ($parameters === null) {
            $logger->error('Invalid JSON');
            return new Response('Invalid JSON', Response::HTTP_BAD_REQUEST);
        }

        if (!isset($parameters['email']) || !isset($parameters['password'])) {
            $logger->error('Missing email or password', ['parameters' => $parameters]);
            return new Response('Email ou mot de passe manquant', Response::HTTP_BAD_REQUEST);
        }

        $email = $parameters['email'];
        $logger->info('Email: ' . $email);

        $plainPassword = $parameters['password'];
        $logger->info('Password: ' . $plainPassword);

        $user = $userRepository->findOneBy(['email' => $email]);
        if (!$user) {
            $logger->info('User not found');
            return new Response('Email ou mot de passe invalide', Response::HTTP_BAD_REQUEST);
        }

        if (!$passwordHasher->isPasswordValid($user, $plainPassword)) {
            $logger->info('Invalid password');
            return new Response('Email ou mot de passe invalide', Response::HTTP_BAD_REQUEST);
        }

        $token = $jwtManager->create($user);
        $logger->info('Token: ' . $token);

        $isAdmin = in_array('ROLE_ADMIN', $user->getRoles());

        return $this->json([
            'email' => $user->getEmail(),
            'roles' => $user->getRoles(),
            'userId' => $user->getId(),
            'isAdmin' => $isAdmin,
            'token' => $token,
        ]);
    }
}
