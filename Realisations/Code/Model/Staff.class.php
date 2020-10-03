<?php

namespace Code\Model;

Use DateTime;
Use Exception;

//representation en classe de la table staff_movie de la bdd
class Staff
{
    private $id;
    private $firstname;
    private $lastname;
    private $birthday;

    public function __construct(array $data)
    {
        $this->setId($data['id'] ?? 0);
        $this->setFirstname($data['firstname']);
        $this->setLastname($data['lastname']);
        try{
            $date =new DateTime($data['birthday']);
            $this->setBirthday($date);
        }catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
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
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of birthdate
     */ 
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set the value of birthdate
     *
     * @return  self
     */ 
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }
}
