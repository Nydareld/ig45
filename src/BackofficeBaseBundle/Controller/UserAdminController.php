<?php

namespace BackofficeBaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserAdminController extends Controller
{
    public function userListAction()
    {
        $users = $this->get('fos_user.user_manager')->findUsers();
        return $this->render('BackofficeBaseBundle:User:userList.html.twig',array('users' => $users ));
    }

}
