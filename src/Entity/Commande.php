<?php

namespace App\Entity;

use DateTime;

class Commande {
    private int $id_commande;
    private ?DateTime $date_commande;
    private ?int $id_user;
    private int $id_panier;
    private string $etat;
    private ?int $total;
    private ?string $id_stripe;

    public function __construct()
    {
        
    }

    


    /**
     * Get the value of id_commande
     */ 
    public function getId_commande()
    {
        return $this->id_commande;
    }

    /**
     * Set the value of id_commande
     *
     * @return  self
     */ 
    public function setId_commande($id_commande)
    {
        $this->id_commande = $id_commande;

        return $this;
    }

    /**
     * Get the value of date_commande
     */ 
    public function getDate_commande()
    {
        return $this->date_commande;
    }

    /**
     * Set the value of date_commande
     *
     * @return  self
     */ 
    public function setDate_commande($date_commande)
    {
        $this->date_commande = $date_commande;

        return $this;
    }

    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of id_panier
     */ 
    public function getId_panier()
    {
        return $this->id_panier;
    }

    /**
     * Set the value of id_panier
     *
     * @return  self
     */ 
    public function setId_panier($id_panier)
    {
        $this->id_panier = $id_panier;

        return $this;
    }

    /**
     * Get the value of etat
     */ 
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     *
     * @return  self
     */ 
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get the value of id_stripe
     */ 
    public function getId_stripe()
    {
        return $this->id_stripe;
    }

    /**
     * Set the value of id_stripe
     *
     * @return  self
     */ 
    public function setId_stripe($id_stripe)
    {
        $this->id_stripe = $id_stripe;

        return $this;
    }
}