<?php 

namespace Code\Model;

use DateTime;
use Exception;

class Movie_image {
    private $id_image;
    private $id_movie;
    private $image;
    private $imagepath;

    public function __construct(array $data)
    {
        $this->setId_movie($data['fk_movie'] ?? 0);
        $this->setId_image($data['id'] ?? 0);
        $this->setImage($data['image'] ?? '');

    }
    /**
     * Get the value of id_image
     */ 
    public function getId_image()
    {
        return $this->id_image;
    }

    /**
     * Set the value of id_image
     *
     * @return  self
     */ 
    public function setId_image($id_image)
    {
        $this->id_image = $id_image;

        return $this;
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
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
    }