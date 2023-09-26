<?php

namespace App\Controller\Admin;

use App\Controller\Admin\CRUD\PartyCrudController;
use App\Entity\Party;
use App\Entity\User;
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

    #[IsGranted('ROLE_ADMIN', 'ROLE_EMPLOYEE', 'ROLE_RH')]
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
        yield MenuItem::linkToCrud('Soirée', 'fa fa-wine-bottle', Party::class);

        if(in_array('ROLE_RH', $this->getUser()->getRoles())){
            yield MenuItem::linkToCrud('User', 'fa fa-users', User::class);
        }
    }
}
