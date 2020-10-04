<?php 

namespace Code\Model;

use DateTime;
use Exception;

//representation en classe de la table user de la bdd
class User {
    private $id_user;
    private $firstname;
    private $lastname;
    private $email;
    private $username;
    private $password;
    private $birthday;
    private $id_movies = [];
    private $id_usertype;

    public function __construct(array $data)
    {
        $this->setId($data['id'] ?? 0);
        $this->setFirstname($data['firstname']);
        $this->setLastname($data['lastname']);
        $this->setEmail($data['email']);
        $this->setUsername($data['username']);
        try {
            $date = new DateTime($data['birthday']);
            $this->setBirthday($date);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        $this->setId_usertype($data['fk_user_type'] ?? 0);
    }


    /**
     * @return int
     */
    public function getId(): int {
        return $this->id_user;
    }

    /**
     * @param int $id_user
     */
    public function setId(int $id_user): void {
        $this->id_user = $id_user;
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
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of pseudo
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of birthday
     */ 
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set the value of birthday
     *
     * @return  self
     */ 
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get the value of id_movies
     */ 
    public function getId_movies()
    {
        return $this->id_movies;
    }

    /**
     * Set the value of id_movies
     *
     * @return  self
     */ 
    public function setId_movies($id_movies)
    {
        $this->id_movies = $id_movies;

        return $this;
    }
        /**
     * Get the value of id_movies
     */ 
    public function getId_usertype()
    {
        return $this->id_usertype;
    }

    /**
     * Set the value of id_movies
     *
     * @return  self
     */ 
    public function setId_usertype($id_usertype)
    {
        $this->id_usertype = $id_usertype;

        return $this;
    }

}
