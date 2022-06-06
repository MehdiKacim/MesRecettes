<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Theme;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository;
class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();

        $r = $doctrine->getRepository(User::class);
        $u = $r->find(1);
        dump($u);
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'current_user' => $u
        ]);
    }
}
