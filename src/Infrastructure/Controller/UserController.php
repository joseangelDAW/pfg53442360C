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
use App\Application\User\ListUserByKey\ListUserByKey;
use App\Application\User\ListUserByKey\ListUserByKeyCommand;
use App\Application\User\UpdateUser\UpdateUser;
use App\Application\User\UpdateUser\UpdateUserCommand;
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
        }

        return $this->render(
            'user/insertUser.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @param ListUser $listUser
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function listUser(ListUser $listUser)
    {
        $output = $listUser->handle(new ListUserCommand());
        return $this->json($output);
    }

    /**
     * @param Request $request
     * @param UpdateUser $updateUser
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @throws \Assert\AssertionFailedException
     */
    public function updateUser (Request $request, UpdateUser $updateUser)
    {
        $arrayRequest = array(json_decode($request->getContent()));
        $item = [];

        foreach ($arrayRequest[0] as $key => $value) {
            $item[$key] = $value;
        }

        $output = $updateUser->handle(
            new UpdateUserCommand(
                $item['id'],
                $item['name'],
                $item['surname'],
                $item['nickName'],
                $item['email']
            )
        );

        return $this->json(
            [
                $output
            ]
        );
    }

    /**
     * @param string $key
     * @param string $value
     * @param ListUserByKey $listUserByKey
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @throws \Assert\AssertionFailedException
     */
    public function listUserByKey(string $key, string $value, ListUserByKey $listUserByKey)
    {
        $output = $listUserByKey->handle(
            new ListUserByKeyCommand($key, $value));

        return $this->json([$output]);
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