<?php

namespace BackofficeBaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserAdminController extends Controller
{
    public function userListAction()
    {
        return $this->render('BackofficeBaseBundle:User:index.html.twig');
    }

}
