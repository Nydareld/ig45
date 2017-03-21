<?php

namespace BackofficeBaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use UserBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;

class UserAdminController extends Controller
{
    /**
     * Controller de la liste des utilisateurs,
     * Permet de lister les utilisateurs, d'ajouter un utilisateur
     * et d'avoir quelques informations de base sur les utilisateurs
     * @method userListAction
     * @return [type]         [description]
     */
    public function userListAction(Request $request)
    {

        $userManager = $this->get('fos_user.user_manager');

        $user = $userManager->createUser();
        $user->setEnabled(true);

        $form = $this->createForm( UserType::class , $user);
        $form->setData($user);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                if($this->getDoctrine()->getManager()->getRepository('UserBundle:User')->findOneBy(array('email' => $user->getEmail() ))){
                    $request->getSession()
                        ->getFlashBag()
                        ->add('danger', "l'email existe deja pour un autre utilisateur");
                }else{
                    $userManager->updateUser($user);
                    $user->setUsername($user->getUsernameCanonical());
                    $request->getSession()
                    ->getFlashBag()
                    ->add('success', "l'utilisateur a bien été créé, il peut se connecter avec le nom d'utilisateur \"".$user->getUsernameCanonical()."\" et le mot de passe que vous lui avez attribué");
                }
            }
        }

        $users = $this->get('fos_user.user_manager')->findUsers();

        return $this->render('BackofficeBaseBundle:User:userList.html.twig',array(
            'users' => $users,
            'form' => $form->createView()
        ));
    }

}
