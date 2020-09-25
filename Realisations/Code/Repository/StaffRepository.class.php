<?php

namespace Code\Repository;

require_once 'bootstrap.php';

use PDO;
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
}