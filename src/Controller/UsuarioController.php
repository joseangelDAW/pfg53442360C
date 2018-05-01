<?php

namespace App\Controller;

use App\Domain\Model\Entity\User;
use App\Infrastructure\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


///**
// * @Route("/usuario")
// */
class UsuarioController extends Controller
{
//    /**
//     * @Route("/", name="usuario_index", methods="GET")
//     */
//    public function index(UserRepository $usuarioRepository): Response
//    {
//        return $this->render('usuario/index.html.twig', ['usuarios' => $usuarioRepository->findAll()]);
//    }
//
//    /**
//     * @Route("/new", name="usuario_new", methods="GET|POST")
//     */
//    public function new(Request $request): Response
//    {
//        $usuario = new User();
//        $form = $this->createForm(UserType::class, $usuario);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($usuario);
//            $em->flush();
//
//            return $this->redirectToRoute('usuario_index');
//        }
//
//        return $this->render('usuario/new.html.twig', [
//            'usuario' => $usuario,
//            'form' => $form->createView(),
//        ]);
//    }
//
//    /**
//     * @Route("/{id}", name="usuario_show", methods="GET")
//     */
//    public function show(User $usuario): Response
//    {
//        return $this->render('usuario/show.html.twig', ['usuario' => $usuario]);
//    }
//
//    /**
//     * @Route("/{id}/edit", name="usuario_edit", methods="GET|POST")
//     */
//    public function edit(Request $request, User $usuario): Response
//    {
//        $form = $this->createForm(UserType::class, $usuario);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $this->getDoctrine()->getManager()->flush();
//
//            return $this->redirectToRoute('usuario_edit', ['id' => $usuario->getId()]);
//        }
//
//        return $this->render('usuario/edit.html.twig', [
//            'usuario' => $usuario,
//            'form' => $form->createView(),
//        ]);
//    }
//
//    /**
//     * @Route("/{id}", name="usuario_delete", methods="DELETE")
//     */
//    public function delete(Request $request, User $usuario): Response
//    {
//        if ($this->isCsrfTokenValid('delete'.$usuario->getId(), $request->request->get('_token'))) {
//            $em = $this->getDoctrine()->getManager();
//            $em->remove($usuario);
//            $em->flush();
//        }
//
//        return $this->redirectToRoute('usuario_index');
//    }
}
