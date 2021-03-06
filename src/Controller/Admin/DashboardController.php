<?php

namespace App\Controller\Admin;

use App\Entity\Venta;
use App\Entity\Gastos;
use App\Entity\Ingreso;
use App\Entity\Persona;
use App\Entity\Articulo;
use App\Entity\Categoria;
use App\Entity\Proveedores;
use App\Entity\DetalleVenta;
use App\Entity\DetalleIngreso;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;

//CSS
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        //return parent::index();
        $routeBuilder = $this->get(AdminUrlGenerator::class);   
        return $this->redirect($routeBuilder->setController(ArticuloCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
           // ->setTitle('<img src="images/castilloalv.png" style="width:190px;height:150px;"/>')
            ->setFaviconPath('images/vivaricLogo.png')
        ;
    }

    public function configureMenuItems(): iterable
    {
        
        yield MenuItem::section('Menu');   
        yield MenuItem::linkToCrud('Categoria', 'fas fa-tags', Categoria::class);
        yield MenuItem::linkToCrud('Detalle ingreso', 'fas fa-cart-plus', DetalleIngreso::class);
        yield MenuItem::linkToCrud('Invertario', 'fas fa-boxes', Articulo::class);
        yield MenuItem::linkToCrud('Ingreso', 'fas fa-people-carry', Ingreso::class);
        yield MenuItem::linkToCrud('Venta', 'fas fa-store', Venta::class);
        yield MenuItem::linkToCrud('Detalle Venta', 'fas fa-cart-plus', DetalleVenta::class);
        yield MenuItem::linkToCrud('Persona', 'fas fa-users', Persona::class);
        yield MenuItem::linkToCrud('Proveedor', 'fas fa-parachute-box', Proveedores::class);
        yield MenuItem::linkToCrud('Gastos', 'fas fa-coins', Gastos::class);
         
        //REPORTES
        yield MenuItem::linktoRoute('Reportes', 'fas fa-file-alt','pdf'); 
    }
    
    //CSS PERSONALIZADO
    public function configureAssets(): Assets
    {
        return Assets::new()->addCssFile('css/admin.css');
    }
}
