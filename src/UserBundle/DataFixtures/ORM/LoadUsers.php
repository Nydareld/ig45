<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Date;
use UserBundle\Entity\User;
use UserBundle\Entity\Group;

class LoadUsers implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $grpUser = new Group('Membre');
        $grpUser->addRole('ROLE_USER');
        $grpUser->setDescription('Membre d\'integeneration 45, peut consulter l\'agenda, prendre part aux evenements ou adminisrtrer les evenements dont il est l\'adjoint');
        $manager->persist($grpUser);

        $grpCoress = new Group('Coresspondant');
        $grpCoress->addRole('ROLE_CORRESPONDANT');
        $grpCoress->setDescription('Membre d\'integeneration 45 coresspondant d\'un etablissement, peut créer un evenement dans les etablissement avec lequel il coresspond');
        $manager->persist($grpCoress);

        $grpAdmin = new Group('Administrateur');
        $grpAdmin->addRole('ROLE_ADMIN');
        $grpAdmin->setDescription('Membre du bureau d\'integeneration 45. Peut adminisrtrer les etablissement et les utilisateurs');
        $manager->persist($grpAdmin);

        $grpSuperAdm = new Group('Super-administrateur');
        $grpSuperAdm->addRole('ROLE_SUPER_ADMIN');
        $grpSuperAdm->setDescription('Super utilisateur, à n\'utiliser qu\'en ca de probleme');
        $manager->persist($grpSuperAdm);

        $userUser = new User();
        $userUser->setNom("test");
        $userUser->setPrenom("user");
        $userUser->setPlainPassword("test");
        $userUser->addGroup($grpUser);
        $userUser->setEmail("testUser@test.Fr");
        $userUser->setEnabled(true);
        $manager->persist($userUser);

        $userCoress = new User();
        $userCoress->setNom("test");
        $userCoress->setPrenom("coress");
        $userCoress->setPlainPassword("test");
        $userCoress->addGroup($grpCoress);
        $userCoress->setEmail("testCoress@test.Fr");
        $userCoress->setEnabled(true);
        $manager->persist($userCoress);

        $userAdmin = new User();
        $userAdmin->setNom("test");
        $userAdmin->setPrenom("admin");
        $userAdmin->setPlainPassword("test");
        $userAdmin->addGroup($grpAdmin);
        $userAdmin->setEmail("testAdmin@test.Fr");
        $userAdmin->setEnabled(true);
        $manager->persist($userAdmin);

        $userSuperAdmin = new User();
        $userSuperAdmin->setNom("test");
        $userSuperAdmin->setPrenom("superadmin");
        $userSuperAdmin->setPlainPassword("test");
        $userSuperAdmin->addGroup($grpSuperAdm);
        $userSuperAdmin->setEmail("testSuperAdmin@test.Fr");
        $userSuperAdmin->setEnabled(true);
        $manager->persist($userSuperAdmin);

        $manager->flush();
    }
}
