<?php

namespace App\Entity;

class Produit{
    private int $id_produit; 
    private string $nom_produit;
    private string $description;
    private int $id_categorie;
    private float $prix_unitaire;
    private  $date_creation; //DateTime erreur

    public function __construct($id_produit,$nom_produit, $description, $id_categorie, $prix_unitaire, $date_creation)
    {
        $this->id_produit = $id_produit;
        $this->nom_produit = $nom_produit;
        $this->description = $description;
        $this->id_categorie = $id_categorie;
        $this->$prix_unitaire = $prix_unitaire;
        $this->date_creation = $date_creation;
    }

    /**
     * Set the value of id_produit
     *
     * @return  self
     */ 
    public function setId_produit($id_produit)
    {
        $this->id_produit = $id_produit;

        return $this;
    }

    /**
     * Get the value of nom_produit
     */ 
    public function getNom_produit()
    {
        return $this->nom_produit;
    }

    /**
     * Set the value of nom_produit
     *
     * @return  self
     */ 
    public function setNom_produit($nom_produit)
    {
        $this->nom_produit = $nom_produit;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of prix_unitaire
     */ 
    public function getPrix_unitaire()
    {
        return $this->prix_unitaire;
    }

    /**
     * Set the value of prix_unitaire
     *
     * @return  self
     */ 
    public function setPrix_unitaire($prix_unitaire)
    {
        $this->prix_unitaire = $prix_unitaire;

        return $this;
    }

    /**
     * Get the value of date_creation
     */ 
    public function getDate_creation()
    {
        return $this->date_creation;
    }

    /**
     * Set the value of date_creation
     *
     * @return  self
     */ 
    public function setDate_creation($date_creation)
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    /**
     * Get the value of id_produit
     */ 
    public function getId_produit()
    {
        return $this->id_produit;
    }

  

    /**
     * Get the value of id_categorie
     */ 
    public function getId_categorie()
    {
        return $this->id_categorie;
    }

    /**
     * Set the value of id_categorie
     *
     * @return  self
     */ 
    public function setId_categorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;

        return $this;
    }
}