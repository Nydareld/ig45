<?php

namespace BackofficeBaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use UserBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;

class GroupAdminController extends Controller
{
    /**
     * Controller de la liste des groups,
     * @method groupListAction
     * @return [type]         [description]
     */
    public function groupListAction(Request $request)
    {
        $groups = $this->get('fos_user.group_manager')->findGroups();

        return $this->render('BackofficeBaseBundle:Groups:groupList.html.twig',array(
            'groups' => $groups
        ));

    }


}
