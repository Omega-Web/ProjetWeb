<?php

namespace Code\Repository;

use PDO;
use PDOException;
use Code\Model\Staff;
use Code\Provider\IStaffProvider;

class StaffRepository implements IStaffProvider
{
    private $con;

    public function __construct(PDO $con)
    {

        $this->con = $con;
    }

    // retourne tout les personnes 
    public function findAll(): array
    {
        $sql = 'SELECT * FROM movie_staff';
        $rs = $this->con->query($sql);
        $Staffs = [];
        while($data = $rs->fetch(PDO::FETCH_ASSOC))
        {
            $Staffs[]= new Staff($data);
        }   
        $rs->closeCursor();
        return $Staffs;
    }
    //retourne la personne correspondant à l'id
    public function findOne(int $id): Staff
    {
                
        $stt = $this->con->prepare('SELECT * FROM movie_staff where id=:id');
        $stt-> bindValue('id',$id,PDO::PARAM_INT);
        $stt->execute();
        $data = $stt->fetch(PDO::FETCH_ASSOC);
        $stt->closeCursor();
        return new Staff($data);

    }
    //retourne les personne dont le nom entier contient la chaine reçu($name)
    public function findAllByName(string $name):array
    {
        $stt = $this->con->prepare('SELECT * FROM movie_staff where name like ?');
        $stt->execute(array("%$name%"));
        $Staffs = [];
        while($data = $stt->fetch(PDO::FETCH_ASSOC))
        {
            $Staffs[]= new Staff($data);
        }  
        $stt->closeCursor();
        return $Staffs;

    }
    public function updateStaff(Staff $newStaff): bool
    {
        try {
            $sql = 'UPDATE movie_staff SET firstname=:firstname, lastname=:lastname, birthday=:birthday WHERE id=:id ';
            $stt = $this->con->prepare($sql);
            $stt->bindValue('id',$newStaff->getId(), PDO::PARAM_INT);
            $stt->bindValue('firstname',$newStaff->getFirstname(), PDO::PARAM_STR);
            $stt->bindValue('lastname',$newStaff->getLastname(), PDO::PARAM_STR);
            $stt->bindValue('birthday',$newStaff->getBirthday());
            $stt->execute();
            $stt->closeCursor();
            return true;
        }
        catch (PDOException $e) {
            die($e->getMessage());
            return false;
        }        
    }
    public function insertStaff(Staff $newStaff): bool
    {
        try {
            $sql = 'INSERT INTO movie_staff (firstname, lastname, birthday) VALUES (:firstname, :lastname, :birthday)';
            $stt = $this->con->prepare($sql);
            // $stt-> bindValue('id',$newStaff->getId(), PDO::PARAM_INT);
            $stt-> bindValue('firstname',$newStaff->getFirstname(), PDO::PARAM_STR);
            $stt-> bindValue('lastname',$newStaff->getLastname(), PDO::PARAM_STR);
            $stt-> bindValue('birthday',$newStaff->getBirthday());
            $stt->execute();
            $stt->closeCursor();
            return true;
        }
        catch (PDOException $e) {
            die($e->getMessage());
            return false;
        }
    }
    public function deleteStaff($staff): bool
    {
        try {
            $sql = 'DELETE FROM movie_staff WHERE id = :id';
            $stt = $this->con->prepare($sql);
            $stt->bindValue('id',$staff->getId(), PDO::PARAM_INT);
            $stt->execute();
            $stt->closeCursor();
            return true;
        }
        catch (PDOException $e) {
            
            die($e->getMessage());
            return false;
        }
    }
}