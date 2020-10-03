<?php
namespace Code\Repository;

use PDO;
use PDOException;
use Code\Provider\IMovie_imageProvider;
use Code\Model\Movie_image;

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
        while($data = $stt->fetch(PDO::FETCH_ASSOC))
        {
            $images[]= $data;
        }   
        return $images;        
    }

    public function findOne(int $id_image): Movie_image
    {
        $stt = $this->con->prepare('SELECT * FROM movie_image where id=:id_image');
        $stt-> bindValue('id_image',$id_image,PDO::PARAM_INT);
        $stt->execute();
        $data = $stt->fetch(PDO::FETCH_ASSOC);    
        return new Movie_image($data);   
    }

    public function findAllByIdMovie(int $id_movie): array
    {
        $stt = $this->con->prepare('SELECT * FROM movie_image where fk_movie=:id_movie');
        $stt-> bindValue('id_movie',$id_movie,PDO::PARAM_INT);
        $stt->execute();
        while($data = $stt->fetch(PDO::FETCH_ASSOC))
        {
            $images[]= $data;
        }   
        return $images; 
    }
}
?>