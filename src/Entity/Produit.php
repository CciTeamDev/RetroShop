<?php

namespace App\Entity;

class Produit{
    private int $id_produit; 
    private int $ref;
    private string $nom_produit;
    private string $descrip;
    private int $id_categorie;
    private float $prix_unitaire;
    private  $date_en_ligne; //DateTime erreur

    public function __construct()
    {
        // $this->id_produit = $id_produit;
        // $this->ref = $ref;
        // $this->nom_produit = $nom_produit;
        // $this->description = $description;
        // $this->id_categorie = $id_categorie;
        // $this->$prix_unitaire = $prix_unitaire;
        // $this->date_en_ligne = $date_en_ligne;
    }
    /**
     * Get the value of id_produit
     */ 
    public function getId_produit()
    {
        return $this->id_produit;
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
    public function getDescrip()
    {
        return $this->descrip;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescrip($descrip)
    {
        $this->descrip = $descrip;

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
     * Get the value of ref
     */ 
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set the value of ref
     *
     * @return  self
     */ 
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get the value of date_en_ligne
     */ 
    public function getDate_en_ligne()
    {
        return $this->date_en_ligne;
    }

    /**
     * Set the value of date_en_ligne
     *
     * @return  self
     */ 
    public function setDate_en_ligne($date_en_ligne)
    {
        $this->date_en_ligne = $date_en_ligne;

        return $this;
    }

    /**
     * Get the value of id_categorie
     *
     * @return int
     */
    public function getIdCategorie(): int
    {
        return $this->id_categorie;
    }

    /**
     * Set the value of id_categorie
     *
     * @param int $id_categorie
     *
     * @return self
     */
    public function setIdCategorie(int $id_categorie): self
    {
        $this->id_categorie = $id_categorie;

        return $this;
    }
}