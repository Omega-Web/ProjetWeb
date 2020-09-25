<?php

namespace Code\Model;

Use Code\Model\Movie;

class Movie_user
{
    private $id_movie;
    private Movie $movie;
    private $watch_state;
    private $personal_ranking;
    private $comment;

    public function __construct($data)
    {
        $this->id_movie=$this->setId_movie($data['fk_movie'] ?? 0);
        $this->watch_state=$this->setWatch_state($data['watch_state'] ?? true);
        $this->personal_ranking=$this->setPersonal_ranking($data['personal_ranking'] ?? null);
        $this->comment=$this->setComment($data['comment'] ?? "");
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
     * Get the value of movie
     */ 
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * Set the value of movie
     *
     * @return  self
     */ 
    public function setMovie($movie)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get the value of watch_state
     */ 
    public function getWatch_state()
    {
        return $this->watch_state;
    }

    /**
     * Set the value of watch_state
     *
     * @return  self
     */ 
    public function setWatch_state($watch_state)
    {
        $this->watch_state = $watch_state;

        return $this;
    }

    /**
     * Get the value of personal_ranking
     */ 
    public function getPersonal_ranking()
    {
        return $this->personal_ranking;
    }

    /**
     * Set the value of personal_ranking
     *
     * @return  self
     */ 
    public function setPersonal_ranking($personal_ranking)
    {
        $this->personal_ranking = $personal_ranking;

        return $this;
    }

    /**
     * Get the value of comment
     */ 
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */ 
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }
}
?>