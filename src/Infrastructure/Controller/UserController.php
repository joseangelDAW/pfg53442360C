<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 1/05/18
 * Time: 10:03
 */

namespace App\Infrastructure\Controller;

use App\Application\User\InsertUser\InsertUser;
use App\Application\User\InsertUser\InsertUserCommand;
use App\Application\User\ListUser\ListUser;
use App\Application\User\ListUser\ListUserCommand;
use App\Infrastructure\Form\User\UserClass;
use App\Infrastructure\Form\User\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @param InsertUser $insertUser
     * @return Response
     * @throws \Assert\AssertionFailedException
     */
    public function insertUser(Request $request, InsertUser $insertUser)
    {
        $user = new UserClass();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

        $output = $insertUser->handle(
            new InsertUserCommand(
                $user->getName(),
                $user->getSurname(),
                $user->getBirthDate(),
                $user->getNickname(),
                $user->getEmail(),
                $user->getPassword()
            )
        );

        return $this->json([$output]);
//            return $this->redirectToRoute(
//                'success',
//                [
//                    'name' => $user->getName(),
//                    'fecha_nacimiento' => $user->getBirthDate()->format('Y-m-d')
//                ]
//            );
        }

        return $this->render(
            'user/insertUser.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    public function listUser(ListUser $listUser)
    {
        $output = $listUser->handle(new ListUserCommand());
        return $this->json($output);
    }

    /* Implementar */
    public function updateUser ()
    {

    }

    /**
     * @param $name
     * @param $fecha_nacimiento
     * @return Response
     */
    public function success($name, $fecha_nacimiento)
    {
        return $this->json([
            'success' => 'Los datos del formulario se han introducido con exito',
            'nombre' => $name,
            'facha_nacimiento' => $fecha_nacimiento,
        ]);
    }

}