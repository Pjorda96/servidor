<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Evento;
use AppBundle\Form\EventoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Evento controller.
 *
 * @Route("evento")
 */
class EventoController extends Controller
{
    /**
     * Lists all evento entities.
     *
     * @Route("/", name="evento_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $eventos = $em->getRepository(Evento::class)->findByActivo(1);

        return $this->render('evento/index.html.twig', array(
            'eventos' => $eventos,
        ));
    }

    /**
     * Creates a new evento entity.
     *
     * @Route("/new", name="evento_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $evento = new Evento();
        $form = $this->createForm(EventoType::class, $evento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($evento);
            $em->flush();

            return $this->redirectToRoute('evento_show', array('id' => $evento->getId()));
        }

        return $this->render('evento/new.html.twig', array(
            'evento' => $evento,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a evento entity.
     *
     * @Route("/{id}", name="evento_show")
     * @Method("GET")
     */
    public function showAction(Evento $evento)
    {
        $deleteForm = $this->createDeleteForm($evento);

        return $this->render('evento/show.html.twig', array(
            'evento' => $evento,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing evento entity.
     *
     * @Route("/{id}/edit", name="evento_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Evento $evento)
    {
        $deleteForm = $this->createDeleteForm($evento);
        $editForm = $this->createForm(EventoType::class, $evento);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evento_edit', array('id' => $evento->getId()));
        }

        return $this->render('evento/edit.html.twig', array(
            'evento' => $evento,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a evento entity.
     *
     * @Route("/{id}", name="evento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Evento $evento)
    {
        $form = $this->createDeleteForm($evento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($evento);
            $em->flush();
        }

        return $this->redirectToRoute('evento_index');
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    /**
     * Creates a form to delete a evento entity.
     *
     * @param Evento $evento The evento entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Evento $evento)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evento_delete', array('id' => $evento->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
