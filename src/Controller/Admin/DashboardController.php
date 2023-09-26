<?php

namespace App\Controller\Admin;

use App\Controller\Admin\CRUD\PartyCrudController;
use App\Entity\Party;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{

    public function __construct(private AdminUrlGenerator $adminUrlGenerator,)
    {

    }

    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(PartyCrudController::class)
            ->setAction(Crud::PAGE_INDEX)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Bahamas');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Accueil', 'fa fa-home', 'app');
        yield MenuItem::linkToCrud('Soirée', '', Party::class);
    }
}
