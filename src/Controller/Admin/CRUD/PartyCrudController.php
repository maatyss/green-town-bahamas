<?php

namespace App\Controller\Admin\CRUD;

use App\Entity\Party;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PartyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Party::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            BooleanField::new('isDisplayed', 'Afficher ?'),
            TextField::new('name', 'Nom de la soirée'),
            DateField::new('startAt', 'Date'),
            TextField::new('theme', 'Thème'),
            TextEditorField::new('description'),
            IntegerField::new('placesAvaibles', 'Places Disponnibles'),
            IntegerField::new('entryPrice', 'Prix d\'entrée'),
            ImageField::new('cover', 'Image')
                ->setBasePath('upload/party/cover')
                ->setUploadDir('public/upload/party/cover'),
        ];
    }

}
