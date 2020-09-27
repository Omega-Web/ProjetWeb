<?php

namespace Code\Model;

Use DateTime;
USe Exception;
use Code\Model\Genre;

//representation en classe de la table movie de la bdd
class Movie
{
    private $id;
    private $title;
    private $plot;
    private $duration;
    private $date;
    private $age_restriction_id;
    private $genresId =[];
    private $genres = [];
    private $images = [];
    private $staffsId =[];
    private $staffs =[];

    public function __construct($data)
    {
        $this->setId( $data['id'] ?? 0);
        $this->setTitle($data['title'] ?? '');
        $this->setPlot($data['plot'] ?? '');
        $this->setDuration($data['duration']);
        try{
            $date =new DateTime($data['date']);
            $this->setDate($date);
        }catch(Exception $e)
        {
            die($e->getMessage());
        }
        $this->setAge_restriction_id($data['age_restriction_id'] ?? 0);
        
    }

    public function setId($id)
    {
        $this->id = $id;
       
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
       return $this->title;
    }
    

    /**
     * Get the value of plot
     */ 
    public function getPlot()
    {
        return $this->plot;
    }

    /**
     * Set the value of plot
     *
     * @return  self
     */ 
    public function setPlot($plot)
    {
        $this->plot = $plot;

        return $this;
    }

    /**
     * Get the value of duration
     */ 
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set the value of duration
     *
     * @return  self
     */ 
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of age_restriction_id
     */ 
    public function getAge_restriction_id()
    {
        return $this->age_restriction_id;
    }

    /**
     * Set the value of age_restriction_id
     *
     * @return  self
     */ 
    public function setAge_restriction_id($age_restriction_id)
    {
        $this->age_restriction_id = $age_restriction_id;

        return $this;
    }

    /**
     * Get the value of genres
     */ 
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * Set the value of genres
     *
     * @return  self
     */ 
    public function setGenres($genres)
    {
        $this->genres = $genres;

        return $this;
    }

    /**
     * Get the value of images
     */ 
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set the value of images
     *
     * @return  self
     */ 
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

        /**
     * Get the value of genresId
     */ 
    public function getGenresId()
    {
        return $this->genresId;
    }

    /**
     * Set the value of genresId
     *
     * @return  self
     */ 
    public function setGenresId($genresId)
    {
        $this->genresId = $genresId;

        return $this;
    }

    /**
     * Get the value of staffs
     */ 
    public function getStaffs()
    {
        return $this->staffs;
    }

    /**
     * Set the value of staffs
     *
     * @return  self
     */ 
    public function setStaffs($staffs)
    {
        $this->staffs = $staffs;

        return $this;
    }

    /**
     * Get the value of staffsId
     */ 
    public function getStaffsId()
    {
        return $this->staffsId;
    }

    /**
     * Set the value of staffsId
     *
     * @return  self
     */ 
    public function setStaffsId($staffsId)
    {
        $this->staffsId = $staffsId;

        return $this;
    }
}