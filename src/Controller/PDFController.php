<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
//PROBAR
use Symfony\Component\HttpFoundation\Request;

// ENTIDADES
use App\Entity\Categoria;
use App\Entity\Articulo;
use App\Entity\Proveedores;
use App\Entity\Persona;
use App\Entity\Ingreso;
use App\Entity\Venta;
use App\Entity\DetalleVenta;

// Include Dompdf required namespaces
use Dompdf\Dompdf;
use Dompdf\Options;

class PDFController extends AbstractController
{

    #[Route('/pdf', name: 'pdf')]
    public function index(): Response
    {   
        return $this->render('pdf/index.html.twig', [
            'controller_name' => 'PDFController',
        ]);
    } 

    #[Route('/pdfcategoria', name: 'pdf_categoria')]
    public function categoriapdf(): Response
    {
        $categorias=$this->getDoctrine()->getRepository(Categoria::class)->lista();
        $fechas = new \DateTime();


        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('pdf/categoria.html.twig', [
            'categorias' => $categorias,
            'fechas' => $fechas
        ]);
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('letter', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
        
        exit(0);
        
    }

    #[Route('/pdfarticulo', name: 'pdf_articulo')]
    public function articulopdf(): Response
    {
        $articulos=$this->getDoctrine()->getRepository(Articulo::class)->lista();
        $fechas = new \DateTime();

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        
        $pdfOptions->set('defaultFont', 'Arial');
        // Instantiate Dompdf with our options
        
        $dompdf = new Dompdf($pdfOptions);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('pdf/articulo.html.twig', [
            'articulos' => $articulos,
            'fechas' => $fechas
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('letter', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
        
        exit(0);
        
    }

    #[Route('/pdfproveedor', name: 'pdf_proveedor')]
    public function proveedorpdf(): Response
    {
        $proveedores=$this->getDoctrine()->getRepository(Proveedores::class)->lista();
        $fechas = new \DateTime();

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        
        $pdfOptions->set('defaultFont', 'Arial');
        // Instantiate Dompdf with our options
        
        $dompdf = new Dompdf($pdfOptions);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('pdf/proveedores.html.twig', [
            'proveedores' => $proveedores,
            'fechas' => $fechas
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('letter', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
        
        exit(0);
    }
 
    #[Route('/pdfusuario', name: 'pdf_usuario')]
    public function usuariopdf(): Response
    {
        $personas=$this->getDoctrine()->getRepository(Persona::class)->lista();
        $fechas = new \DateTime();

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        
        $pdfOptions->set('defaultFont', 'Arial');
        // Instantiate Dompdf with our options
        
        $dompdf = new Dompdf($pdfOptions);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('pdf/persona.html.twig', [
            'personas' => $personas,
            'fechas' => $fechas
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('letter', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
        
        exit(0);
    }

    #[Route('/pdfingreso', name: 'pdf_ingreso')]
    public function ingresopdf(): Response
    {
        $ingresos=$this->getDoctrine()->getRepository(Ingreso::class)->lista();
        $fechas = new \DateTime();

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        
        $pdfOptions->set('defaultFont', 'Arial');
        // Instantiate Dompdf with our options
        
        $dompdf = new Dompdf($pdfOptions);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('pdf/ingresos.html.twig', [
            'ingresos' => $ingresos,
            'fechas' => $fechas
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('letter', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
        
        exit(0);
    }

    #[Route('/pdfingresomen', name: 'pdf_ingresomen')]
    public function ingresomenpdf(): Response
    {
        $ingresos=$this->getDoctrine()->getRepository(Ingreso::class)->listamen();
        $fechas = new \DateTime();

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        
        $pdfOptions->set('defaultFont', 'Arial');
        // Instantiate Dompdf with our options
        
        $dompdf = new Dompdf($pdfOptions);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('pdf/ingresosmen.html.twig', [
            'ingresos' => $ingresos,
            'fechas' => $fechas
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('letter', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
        
        exit(0);
    }  


    #[Route('/pdfingresosem', name: 'pdf_ingresosem')]
    public function ingresosempdf(): Response
    {
        $ingresos=$this->getDoctrine()->getRepository(Ingreso::class)->listasem();
        $fechas = new \DateTime();
        $f_sem = new \DateTime('-15 days');

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        
        $pdfOptions->set('defaultFont', 'Arial');
        // Instantiate Dompdf with our options
        
        $dompdf = new Dompdf($pdfOptions);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('pdf/ingresossem.html.twig', [
            'ingresos' => $ingresos,
            'fechas' => $fechas,
            'f_sem' => $f_sem
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('letter', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
        
        exit(0);
    }  


    #[Route('/pdfventa', name: 'pdf_venta')]
    public function ventapdf(): Response
    {
        $ventas=$this->getDoctrine()->getRepository(Venta::class)->lista();
        $fechas = new \DateTime();

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        
        $pdfOptions->set('defaultFont', 'Arial');
        // Instantiate Dompdf with our options
        
        $dompdf = new Dompdf($pdfOptions);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('pdf/ventas.html.twig', [
            'ventas' => $ventas,
            'fechas' => $fechas
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('letter', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
        
        exit(0);
    }

    #[Route('/pdfventamen', name: 'pdf_ventamen')]
    public function ventamenpdf(): Response
    {
        $ventas=$this->getDoctrine()->getRepository(Venta::class)->listamen();
        $fechas = new \DateTime();

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        
        $pdfOptions->set('defaultFont', 'Arial');
        // Instantiate Dompdf with our options
        
        $dompdf = new Dompdf($pdfOptions);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('pdf/ventasmen.html.twig', [
            'ventas' => $ventas,
            'fechas' => $fechas
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('letter', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
        
        exit(0);
    }

    #[Route('/pdfventasem', name: 'pdf_ventasem')]
    public function ventasempdf(): Response
    {
        $ventas=$this->getDoctrine()->getRepository(Venta::class)->listasem();
        $fechas = new \DateTime();
        $f_sem = new \DateTime('-15 days');

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        
        $pdfOptions->set('defaultFont', 'Arial');
        // Instantiate Dompdf with our options
        
        $dompdf = new Dompdf($pdfOptions);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('pdf/ventassem.html.twig', [
            'ventas' => $ventas,
            'fechas' => $fechas,
            'f_sem' => $f_sem
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('letter', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
        
        exit(0);
    }

    #[Route('/pdfmasventa', name: 'pdf_masventa')]
    public function masventapdf(): Response
    {
        $articulos=$this->getDoctrine()->getRepository(Articulo::class)->masventa();
        $fechas = new \DateTime();

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        
        $pdfOptions->set('defaultFont', 'Arial');
        // Instantiate Dompdf with our options
        
        $dompdf = new Dompdf($pdfOptions);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('pdf/ventasmas.html.twig', [
            'articulos' => $articulos,
            'fechas' => $fechas,
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('letter', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
        
        exit(0);
    }

    #[Route('/pdfigven', name: 'pdf_igven', methods: ['GET'])]
    public function igvenpdf(Request $request): Response
    {
        $f_inicio=$request->query->get('f_inicio');
        $f_fin=$request->query->get('f_fin');
        $ingven=$request->query->get('ingven');

        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($pdfOptions);

        $fechas = new \DateTime();

        if($ingven=="ingreso")
        {
            $var=$this->getDoctrine()->getRepository(Ingreso::class)->listafecha($f_inicio, $f_fin);
            $html = $this->renderView('pdf/inven.html.twig', [
                'var' => $var,
                'f_inicio' => $f_inicio,
                'f_fin' => $f_fin,
                'fechas' => $fechas,
                'ingven' => $ingven,
            ]);
        }
        else
        {
            $var=$this->getDoctrine()->getRepository(Venta::class)->listafecha($f_inicio, $f_fin);
            $html = $this->renderView('pdf/inven.html.twig', [
                'var' => $var,
                'f_inicio' => $f_inicio,
                'f_fin' => $f_fin,
                'fechas' => $fechas,
                'ingven' => $ingven,
            ]);
        }

        $dompdf->loadHtml($html);
        
        $dompdf->setPaper('letter', 'landscape');

        $dompdf->render();

        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
        
        exit(0);
    }

    #[Route('/pdfcliente', name: 'pdf_cliente')]
    public function clientepdf(): Response
    {
        $ventas=$this->getDoctrine()->getRepository(Venta::class)->clientemas();
        $fechas = new \DateTime();

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        
        $pdfOptions->set('defaultFont', 'Arial');
        // Instantiate Dompdf with our options
        
        $dompdf = new Dompdf($pdfOptions);
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('pdf/cliente.html.twig', [
            'ventas' => $ventas,
            'fechas' => $fechas
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('letter', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
        
        exit(0);
    }

}
