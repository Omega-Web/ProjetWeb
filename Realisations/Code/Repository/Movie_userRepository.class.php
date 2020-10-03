<?php

namespace Code\Repository;

use PDOException;
use Code\Model\Movie_user;
use Code\Provider\IMovie_userProvider;
USE PDO;

class Movie_userRepository implements IMovie_userProvider
{
    private $con;

    public function __construct(PDO $con)
    {
        $this->con = $con;
    }

    public function findAll(): array
    {
        $stt = $this->con->prepare('SELECT * FROM user_movie_list');
        $stt->execute();
        while($data = $stt->fetch(PDO::FETCH_ASSOC))
        {
            $Movies_user[]= new Movie_user($data);
        }   
        return $Movies_user;
    }

    public function findAllByIdMovie($id_movie): array
    {
        $stt = $this->con->prepare('SELECT * FROM user_movie_list where fk_movie=:id_movie');
        $stt-> bindValue('id_user',$id_movie,PDO::PARAM_INT);
        $stt->execute();
        while($data = $stt->fetch(PDO::FETCH_ASSOC))
        {
            $Movies_user[]= new Movie_user($data);
        }   
        return $Movies_user;
    }

    public function findAllByIdUser($id_user): array
    {
        $stt = $this->con->prepare('SELECT * FROM user_movie_list where fk_user=:id_user');
        $stt-> bindValue('id_user',$id_user,PDO::PARAM_INT);
        $stt->execute();
        while($data = $stt->fetch(PDO::FETCH_ASSOC))
        {
            $Movies_user[]= new Movie_user($data);
        }   
        return $Movies_user;
    }
      

    public function findOne(int $id_user, int $id_movie): Movie_user
    {
        $stt = $this->con->prepare('SELECT * FROM user_movie_list where fk_user=:id_user and fk_movie=:id_movie');
        $stt-> bindValue('id_user',$id_user,PDO::PARAM_INT);
        $stt-> bindValue('id_movie',$id_movie,PDO::PARAM_INT);
        $stt->execute();
        $data = $stt->fetch(PDO::FETCH_ASSOC);
        return new Movie_user($data);   
    }

    public function update(Movie_user $movie_user): bool{
        try {
            $sql = 'UPDATE user_movie_list SET watch_state =:watch_state, comment =:comment 
            WHERE fk_movie =:fk_movie AND fk_user =:fk_user';
            $stt = $this->con->prepare($sql);
            $stt-> bindValue('fk_movie',$movie_user->getId_movie(), PDO::PARAM_INT);
            $stt-> bindValue('fk_user',$movie_user->getId_user(), PDO::PARAM_INT);
            $stt-> bindValue('watch_state',$movie_user->getWatch_state(), PDO::PARAM_BOOL);
            $stt-> bindValue('comment',$movie_user->getComment(), PDO::PARAM_STR);
            $stt->execute();
            $stt->closeCursor();
            return true;

        } catch (PDOException $e) {
                die($e->getMessage());
                return false;
        }
        return true;
    }

    public function insert(Movie_user $movie_user): bool{
        try {
            $sql = 'INSERT INTO `user_movie_list`(`fk_movie`, `fk_user`,`watch_state`, `comment`)
             VALUES (:fk_movie,:fk_user,:watch_state,:comment)';
            $stt = $this->con->prepare($sql);
            $stt-> bindValue('fk_movie',$movie_user->getId_movie(), PDO::PARAM_INT);
            $stt-> bindValue('fk_user',$movie_user->getId_user(), PDO::PARAM_INT);
            $stt-> bindValue('watch_state',$movie_user->getWatch_state(), PDO::PARAM_BOOL);
            $stt-> bindValue('comment',$movie_user->getComment(), PDO::PARAM_STR);
            $stt->execute();
            $stt->closeCursor();
            return true;

        } catch (PDOException $e) {
                die($e->getMessage());
                return false;
        }
        return true;
    }

    public function delete(Movie_user $movie_user): bool
    {
        try {
            $sql = 'DELETE FROM `user_movie_list` WHERE fk_movie=:fk_movie and fk_user=:fk_user';
            $stt = $this->con->prepare($sql);
            $stt-> bindValue('fk_movie',$movie_user->getId_movie(), PDO::PARAM_INT);
            $stt-> bindValue('fk_user',$movie_user->getId_user(), PDO::PARAM_INT);
            $stt->execute();
            $stt->closeCursor();
            return true;

        } catch (PDOException $e) {
                die($e->getMessage());
                return false;
        }
        return true;
    }
  
}


?>