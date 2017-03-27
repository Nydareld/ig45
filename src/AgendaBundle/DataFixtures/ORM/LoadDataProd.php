<?php

namespace AgendaBundle\DataFixtures\ORM;

use AgendaBundle\Entity\Evenement;
use AgendaBundle\Entity\Etablissement;
use AgendaBundle\Entity\TypeEvenement;
use AgendaBundle\Entity\Niveau;
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
        $grpUser->setDescription('Membre d\'integeneration 45, peut consulter l\'agenda, prendre part aux événements ou adminisrtrer les événements dont il est l\'adjoint');
        $manager->persist($grpUser);

        $grpCoress = new Group('Correspondant');
        $grpCoress->addRole('ROLE_CORRESPONDANT');
        $grpCoress->setDescription('Membre d\'integeneration 45 coresspondant d\'un établissement, peut créer un événement dans les établissements avec lequel il coresspond');
        $manager->persist($grpCoress);

        $grpAdmin = new Group('Administrateur');
        $grpAdmin->addRole('ROLE_ADMIN');
        $grpAdmin->setDescription('Membre du bureau d\'integeneration 45. Peut adminisrtrer les établissements et les utilisateurs');
        $manager->persist($grpAdmin);

        $grpSuperAdm = new Group('Super-administrateur');
        $grpSuperAdm->addRole('ROLE_SUPER_ADMIN');
        $grpSuperAdm->setDescription('Super utilisateur, à n\'utiliser qu\'en cas de problème');
        $manager->persist($grpSuperAdm);

        $userSuperAdmin = new User();
        $userSuperAdmin->setNom("SuperAdmin");
        $userSuperAdmin->setPrenom("SuperAdmin");
        $userSuperAdmin->setPlainPassword("superadmin1234");
        $userSuperAdmin->addGroup($grpSuperAdm);
        $userSuperAdmin->setEmail("super.admin@live.fr");
        $userSuperAdmin->setEnabled(true);
        $manager->persist($userSuperAdmin);


        $user = new User();
        $user->addGroup($grpUser);
        $user->setNom("de BOUDEMANGE");
        $user->setEmail("michel.deboudemange@live.fr");
        $user->setPrenom("Michel");
        $user->setPlainPassword("michel.deboudemange");
        $manager->persist($user);

        $user1 = new User();
        $user1->addGroup($grpUser);
        $user1->setNom("BROCHERIEUX");
        $user1->setEmail("jeandfranois.brocherieux@outlook.fr");
        $user1->setPrenom("Jean-François");
        $user1->setPlainPassword("jeanfrancois.brocherieux");
        $manager->persist($user1);

        $user2 = new User();
        $user2->addGroup($grpUser);
        $user2->setNom("LEGER");
        $user2->setEmail("gerard.leger@laposte.net");
        $user2->setPrenom("Gérard");
        $user2->setPlainPassword("gerard.leger");
        $manager->persist($user2);

        $user3 = new User();
        $user3->addGroup($grpUser);
        $user3->setNom("GARNIER");
        $user3->setEmail("laurence.garnier@gmail.com");
        $user3->setPrenom("Laurence");
        $user3->setPlainPassword("laurence.garnier");
        $manager->persist($user3);

        $user4 = new User();
        $user4->addGroup($grpUser);
        $user4->setNom("GROSSE");
        $user4->setEmail("regine.grosse@free.fr");
        $user4->setPrenom("Régine");
        $user4->setPlainPassword("regine.grosse");
        $manager->persist($user4);

        $user5 = new User();
        $user5->addGroup($grpUser);
        $user5->setNom("APPARICIO");
        $user5->setEmail("liliane.apparicio@free.com");
        $user5->setPrenom("Liliane");
        $user5->setPlainPassword("liliane.apparicio");
        $manager->persist($user5);

        $user6 = new User();
        $user6->addGroup($grpUser);
        $user6->setNom("NEDELEC");
        $user6->setEmail("jacqueline.nedelec@gmail.com");
        $user6->setPrenom("Jacqueline");
        $user6->setPlainPassword("jacqueline.nedelec");
        $manager->persist($user6);

        $user7 = new User();
        $user7->addGroup($grpUser);
        $user7->setNom("ESPINASSE");
        $user7->setEmail("michel.espinasse@laposte.com");
        $user7->setPrenom("Michel");
        $user7->setPlainPassword("michel.espinasse");
        $manager->persist($user7);

        $user8 = new User();
        $user8->addGroup($grpUser);
        $user8->setNom("VILLALBA");
        $user8->setEmail("christiane.villalba@laposte.com");
        $user8->setPrenom("Christiane");
        $user8->setPlainPassword("christiane.villalba");
        $manager->persist($user8);

        $user9 = new User();
        $user9->addGroup($grpUser);
        $user9->setNom("GIGOU");
        $user9->setEmail("robert.gigou@free.fr");
        $user9->setPrenom("Robert");
        $user9->setPlainPassword("robert.gigou");
        $manager->persist($user9);

        $user10 = new User();
        $user10->addGroup($grpUser);
        $user10->setNom("FINOUS");
        $user10->setEmail("francois.finous@free.fr");
        $user10->setPrenom("François");
        $user10->setPlainPassword("francois.finous");
        $manager->persist($user10);

        $user11 = new User();
        $user11->addGroup($grpUser);
        $user11->setNom("LIEY");
        $user11->setEmail("patrick.liey@free.fr");
        $user11->setPrenom("Patrick");
        $user11->setPlainPassword("patrick.liey");
        $manager->persist($user11);

        $user12 = new User();
        $user12->addGroup($grpUser);
        $user12->setNom("LEMARIE");
        $user12->setEmail("claude.lemarie@free.fr");
        $user12->setPrenom("Claude");
        $user12->setPlainPassword("claude.lemarie");
        $manager->persist($user12);

        $user13 = new User();
        $user13->addGroup($grpUser);
        $user13->setNom("SENELIER");
        $user13->setEmail("claudine.senelier@free.fr");
        $user13->setPrenom("Claudine");
        $user13->setPlainPassword("claudine.senelier");
        $manager->persist($user13);

        $user14 = new User();
        $user14->addGroup($grpUser);
        $user14->setNom("HARDOUIN");
        $user14->setEmail("marie-helene.hardouin@free.fr");
        $user14->setPrenom("Marie-Hélène");
        $user14->setPlainPassword("marie-helene.hardouin");
        $manager->persist($user14);

        $user15 = new User();
        $user15->addGroup($grpUser);
        $user15->setNom("SMEECKAERT");
        $user15->setEmail("patrick.smeeckaert@free.fr");
        $user15->setPrenom("Patrick");
        $user15->setPlainPassword("patrick.smeeckaert");
        $manager->persist($user15);

        $user16 = new User();
        $user16->addGroup($grpUser);
        $user16->setNom("AUBERGER");
        $user16->setEmail("pierre.auberger@free.fr");
        $user16->setPrenom("Pierre");
        $user16->setPlainPassword("pierre.auberger");
        $manager->persist($user16);

        $user17 = new User();
        $user17->addGroup($grpUser);
        $user17->setNom("MOULY");
        $user17->setEmail("francoise.mouly@free.fr");
        $user17->setPrenom("Françoise");
        $user17->setPlainPassword("francoise.mouly");
        $manager->persist($user17);

        $user18 = new User();
        $user18->addGroup($grpUser);
        $user18->setNom("BURETTE");
        $user18->setEmail("catherine.burette@free.fr");
        $user18->setPrenom("Catherine");
        $user18->setPlainPassword("catherine.burette");
        $manager->persist($user18);

        $user19 = new User();
        $user19->addGroup($grpUser);
        $user19->setNom("DUPRAT");
        $user19->setEmail("martine.duprat@free.fr");
        $user19->setPrenom("Martine");
        $user19->setPlainPassword("martine.duprat");
        $manager->persist($user19);

        $user20 = new User();
        $user20->addGroup($grpUser);
        $user20->setNom("LALISSE");
        $user20->setEmail("joseph.lalisse@free.fr");
        $user20->setPrenom("Joseph");
        $user20->setPlainPassword("joseph.lalisse");
        $manager->persist($user20);

        $user21 = new User();
        $user21->addGroup($grpUser);
        $user21->setNom("AMIOT");
        $user21->setEmail("philippe.amiot@free.fr");
        $user21->setPrenom("Philippe");
        $user21->setPlainPassword("philippe.amiot");
        $manager->persist($user21);

        $user22 = new User();
        $user22->addGroup($grpUser);
        $user22->setNom("COUDRAY");
        $user22->setEmail("jacques.coudray@free.fr");
        $user22->setPrenom("Jacques");
        $user22->setPlainPassword("jacques.coudray");
        $manager->persist($user22);

        $user23 = new User();
        $user23->addGroup($grpUser);
        $user23->setNom("KESTLER");
        $user23->setEmail("paul.kestler@free.fr");
        $user23->setPrenom("Paul");
        $user23->setPlainPassword("paul.kestler");
        $manager->persist($user23);

        $user24 = new User();
        $user24->addGroup($grpUser);
        $user24->setNom("HUGUET-TAHON");
        $user24->setEmail("martine.huguet-tahon@free.fr");
        $user24->setPrenom("Martine");
        $user24->setPlainPassword("martine.huguet-tahon");
        $manager->persist($user24);

        $user25 = new User();
        $user25->addGroup($grpUser);
        $user25->setNom("ARCHAMBAULT");
        $user25->setEmail("jean-francois.archambault@free.fr");
        $user25->setPrenom("Jean-François");
        $user25->setPlainPassword("jean-francois.archambault");
        $manager->persist($user25);

        $user26 = new User();
        $user26->addGroup($grpUser);
        $user26->setNom("GRASSET");
        $user26->setEmail("michel.grasset@free.fr");
        $user26->setPrenom("Michel");
        $user26->setPlainPassword("michel.grasset");
        $manager->persist($user26);

        $user27 = new User();
        $user27->addGroup($grpUser);
        $user27->setNom("BOULARD");
        $user27->setEmail("alain.boulard@free.fr");
        $user27->setPrenom("Alain");
        $user27->setPlainPassword("alain.boulard");
        $manager->persist($user27);

        $user28 = new User();
        $user28->addGroup($grpUser);
        $user28->setNom("RENAULD");
        $user28->setEmail("philippe.renaud@free.fr");
        $user28->setPrenom("Philippe");
        $user28->setPlainPassword("philippe.renaud");
        $manager->persist($user28);

        $user29 = new User();
        $user29->addGroup($grpUser);
        $user29->setNom("RAULIN");
        $user29->setEmail("andree.raulin@free.fr");
        $user29->setPrenom("Andrée");
        $user29->setPlainPassword("andree.raulin");
        $manager->persist($user29);

        $user29 = new User();
        $user29->addGroup($grpUser);
        $user29->setNom("PARICARD");
        $user29->setEmail("marc.paricard@free.fr");
        $user29->setPrenom("Marc");
        $user29->setPlainPassword("marc.paricard");
        $manager->persist($user29);

        $user30 = new User();
        $user30->addGroup($grpUser);
        $user30->setNom("PIQUEMAL");
        $user30->setEmail("pierre.piquemal@free.fr");
        $user30->setPrenom("Pierre");
        $user30->setPlainPassword("pierre.piquemal");
        $manager->persist($user30);

        $user31 = new User();
        $user31->addGroup($grpUser);
        $user31->setNom("BONNEAU");
        $user31->setEmail("philippe.bonneau@free.fr");
        $user31->setPrenom("Philippe");
        $user31->setPlainPassword("philippe.bonneau");
        $manager->persist($user31);

        $user32 = new User();
        $user32->addGroup($grpUser);
        $user32->setNom("PRIZAC");
        $user32->setEmail("christine.prizac@free.fr");
        $user32->setPrenom("Christine");
        $user32->setPlainPassword("christine.prizac");
        $manager->persist($user32);

        $user33 = new User();
        $user33->addGroup($grpUser);
        $user33->setNom("HUREAU");
        $user33->setEmail("chantal.hureau@free.fr");
        $user33->setPrenom("Chantal");
        $user33->setPlainPassword("chantal.hureau");
        $manager->persist($user33);

        $user34 = new User();
        $user34->addGroup($grpUser);
        $user34->setNom("GEORGET");
        $user34->setEmail("christian.georget@free.fr");
        $user34->setPrenom("Christian");
        $user34->setPlainPassword("christian.georget");
        $manager->persist($user34);

        $user35 = new User();
        $user35->addGroup($grpUser);
        $user35->setNom("DELIGNY");
        $user35->setEmail("andree.deligny@free.fr");
        $user35->setPrenom("Andrée");
        $user35->setPlainPassword("andree.deligny");
        $manager->persist($user35);

        $user36 = new User();
        $user36->addGroup($grpUser);
        $user36->setNom("LUPART");
        $user36->setEmail("michel.lupart@free.fr");
        $user36->setPrenom("Michel");
        $user36->setPlainPassword("michel.lupart");
        $manager->persist($user36);

        $user37 = new User();
        $user37->addGroup($grpUser);
        $user37->setNom("CORJON");
        $user37->setEmail("daniel.corjon@free.fr");
        $user37->setPrenom("Daniel");
        $user37->setPlainPassword("daniel.corjon");
        $manager->persist($user37);

        $txNiveau = new Niveau();
        $txNiveau->setNom('txNiveau');
        $manager->persist($txNiveau);

        $primaire = new Niveau();
        $primaire->setNom('Primaire');
        $manager->persist($primaire);

        $college = new Niveau();
        $college->setNom('Collège');
        $manager->persist($college);

        $lycee = new Niveau();
        $lycee->setNom('Lycée');
        $manager->persist($lycee);

        $superieur = new Niveau();
        $superieur->setNom('Supérieur');
        $manager->persist($superieur);

        $bureauAdministration = new Niveau();
        $bureauAdministration->setNom('bureauAdministration');
        $manager->persist($bureauAdministration);


        $typeEvenement = new TypeEvenement();
        $typeEvenement->setNom("Aide aux collégiens en décrochage");
        $typeEvenement->addNiveau($college);
        $manager->persist($typeEvenement);

        $typeEvenement2 = new TypeEvenement();
        $typeEvenement2->setNom("Aide aux élèves décrocheurs");
        $typeEvenement2->addNiveau($college);
        $manager->persist($typeEvenement2);

        $typeEvenement3 = new TypeEvenement();
        $typeEvenement3->setNom("Aide à la lecture");
        $typeEvenement3->addNiveau($lycee);
        $manager->persist($typeEvenement3);

        $typeEvenement4 = new TypeEvenement();
        $typeEvenement4->setNom("Aide à la rédaction de lettres de motivation et C.V");
        $typeEvenement4->addNiveau($lycee);
        $manager->persist($typeEvenement4);

        $typeEvenement5 = new TypeEvenement();
        $typeEvenement5->setNom("ARTP-FLE (Atelier de Remobilisation à Temps Plein à dominante Français Langue Etrangère");
        $typeEvenement5->addNiveau($lycee);
        $manager->persist($typeEvenement5);

        $typeEvenement6 = new TypeEvenement();
        $typeEvenement6->setNom("ARTP-FLE ateliers");
        $typeEvenement6->addNiveau($lycee);
        $manager->persist($typeEvenement6);

        $typeEvenement7 = new TypeEvenement();
        $typeEvenement7->setNom("ARTP-FLE présentations équipe IG45 et jeunes");
        $typeEvenement7->addNiveau($lycee);
        $manager->persist($typeEvenement7);

        $typeEvenement8 = new TypeEvenement();
        $typeEvenement8->setNom("ARTP-FLE Visite d Orléans");
        $typeEvenement8->addNiveau($lycee);
        $manager->persist($typeEvenement8);

        $typeEvenement9 = new TypeEvenement();
        $typeEvenement9->setNom("CFG blanc");
        $typeEvenement9->addNiveau($college);
        $manager->persist($typeEvenement9);

        $typeEvenement10 = new TypeEvenement();
        $typeEvenement10->setNom("Concours 'graine de boite'");
        $typeEvenement10->addNiveau($superieur);
        $manager->persist($typeEvenement10);

        $typeEvenement11 = new TypeEvenement();
        $typeEvenement11->setNom("Conduite en réunion");
        $typeEvenement11->addNiveau($superieur);
        $manager->persist($typeEvenement11);

        $typeEvenement12 = new TypeEvenement();
        $typeEvenement12->setNom("Conseils C.V. et lettre de motivation");
        $typeEvenement12->addNiveau($superieur);
        $manager->persist($typeEvenement12);

        $typeEvenement13 = new TypeEvenement();
        $typeEvenement13->setNom("Debriefing suite à retour de stage");
        $typeEvenement13->addNiveau($college);
        $manager->persist($typeEvenement13);

        $typeEvenement14 = new TypeEvenement();
        $typeEvenement14->setNom("Entretien oral sur dossiers professionnels");
        $typeEvenement14->addNiveau($lycee);
        $manager->persist($typeEvenement14);

        $typeEvenement15 = new TypeEvenement();
        $typeEvenement15->setNom("Entretien sur les rapports de stage des élèves de SEGPA");
        $typeEvenement15->addNiveau($college);
        $manager->persist($typeEvenement15);

        $typeEvenement16 = new TypeEvenement();
        $typeEvenement16->setNom("EPA (Entreprendre Pour Apprendre)");
        $typeEvenement16->addNiveau($college);
        $manager->persist($typeEvenement16);

        $typeEvenement17 = new TypeEvenement();
        $typeEvenement17->setNom("Epreuve orale suite au premier retour de stage, pour la classe de 3éme SEGPA");
        $typeEvenement17->addNiveau($college);
        $manager->persist($typeEvenement17);

        $typeEvenement18 = new TypeEvenement();
        $typeEvenement18->setNom("Fête de la Science : Préciser le site");
        $typeEvenement18->addNiveau($txNiveau);
        $manager->persist($typeEvenement18);

        $typeEvenement19 = new TypeEvenement();
        $typeEvenement19->setNom("Forum des métiers sous forme d\'ateliers");
        $typeEvenement19->addNiveau($college);
        $manager->persist($typeEvenement19);

        $typeEvenement20 = new TypeEvenement();
        $typeEvenement20->setNom("Forum des projets PIC");
        $typeEvenement20->addNiveau($superieur);
        $manager->persist($typeEvenement20);

        $typeEvenement21 = new TypeEvenement();
        $typeEvenement21->setNom("Graine de boite");
        $typeEvenement21->addNiveau($lycee);
        $manager->persist($typeEvenement21);

        $typeEvenement22 = new TypeEvenement();
        $typeEvenement22->setNom("l Atelier des Sciences  : L Eau");
        $typeEvenement22->addNiveau($primaire);
        $manager->persist($typeEvenement22);

        $typeEvenement23 = new TypeEvenement();
        $typeEvenement23->setNom("l Atelier des Sciences  : L Electricité");
        $typeEvenement23->addNiveau($primaire);
        $manager->persist($typeEvenement23);

        $typeEvenement24 = new TypeEvenement();
        $typeEvenement24->setNom("l Atelier des Sciences  : Le Vent");
        $typeEvenement24->addNiveau($primaire);
        $manager->persist($typeEvenement24);

        $typeEvenement25 = new TypeEvenement();
        $typeEvenement25->setNom("l Atelier des Sciences  : Les couleurs");
        $typeEvenement25->addNiveau($primaire);
        $manager->persist($typeEvenement25);

        $typeEvenement26 = new TypeEvenement();
        $typeEvenement26->setNom("l Atelier des Sciences  : Les fusées à eau");
        $typeEvenement26->addNiveau($primaire);
        $manager->persist($typeEvenement26);

        $typeEvenement27 = new TypeEvenement();
        $typeEvenement27->setNom("l Atelier des Sciences : L Astronomie");
        $typeEvenement27->addNiveau($primaire);
        $manager->persist($typeEvenement27);

        $typeEvenement28 = new TypeEvenement();
        $typeEvenement28->setNom("Management");
        $typeEvenement28->addNiveau($superieur);
        $manager->persist($typeEvenement28);

        $typeEvenement29 = new TypeEvenement();
        $typeEvenement29->setNom("Oraux blancs");
        $typeEvenement29->addNiveau($lycee);
        $manager->persist($typeEvenement29);

        $typeEvenement30 = new TypeEvenement();
        $typeEvenement30->setNom("Permanences InterGénérations");
        $typeEvenement30->addNiveau($txNiveau);
        $manager->persist($typeEvenement30);

        $typeEvenement31 = new TypeEvenement();
        $typeEvenement31->setNom("Préparation au départ en stage");
        $typeEvenement31->addNiveau($lycee);
        $manager->persist($typeEvenement31);

        $typeEvenement32 = new TypeEvenement();
        $typeEvenement32->setNom("Préparation au forum des projets");
        $typeEvenement32->addNiveau($superieur);
        $manager->persist($typeEvenement32);

        $typeEvenement33 = new TypeEvenement();
        $typeEvenement33->setNom("Préparation aux oraux des grandes écoles de commerce");
        $typeEvenement33->addNiveau($superieur);
        $manager->persist($typeEvenement33);

        $typeEvenement34 = new TypeEvenement();
        $typeEvenement34->setNom("Présentation de familles de métiers");
        $typeEvenement34->addNiveau($college);
        $manager->persist($typeEvenement34);

        $typeEvenement35 = new TypeEvenement();
        $typeEvenement35->setNom("Présentation de métiers par des entreprises du groupe artisanat IG45");
        $typeEvenement35->addNiveau($college);
        $manager->persist($typeEvenement35);

        $typeEvenement36 = new TypeEvenement();
        $typeEvenement36->setNom("Présentation des métiers / Forum des métiers");
        $typeEvenement36->addNiveau($college);
        $typeEvenement36->addNiveau($lycee);
        $manager->persist($typeEvenement36);

        $typeEvenement37 = new TypeEvenement();
        $typeEvenement37->setNom("Présentation du groupe IG45 et des enjeux de la simulation");
        $typeEvenement37->addNiveau($superieur);
        $manager->persist($typeEvenement37);

        $typeEvenement38 = new TypeEvenement();
        $typeEvenement38->setNom("Présentation orale du rapport de stage");
        $typeEvenement38->addNiveau($college);
        $manager->persist($typeEvenement38);

        $typeEvenement39 = new TypeEvenement();
        $typeEvenement39->setNom("Projet Perpective Post Bac");
        $typeEvenement39->addNiveau($lycee);
        $manager->persist($typeEvenement39);

        $typeEvenement40 = new TypeEvenement();
        $typeEvenement40->setNom("Projet Perspective Post-Bac (accompagner les élèves dans leur orientation)");
        $typeEvenement40->addNiveau($lycee);
        $manager->persist($typeEvenement40);

        $typeEvenement41 = new TypeEvenement();
        $typeEvenement41->setNom("Projets Personnels et Professionnels (PPP)");
        $typeEvenement41->addNiveau($superieur);
        $manager->persist($typeEvenement41);

        $typeEvenement42 = new TypeEvenement();
        $typeEvenement42->setNom("Remotivation et réflexion sur un projet pour élèves décrocheurs");
        $typeEvenement42->addNiveau($college);
        $manager->persist($typeEvenement42);

        $typeEvenement43 = new TypeEvenement();
        $typeEvenement43->setNom("Réunion \"Collèges\" à ...");
        $typeEvenement43->addNiveau($college);
        $manager->persist($typeEvenement43);

        $typeEvenement44 = new TypeEvenement();
        $typeEvenement44->setNom("Réunion avec l équipe pédagogique");
        $typeEvenement44->addNiveau($lycee);
        $manager->persist($typeEvenement44);

        $typeEvenement45 = new TypeEvenement();
        $typeEvenement45->setNom("Réunion de l équipe Atelier des Sciences");
        $typeEvenement45->addNiveau($lycee);
        $manager->persist($typeEvenement45);

        $typeEvenement46 = new TypeEvenement();
        $typeEvenement46->setNom("Réunion des correspondants et adjoints");
        $typeEvenement46->addNiveau($txNiveau);
        $manager->persist($typeEvenement46);

        $typeEvenement47 = new TypeEvenement();
        $typeEvenement47->setNom("Réunion mensuelle du groupe IG45");
        $typeEvenement47->addNiveau($txNiveau);
        $manager->persist($typeEvenement47);

        $typeEvenement48 = new TypeEvenement();
        $typeEvenement48->setNom("Salon régional EPA");
        $typeEvenement48->addNiveau($college);
        $manager->persist($typeEvenement48);

        $typeEvenement49 = new TypeEvenement();
        $typeEvenement49->setNom("Savoir se présenter par téléphone et en face à face dans le cadre de la recherche de stage");
        $typeEvenement49->addNiveau($lycee);
        $manager->persist($typeEvenement49);

        $typeEvenement50 = new TypeEvenement();
        $typeEvenement50->setNom("Secrétariat d examen");
        $typeEvenement50->addNiveau($superieur);
        $manager->persist($typeEvenement50);

        $typeEvenement51 = new TypeEvenement();
        $typeEvenement51->setNom("Simulation d entretien de stage et/ou d embauche à partir d une offre d emploi");
        $typeEvenement51->addNiveau($lycee);
        $manager->persist($typeEvenement51);

        $typeEvenement52 = new TypeEvenement();
        $typeEvenement52->setNom("Simulation d entretien en vue d\'une recherche d apprentissage");
        $typeEvenement52->addNiveau($superieur);
        $manager->persist($typeEvenement52);

        $typeEvenement53 = new TypeEvenement();
        $typeEvenement53->setNom("Simulation d entretien pour embauche suite à une annonce");
        $typeEvenement53->addNiveau($superieur);
        $manager->persist($typeEvenement53);

        $typeEvenement54 = new TypeEvenement();
        $typeEvenement54->setNom("Simulation d entretien pour poursuite d études");
        $typeEvenement54->addNiveau($superieur);
        $manager->persist($typeEvenement54);

        $typeEvenement55 = new TypeEvenement();
        $typeEvenement55->setNom("Simulation d entretien pour recherche d emploi pour des élèves se destinant à la poursuite d études en BTS par alternance");
        $typeEvenement55->addNiveau($lycee);
        $manager->persist($typeEvenement55);

        $typeEvenement56 = new TypeEvenement();
        $typeEvenement56->setNom("Simulation d entretien pour stage ou embauche");
        $typeEvenement56->addNiveau($superieur);
        $manager->persist($typeEvenement56);

        $typeEvenement57 = new TypeEvenement();
        $typeEvenement57->setNom("Simulation d entretiens (BTS-DUT...)");
        $typeEvenement57->addNiveau($superieur);
        $manager->persist($typeEvenement57);

        $typeEvenement58 = new TypeEvenement();
        $typeEvenement58->setNom("Simulation d entretiens (collège)");
        $typeEvenement58->addNiveau($college);
        $manager->persist($typeEvenement58);

        $typeEvenement59 = new TypeEvenement();
        $typeEvenement59->setNom("Simulation d entretiens de recrutement");
        $typeEvenement59->addNiveau($superieur);
        $manager->persist($typeEvenement59);

        $typeEvenement60 = new TypeEvenement();
        $typeEvenement60->setNom("Simulation oraux blancs");
        $typeEvenement60->addNiveau($lycee);
        $manager->persist($typeEvenement60);

        $typeEvenement61 = new TypeEvenement();
        $typeEvenement61->setNom("Simulations d\'entretiens (lycée)");
        $typeEvenement61->addNiveau($lycee);
        $manager->persist($typeEvenement61);

        $typeEvenement62 = new TypeEvenement();
        $typeEvenement62->setNom("Simulations de situations de management au quotidien");
        $typeEvenement62->addNiveau($superieur);
        $manager->persist($typeEvenement62);

        $typeEvenement63 = new TypeEvenement();
        $typeEvenement63->setNom("Soutenance de rapports de stages");
        $typeEvenement63->addNiveau($superieur);
        $manager->persist($typeEvenement63);

        $typeEvenement64 = new TypeEvenement();
        $typeEvenement64->setNom("Soutenance des exposés de gestion");
        $typeEvenement64->addNiveau($superieur);
        $manager->persist($typeEvenement64);

        $typeEvenement65 = new TypeEvenement();
        $typeEvenement65->setNom("Soutien en anglais");
        $typeEvenement65->addNiveau($superieur);
        $manager->persist($typeEvenement65);

        $typeEvenement66 = new TypeEvenement();
        $typeEvenement66->setNom("Visite d entreprise");
        $typeEvenement66->addNiveau($txNiveau);
        $manager->persist($typeEvenement66);





        $etablissement = new Etablissement();
        $etablissement->setNiveaux($lycee);
        $etablissement->setNom("Lycée Saint Charles");
        $etablissement->setAdresse("31 avenue Saint Fiacre");
        $etablissement->setCodePostal("45000");
        $etablissement->setVille("Orléans");
        $etablissement->setCorrespondants($user);
        $etablissement->setPresence(true);
        $manager->persist($etablissement);

        $etablissement2 = new Etablissement();
        $etablissement2->setNiveaux($primaire);
        $etablissement2->setNom("Ecole Diderot");
        $etablissement2->setAdresse("Avenue Diderot");
        $etablissement2->setCodePostal("45100");
        $etablissement2->setVille("Orléans");
        $etablissement2->setPresence(true);
        $etablissement2->setCorrespondants($user1);
        $etablissement2->addAdjoint($user2);
        $manager->persist($etablissement2);

        $etablissement3 = new Etablissement();
        $etablissement3->setNiveaux($college);
        $etablissement3->setNom("Collège Jean Rostand");
        $etablissement3->setAdresse("18 Rue du Nécotin");
        $etablissement3->setCodePostal("45000");
        $etablissement3->setVille("Orléans");
        $etablissement3->setPresence(true);
        $etablissement3->setCorrespondant($user3);
        $etablissement3->addAdjoint($user4);
        $manager->persist($etablissement3);

        $etablissement4 = new Etablissement();
        $etablissement4->setNiveaux($college);
        $etablissement4->setNom("Collège André Malraux");
        $etablissement4->setAdresse("1 Rue Françoise Giroud");
        $etablissement4->setCodePostal("45140");
        $etablissement4->setVille("Saint-Jean-de-la-Ruelle");
        $etablissement4->setPresence(true);
        $etablissement4->setCorrespondant($user5);
        $etablissement4->addAdjoint($user3);
        $manager->persist($etablissement4);

        $etablissement5 = new Etablissement();
        $etablissement5->setNiveaux($superieur);
        $etablissement5->setNom("CFAI La Chapelle");
        $etablissement5->setAdresse("74 rue Nationale");
        $etablissement5->setCodePostal("45380");
        $etablissement5->setVille("La Chapelle-Saint-Mesmin");
        $etablissement5->setPresence(true);
        $manager->persist($etablissement5);

        $etablissement6 = new Etablissement();
        $etablissement6->setNiveaux($lycee);
        $etablissement6->setNom("Lycée Benjamin Franklin");
        $etablissement6->setAdresse("21 bis rue Eugène Vignat");
        $etablissement6->setCodePostal("45000");
        $etablissement6->setVille("Orléans");
        $etablissement6->setPresence(true);
        $etablissement6->setCorrespondant($user6);
        $etablissement6->setAdjoints($user4);
        $manager->persist($etablissement6);

        $etablissement7 = new Etablissement();
        $etablissement7->setNiveaux($lycee);
        $etablissement7->setNom("Lycée Charles Péguy");
        $etablissement7->setAdresse("1 Cours Victor Hugo");
        $etablissement7->setCodePostal("45000");
        $etablissement7->setVille("Orléans");
        $etablissement7->setPresence(true);
        $manager->persist($etablissement7);



        $evenement = new Evenement();
        $evenement->setDescription("Présentation des entretiens post-bac aux classes de terminale de l'établissement");
        $evenement->setDateEvt(new \DateTime("2017-02-14"));
        $evenement->setHeureDebut(new \DateTime("14:00"));
        $evenement->setHeureFin(new \DateTime("18:00"));
        $evenement->setNbParticipants(2);
        $evenement->setNbObservateurs(2);
        $evenement->setTypeEvenement($typeEvenement);
        $evenement->setEtablissement($etablissement);
        $evenement->setAnnule(false);
        $evenement->addIntervenant($user);
        $evenement->addIntervenant($user3);
        $evenement->addObservateur($user2);
        $manager->persist($evenement);

        $evenement2 = new Evenement();
        $evenement2->setDescription("Sensibilisation sur la façon de se tenir en entretien");
        $evenement2->setDateEvt(new \DateTime("2017-04-14"));
        $evenement2->setHeureDebut(new \DateTime("14:00"));
        $evenement2->setHeureFin(new \DateTime("18:00"));
        $evenement2->setNbParticipants(1);
        $evenement2->setNbObservateurs(2);
        $evenement2->setTypeEvenement($typeEvenement3);
        $evenement2->setEtablissement($etablissement2);
        $evenement2->setAnnule(false);
        $evenement2->addIntervenant($user2);
        $manager->persist($evenement2);

        $evenement3 = new Evenement();
        $evenement3->setDescription("Entreprendre pour apprendre");
        $evenement3->setDateEvt(new \DateTime("2017-07-18"));
        $evenement3->setHeureDebut(new \DateTime("10:00"));
        $evenement3->setHeureFin(new \DateTime("12:00"));
        $evenement3->setNbParticipants(3);
        $evenement3->setNbObservateurs(2);
        $evenement3->setTypeEvenement($typeEvenement2);
        $evenement3->setEtablissement($etablissement3);
        $evenement3->setAnnule(true);
        $evenement3->addIntervenant($user2);
        $evenement3->addIntervenant($user);
        $evenement3->addIntervenant($user3);
        $evenement3->addObservateur($user4);
        $manager->persist($evenement3);

        $evenement4 = new Evenement();
        $evenement4->setDescription("Intervention devant une classe de terminale");
        $evenement4->setDateEvt(new \DateTime("2017-10-01"));
        $evenement4->setHeureDebut(new \DateTime("14:00"));
        $evenement4->setHeureFin(new \DateTime("18:00"));
        $evenement4->setNbParticipants(2);
        $evenement4->setNbObservateurs(2);
        $evenement4->setTypeEvenement($typeEvenement3);
        $evenement4->setEtablissement($etablissement3);
        $evenement4->setAnnule(false);
        $evenement4->addIntervenant($user4);
        $evenement4->addIntervenant($user2);
        $evenement4->addObservateur($user);
        $manager->persist($evenement4);

        $evenement5 = new Evenement();
        $evenement5->setDescription("Forum des métiers");
        $evenement5->setDateEvt(new \DateTime("2017-03-20"));
        $evenement5->setHeureDebut(new \DateTime("08:00"));
        $evenement5->setHeureFin(new \DateTime("18:00"));
        $evenement5->setNbParticipants(3);
        $evenement5->setNbObservateurs(2);
        $evenement5->setTypeEvenement($typeEvenement4);
        $evenement5->setEtablissement($etablissement);
        $evenement5->setAnnule(false);
        $evenement5->addIntervenant($user4);
        $evenement5->addIntervenant($user2);
        $evenement5->addIntervenant($user3);
        $evenement5->addObservateur($user);
        $manager->persist($evenement5);
        $manager->flush();
    }
}
