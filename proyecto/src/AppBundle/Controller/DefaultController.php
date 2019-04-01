<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Producto;
use AppBundle\Entity\Users;
use AppBundle\Form\ProductoType;
use AppBundle\Form\UsersType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Producto::class);
        $productos = $repository->findAll();

        return $this->render('main/listado.html.twig', array('productos' => $productos));
    }

    /**
     * @Route("/detalle/{id}", name="detalle")
     */
    public function detailAction(Request $request)
    {
        $id = $request->get('id');
        $repository = $this->getDoctrine()->getRepository(Producto::class);
        $usuario = $repository->findOneById($id);

        return $this->render('main/detail.html.twig', array('producto' => $usuario));
    }

    /**
     * @Route("/create/", name="create")
     */
    public function createAction(Request $request)
    {
        $producto = new Producto();
        $form = $this->createForm(ProductoType::class, $producto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $producto = $form->getData();

            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($producto);
            $em->flush();

            /*return $this->redirectToRoute('producto', array('id' =>$producto->getId()));*/
            return $this->redirectToRoute('homepage');
        }

        return $this->render('main/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/update/{id}", name="update")
     */
    public function updateAction(Request $request)
    {
        $id = $request->get('id');
        $repository = $this->getDoctrine()->getRepository(Users::class);
        $usuario = $repository->findOneById($id);
        $form = $this->createForm(UsersType::class, $usuario);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getEntityManager();

        if (!$usuario) {
            throw $this->createNotFoundException(
                'No user found for id '.$id
            );
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $usuarioForm = $form->getData();

            if (!empty($usuarioForm->getNombre()) && $usuarioForm->getNombre() !== $usuario->getNombre()) {
                $usuario->setNombre($usuarioForm->getNombre());
            }
            if (!empty($usuarioForm->getApellido1()) && $usuarioForm->getApellido1() !== $usuario->getApellido1()) {
                $usuario->setApellido1($usuarioForm->getApellido1());
            }
            if (!empty($usuarioForm->getApellido2()) && $usuarioForm->getApellido2() !== $usuario->getApellido2()) {
                $usuario->setApellido2($usuarioForm->getApellido2());
            }
            if (!empty($usuarioForm->getUsername()) && $usuarioForm->getUsername() !== $usuario->getUsername()) {
                $usuario->setUsername($usuarioForm->getUsername());
            }
            if (!empty($usuarioForm->getContrasenya()) && $usuarioForm->getContrasenya() !== $usuario->getContrasenya()) {
                $usuario->setContrasenya($usuarioForm->getContrasenya());
            }
            if (!empty($usuarioForm->getEmail()) && $usuarioForm->getEmail() !== $usuario->getEmail()) {
                $usuario->setEmail($usuarioForm->getEmail());
            }
            if (!empty($usuarioForm->getTelefono()) && $usuarioForm->getTelefono() !== $usuario->getTelefono()) {
                $usuario->setTelefono($usuarioForm->getTelefono());
            }
            $em->flush();

            return $this->redirectToRoute('detalle', array('id' => $id));
        }

        return $this->render('main/update.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $this->getDoctrine()->getRepository(Users::class);
        $usuario = $repository->findOneById($id);

        if (!$usuario) {
            throw $this->createNotFoundException(
                'No user found for id '.$id
            );
        }

        $em->remove($usuario);
        $em->flush();

        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/register/", name="register")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) build the form
        $user = new Users();
        $form = $this->createForm(UsersType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // 3b) Username = email
            //$user->setUsername($user->getEmail());

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('homepage');
        }

        return $this->render(
            'login/register.html.twig',
            array('form' => $form->createView())
        );
    }


    /***********************
     **funciones de prueba**
     ***********************/

    /**
     * @Route("/productos/", name="productos")
     */
    public function productosAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Producto::class);
        $products = $repository->findAll();
        return $this->render('pruebas/pruebas.html.twig', array('productos' => $products));
    }

    /**
     * @Route("/producto/", name="producto")
     */
    public function productoNuevoAction(Request $request)
    {
        $producto = new Producto();
        $form = $this->createForm(ProductoType::class, $producto);
        $form->handleRequest($request);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $producto = $form->getData();

            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($producto);
            $em->flush();

            /*return $this->redirectToRoute('producto', array('id' =>$producto->getId()));*/
            return $this->redirectToRoute('productos');
        }

        return $this->render('pruebas/productoNuevo.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/user/{user}", name="user")
     */
    public function userAction(Request $request, $user = null)
    {
        return new Response(
            '<html><body>Usuario: ' . $user . '</body></html>'
        );
    }
}
