<?php

namespace BackofficeBaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use UserBundle\Form\GroupType;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Group;

class GroupAdminController extends Controller
{
    /**
     * Controller de la liste des groups,
     * @method groupListAction
     * @return [type]         [description]
     */
    public function groupListAction(Request $request)
    {
        $groupManager = $this->get('fos_user.group_manager');
        $group = $groupManager->createGroup('');

        $form = $this->createForm( GroupType::class , $group);
        $form->setData($group);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $groupManager->updateGroup($group);
                $request->getSession()
                ->getFlashBag()
                ->add('success', "le groupe a bien été créé");
            }
        }

        $groups = $this->get('fos_user.group_manager')->findGroups();

        return $this->render('BackofficeBaseBundle:Groups:groupList.html.twig',array(
            'groups' => $groups,
            'form' => $form->createView()
        ));

    }


}
