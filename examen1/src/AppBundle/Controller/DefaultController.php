<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\VIP;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $usuarios = $this->getDoctrine()
            ->getRepository(VIP::class)
            ->findAll();

        if (!$usuarios) {
            throw $this->createNotFoundException(
                'No users found.'
            );
        }

        return $this->render('default/index.html.twig', array('usuarios' => $usuarios));
    }

    /**
     * @Route("/detalle/{id}", name="detalle")
     */
    public function detailAction(Request $request, $id)
    {
        $usuario = $this->getDoctrine()
            ->getRepository(VIP::class)
            ->findOneById($id);

        if (!$usuario) {
            throw $this->createNotFoundException(
                'No users found for id '.$id
            );
        }

        return $this->render('default/detalle.html.twig', array('usuario' => $usuario));
    }
}
