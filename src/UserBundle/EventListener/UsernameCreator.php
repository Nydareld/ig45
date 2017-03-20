<?php

namespace UserBundle\EventListener;

use UserBundle\Entity\User;
use Doctrine\ORM\Event\LifecycleEventArgs;

class UsernameCreator {

    /**
     * Avent de créer un utilisateur, crée son username , si tu l'utilisateur
     * est Théo Guerin, le username sera theo.guerin
     * @method prePersist
     * @param  LifecycleEventArgs $args Stack d'evenement de sauvegarde utilisateur doctrine
     */
    public function prePersist(LifecycleEventArgs $args){

        $entity = $args->getEntity();

        // only act on some "Product" entity
        if (!$entity instanceof User) {
            return;
        }

        $entity->setUsername($this->canonnicalise($entity->getPrenom().".".$entity->getNom()));
        $entity->setUsernameCanonical($entity->getUsername());
        return;
    }

    /**
     * supprime les accents
     * @method wd_remove_accents
     * @param  String            $str     a chaine a qui on veut supprimer les accents
     * @param  String            $charset Le charset voulu (defautl utf-8)
     * @return String                     la chaine sans les accents
     */
    static public function wd_remove_accents($str, $charset='utf-8'){
        $str = htmlentities($str, ENT_NOQUOTES, $charset);

        $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
        $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères

        return $str;
    }

    /**
     * Rend cannonical les chaines de characteres :
     *      - supprime les caracters non voulu
     *      - remplace les accents
     *      - met en minuscule
     *      - rempalce les intermots pa des '.' (espaces,tirets,underscore)
     * @method canonnicalise
     * @param  String        $text la cahine a cannonicaliser
     * @return String              La chaine une fois traitée
     */
    static public function canonnicalise($text)
    {
        dump($text);
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '.', $text);
        dump($text);

        // accents
        $text = UsernameCreator::wd_remove_accents($text);
        dump($text);

        // transliterat
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        dump($text);

        // remove unwanted characters
        $text = preg_replace('~[^.\w]+~', '', $text);
        dump($text);

        // trim
        $text = trim($text, '.');
        dump($text);

        // remove duplicate -
        $text = preg_replace('~\.+~', '.', $text);
        dump($text);

        // lowercase
        $text = strtolower($text);
        dump($text);

        if (empty($text)) {
            return 'n.a';
        }

        return $text;
    }
}
