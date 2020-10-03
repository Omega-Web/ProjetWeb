<?php
namespace Code\Repository;

use Code\Model\Movie_image;
use PDO;
use PDOException;
use Code\Provider\IMovie_imageProvider;

class Movie_imageRepository implements IMovie_imageProvider
{
    Private $con;
    public function __construct(PDO $con)
    {
        $this->con=$con;
    }

    public function findAll(): array
    {
        $stt = $this->con->prepare('SELECT * FROM movie_image');
        $stt->execute();
        $movie_image = [];
        while($data = $stt->fetch(PDO::FETCH_ASSOC))
        {
            $movie_image[]= new Movie_image($data);
        } 
        $stt->closeCursor();  
        return $movie_image;    

    }

    public function findAllByMovie(int $id_movie): array
    {
        $stt = $this->con->prepare('SELECT * FROM movie_image where fk_movie=:id_user');
        $stt-> bindValue('id_user',$id_movie,PDO::PARAM_INT);
        $stt->execute();
        $movie_image = [];
        while($data = $stt->fetch(PDO::FETCH_ASSOC))
        {
            $movie_image[]= new Movie_image($data);
        } 
        $stt->closeCursor();  
        return $movie_image;      
    }

    public function findOne(int $id_image): Movie_image
    {
        $stt = $this->con->prepare('SELECT * FROM movie_image where id=:id_image');
        $stt-> bindValue('id_image',$id_image,PDO::PARAM_INT);
        $stt->execute();
        $data = $stt->fetch(PDO::FETCH_ASSOC);    
        return new Movie_image($data);   
    }

    public function insert(Movie_image $movie_image): bool
    {
        try {
            $sql = 'INSERT INTO `movie_image`(`image`, `fk_movie`) VALUES (:str_image,:id_movie)';
            $stt = $this->con->prepare($sql);
            $stt-> bindValue('id_movie',$movie_image->getId_movie(), PDO::PARAM_INT);
            $stt-> bindValue('str_image',$movie_image->getImage(), PDO::PARAM_LOB);
            $stt->execute();
            $stt->closeCursor();

            return true;

        } catch (PDOException $e) {
                die($e->getMessage());
                return false;
        }
    }

    public function update(Movie_image $movie_image): bool
    {
        try {
            $sql = 'UPDATE `movie_image` SET  `image`=:image WHERE id=:id_image';
            $stt = $this->con->prepare($sql);
            $stt-> bindValue('id_image',$movie_image->getId_image(), PDO::PARAM_INT);
            $stt-> bindValue('image',$movie_image->getImage(), PDO::PARAM_STR);
            $stt->execute();
            $stt->closeCursor();

            return true;

        } catch (PDOException $e) {
                die($e->getMessage());
                return false;
        }
    }

    public function delete(Movie_image $movie_image): bool
    {
        try {
            $sql = 'DELETE `movie_image` WHERE id=:id_image';
            $stt = $this->con->prepare($sql);
            $stt-> bindValue('id_image',$movie_image->getId_image(), PDO::PARAM_INT);
            $stt->execute();
            $stt->closeCursor();

            return true;

        } catch (PDOException $e) {
                die($e->getMessage());
                return false;
        }
    }
}
?>