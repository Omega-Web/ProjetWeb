<?php 

namespace Code\Model;

use DateTime;
use Exception;

//representation en classe de la table genre de la bdd
class Movie_genre {
    private $id_movie;
    private $id_genre;

    public function __construct(array $data)
    {
        $this->setId_movie($data['fk_movie'] ?? 0);
        $this->setId_genre($data['fk_genre'] ?? 0);
    }

    /**
     * Get the value of id_movie
     */ 
    public function getId_movie()
    {
        return $this->id_movie;
    }

    /**
     * Set the value of id_movie
     *
     * @return  self
     */ 
    public function setId_movie($id_movie)
    {
        $this->id_movie = $id_movie;

        return $this;
    }

    /**
     * Get the value of id_genre
     */ 
    public function getId_genre()
    {
        return $this->id_genre;
    }

    /**
     * Set the value of id_genre
     *
     * @return  self
     */ 
    public function setId_genre($id_genre)
    {
        $this->id_genre = $id_genre;

        return $this;
    }
}