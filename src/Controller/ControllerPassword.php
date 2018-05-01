<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ControllerPassword extends Controller
{
    public function generateHashPass($pass)
    {
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

        if (password_verify('0932lavieja', $hashedPass)) {
            $result = 'Contraseña correcta';
        } else { $result = 'Contraseña incorrecta';}

        return new Response(
            '<html><body>Hash: '.$result.'</body></html>'
        );
    }
}