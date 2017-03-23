<?php

namespace AgendaBundle\DataFixtures\ORM;

use AgendaBundle\Entity\Evenement;
use AgendaBundle\Entity\Lieux;
use AgendaBundle\Entity\Status;
use AgendaBundle\Entity\Type_intervention;
use AgendaBundle\Entity\Type_lieu;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Date;
use UserBundle\Entity\User;
use UserBundle\Entity\Group;

class LoadData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $grpUser = new Group('Membre');
        $grpUser->addRole('ROLE_USER');
        $grpUser->setDescription('Membre d\'integeneration 45, peut consulter l\'agenda, prendre part aux evenements ou adminisrtrer les evenements dont il est l\'adjoint');
        $manager->persist($grpUser);

        $grpCoress = new Group('Coresspondant');
        $grpCoress->addRole('ROLE_CORESSPONDANT');
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


        $user = new User();
        $user->addGroup($grpUser);
        $user->setNom("dupont");
        $user->setEmail("test@test.Fr");
        $user->setPrenom("Roger");
        $user->setPlainPassword("roger");

        $manager->persist($user);

        $user1 = new User();
        $user1->addGroup($grpUser);
        $user1->setNom("duport");
        $user1->setEmail("leporc@cbon.fr");
        $user1->setPrenom("peguy");
        $user1->setPlainPassword("peguy");

        $manager->persist($user1);

        $user2 = new User();
        $user2->addGroup($grpUser);
        $user2->setNom("neau");
        $user2->setEmail("francois@sodomite.fr");
        $user2->setPrenom("francois");
        $user2->setPlainPassword("francois");

        $manager->persist($user2);

        $user3 = new User();
        $user3->addGroup($grpUser);
        $user3->setNom("franconi");
        $user3->setEmail("florian@doudou.Fr");
        $user3->setPrenom("floriant");
        $user3->setPlainPassword("floriant");

        $manager->persist($user3);

        $user4 = new User();
        $user4->addGroup($grpUser);
        $user4->setNom("Lubinou");
        $user4->setEmail("sboubinator@lubi.fr");
        $user4->setPrenom("sboubinator");
        $user4->setPlainPassword("sboubinator");

        $manager->persist($user4);

        $user5 = new User();
        $user5->addGroup($grpUser);
        $user5->setNom("chef");
        $user5->setEmail("chef@chef.fr");
        $user5->setPrenom("chef");
        $user5->setPlainPassword("chef");

        $manager->persist($user5);

        $status = new Status();
        $status->setDescription("Annuler");

        $manager->persist($status);

        $status2 = new Status();
        $status2->setDescription("En cour");

        $manager->persist($status2);

        $type_lieu = new Type_lieu();
        $type_lieu->setNom("ecole maternelle");

        $manager->persist($type_lieu);

        $type_lieu2 = new Type_lieu();
        $type_lieu2->setNom("fistiniere");

        $manager->persist($type_lieu2);

        $type_lieu3 = new Type_lieu();
        $type_lieu3->setNom("mére à françois");

        $manager->persist($type_lieu3);

        $typeIntervention = new Type_intervention();
        $typeIntervention -> setNom("Atelier CV");
        $manager -> persist($typeIntervention);

        $typeIntervention2 = new Type_intervention();
        $typeIntervention2 -> setNom("Formation entretien école ingénieurs");
        $manager -> persist($typeIntervention2);

        $typeIntervention3 = new Type_intervention();
        $typeIntervention3 -> setNom("Présentation entretien");
        $manager -> persist($typeIntervention3);

        $typeIntervention4 = new Type_intervention();
        $typeIntervention4 -> setNom("Intervention number 4 moder fucker");
        $manager -> persist($typeIntervention4);

        $lieu = new Lieux();
        $lieu->setNom("Ecole Louis de Funes");
        $lieu->setAdresse("12 rue de labas");
        $lieu->setCodePostal("32000");
        $lieu->setVille("Orléans");
        $lieu->setCorrespondants($user);
        $lieu->setType($type_lieu);
        $lieu->addAdjoint($user2);

        $manager->persist($lieu);

        $lieu2 = new Lieux();
        $lieu2->setNom("Ecole Elton john");
        $lieu2->setAdresse("1bis rue d'ici");
        $lieu2->setCodePostal("85000");
        $lieu2->setVille("Lyon");
        $lieu2->setCorrespondants($user3);
        $lieu2->setType($type_lieu2);
        $lieu2->addAdjoint($user);

        $manager->persist($lieu2);

        $lieu3 = new Lieux();
        $lieu3->setNom("Lycée des paquerette");
        $lieu3->setAdresse("85 rue du jardin");
        $lieu3->setCodePostal("50000");
        $lieu3->setVille("Tee shirt");
        $lieu3->setCorrespondants($user5);
        $lieu3->setType($type_lieu3);
        $lieu3->addAdjoint($user4);

        $manager->persist($lieu3);

        $evenement = new Evenement();
        $evenement -> setDescription("Pool party au Lion's club, on va tout déchirer");
        $evenement -> setDateEvt(new \DateTime("2017-02-14"));
        $evenement -> setHeureDebut(new \DateTime("14:00"));
        $evenement -> setHeureFin(new \DateTime("18:00"));
        $evenement -> setNbParticipants(2);
        $evenement -> setNbObservateurs(2);
        $evenement -> setNiveauIntervention("Niveau à bulle");
        $evenement -> setTypeIntervention($typeIntervention);
        $evenement -> setLieu($lieu);
        $evenement -> setStatut($status);
        $evenement -> addIntervenant($user);
        $evenement -> addIntervenant($user3);
        $evenement -> addObservateur($user2);
        $manager -> persist($evenement);

        $evenement2 = new Evenement();
        $evenement2 -> setDescription("Sensibilisation sur la façon de se tenir en entretien");
        $evenement2 -> setDateEvt(new \DateTime("2017-04-14"));
        $evenement2 -> setHeureDebut(new \DateTime("14:00"));
        $evenement2 -> setHeureFin(new \DateTime("18:00"));
        $evenement2 -> setNbParticipants(1);
        $evenement2 -> setNbObservateurs(2);
        $evenement2 -> setNiveauIntervention("Licence");
        $evenement2 -> setTypeIntervention($typeIntervention3);
        $evenement2 -> setLieu($lieu2);
        $evenement2 -> setStatut($status);
        $evenement2 -> addIntervenant($user2);
        $manager -> persist($evenement2);

        $evenement3 = new Evenement();
        $evenement3 -> setDescription("Comment sodomiser un homme en 3 étapes");
        $evenement3 -> setDateEvt(new \DateTime("2017-07-18"));
        $evenement3 -> setHeureDebut(new \DateTime("10:00"));
        $evenement3 -> setHeureFin(new \DateTime("12:00"));
        $evenement3 -> setNbParticipants(3);
        $evenement3 -> setNbObservateurs(2);
        $evenement3 -> setNiveauIntervention("CP");
        $evenement3 -> setTypeIntervention($typeIntervention2);
        $evenement3 -> setLieu($lieu3);
        $evenement3 -> setStatut($status);
        $evenement3 -> addIntervenant($user2);
        $evenement3 -> addIntervenant($user);
        $evenement3 -> addIntervenant($user3);
        $evenement3 -> addObservateur($user4);
        $manager -> persist($evenement3);

        $evenement4 = new Evenement();
        $evenement4 -> setDescription("Intervention devant une classe de terminale");
        $evenement4 -> setDateEvt(new \DateTime("2017-10-01"));
        $evenement4 -> setHeureDebut(new \DateTime("14:00"));
        $evenement4 -> setHeureFin(new \DateTime("18:00"));
        $evenement4 -> setNbParticipants(2);
        $evenement4 -> setNbObservateurs(2);
        $evenement4 -> setNiveauIntervention("Niveau à bulle");
        $evenement4 -> setTypeIntervention($typeIntervention3);
        $evenement4 -> setLieu($lieu3);
        $evenement4 -> setStatut($status);
        $evenement4 -> addIntervenant($user4);
        $evenement4 -> addIntervenant($user2);
        $evenement4 -> addObservateur($user);
        $manager -> persist($evenement4);

        $evenement5 = new Evenement();
        $evenement5 -> setDescription("Essayer d'intégrer Yoann dans le projet");
        $evenement5 -> setDateEvt(new \DateTime("2017-03-20"));
        $evenement5 -> setHeureDebut(new \DateTime("08:00"));
        $evenement5 -> setHeureFin(new \DateTime("18:00"));
        $evenement5 -> setNbParticipants(3);
        $evenement5 -> setNbObservateurs(2);
        $evenement5 -> setNiveauIntervention("Ultimate de WoW");
        $evenement5 -> setTypeIntervention($typeIntervention2);
        $evenement5 -> setLieu($lieu);
        $evenement5 -> setStatut($status);
        $evenement5 -> addIntervenant($user4);
        $evenement5 -> addIntervenant($user2);
        $evenement5 -> addIntervenant($user3);
        $evenement5 -> addObservateur($user);
        $manager -> persist($evenement5);

        $manager->flush();
    }
}
