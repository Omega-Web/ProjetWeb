<?php

namespace Code\Model;

Use DateTime;

class Movie
{
    private $id;
    private $title;
    private $plot;
    private $duration;
    private $date;
    private $age_restriction_id;

    public function __construct($data)
    {
        
    }

    public function setId($id)
    {
        $this->id = $id;
       
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($plot)
    {
        $this->plot = $plot;
    }

    public function getTitle()
    {
       return $this->plot;
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
}