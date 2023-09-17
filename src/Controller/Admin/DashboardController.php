<?php

namespace App\Controller\Admin;

use App\Controller\Admin\PostCrudController;
use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Post;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        
        return $this->redirect($adminUrlGenerator->setController(PostCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfony');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::linkToCrud('Categories', 'fa fa-folder', Category::class);
        yield MenuItem::linkToCrud('Posts', 'fa fa-cloud', Post::class);
        yield MenuItem::linkToCrud('Comments', 'fa fa-comments', Comment::class);

        // yield MenuItem::linkToRoute('Web site', 'fa fa-home', 'app_home');
    }
}
