<?php 

namespace Code\Model;

use DateTime;
use Exception;

//representation en classe de la table genre de la bdd
class Genre {
    private $id;
    private $name;

    public function __construct(array $data)
    {
        $this->setId($data['id']);
        $this->setName($data['name'] ?? '');
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}