<?php

namespace Code\Model;

Use Code\Model\Movie;

class Movie_user
{
    private $id_user;
    private $id_movie;
    private $movie;
    private $watch_state;
    private $comment;

    public function __construct($data)
    {
        $this->setId_user($data['fk_user'] ?? 0);
        $this->setId_movie($data['fk_movie'] ?? 0);
        $this->setWatch_state($data['watch_state'] ?? false);
        $this->setComment($data['comment'] ?? '');
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
}
?>