<?php

namespace AgendaBundle\Entity;
use UserBundle\Entity\User;
/**
 *
 */
class MailCorrespondant
{
    protected $evenement;
    protected $objet;
    protected $destinataire;
    protected $message;
    protected $expediteur;

    function __construct(Evenement $event, User $user)
    {
        $this->evenement = $event;
        $this->expediteur = $user->getEmail();
        $this->destinataire = $event->getEtablissement()->getCorrespondant()->getEmail();
        $this->objet = "[IG45] Message de ".$user->getPrenom()." ".$user->getNom()." concernant l'intervention ".$event->getDescription();
    }

    /**
     * Get the value of Evenement
     *
     * @return mixed
     */
    public function getEvenement()
    {
        return $this->evenement;
    }

    /**
     * Set the value of Evenement
     *
     * @param mixed evenement
     *
     * @return self
     */
    public function setEvenement($evenement)
    {
        $this->evenement = $evenement;

        return $this;
    }

    /**
     * Get the value of Objet
     *
     * @return mixed
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Set the value of Objet
     *
     * @param mixed objet
     *
     * @return self
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * Get the value of Message
     *
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of Message
     *
     * @param mixed message
     *
     * @return self
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }


    /**
     * Get the value of Destinataire
     *
     * @return mixed
     */
    public function getDestinataire()
    {
        return $this->destinataire;
    }

    /**
     * Set the value of Destinataire
     *
     * @param mixed destinataire
     *
     * @return self
     */
    public function setDestinataire($destinataire)
    {
        $this->destinataire = $destinataire;

        return $this;
    }



    /**
     * Get the value of Expediteur
     *
     * @return mixed
     */
    public function getExpediteur()
    {
        return $this->expediteur;
    }

    /**
     * Set the value of Expediteur
     *
     * @param mixed expediteur
     *
     * @return self
     */
    public function setExpediteur($expediteur)
    {
        $this->expediteur = $expediteur;

        return $this;
    }

}
