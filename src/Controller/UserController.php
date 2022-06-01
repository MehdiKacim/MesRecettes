<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository;
class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();

        $user = new User();

        $user->setUsername("Mehdikacim");
        $user->setPassword("Mehkac1995!");
        $user->setDateOfBirth(new \DateTimeImmutable("1995-07-06"));
        $user->setMail("mehdikacim@guelt.com");
        $user->setCreatedAt(new \DateTimeImmutable());
        $user->setUpdatedAt($user->getCreatedAt());

        $repository = $doctrine->getRepository(User::class);
        $repository->removeAll();
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'User' => $user
        ]);
    }
}
