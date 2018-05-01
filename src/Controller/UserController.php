<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 1/05/18
 * Time: 10:03
 */

namespace App\Controller;

use App\Domain\Model\Entity\User;
use App\Infrastructure\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function insertUser(string $name, string $apellidos, \Datetime $fechaNacimiento, string $nickName, string $email, string $password)
    {
        //$fechaNacimiento = $fechaNacimiento->format('d-m-Y');
        $userRepository = $this->getDoctrine()->getRepository(User::class);
        $user = $userRepository->insertUser($name, $apellidos, $fechaNacimiento, $nickName, $email, $password);
        $userRepository->persistAndFlush($user);

        return $this->json(['Nombre' => $name,
            'Time' => $fechaNacimiento]);
    }

    public function formInsertUser(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $user->setName($data->getName());
            $user->setApellidos($data->getApellidos());
            $user->setFechaNacimiento($data->getFechaNacimiento());
            $user->setNickname($data->getNickName());
            $user->setEmail($data->getEmail());
            $user->setPassword(password_hash($data->getPassword(), PASSWORD_DEFAULT));

            $this->getDoctrine()->getRepository(User::class)->persistAndFlush($user);

            return $this->redirectToRoute('success');
        }

        return $this->render(
            'usuario/insertUser.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    public function success()
    {
        return $this->json([
            'success' => 'Los datos del formulario se han introducido con exito'
        ]);
    }
}