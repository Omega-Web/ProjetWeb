<?php
namespace Code\Repository;

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
    public function findAll(int $id_movie): array
    {
        $stt = $this->con->prepare('SELECT * FROM movie_image where fk_movie=:id_user');
        $stt-> bindValue('id_user',$id_movie,PDO::PARAM_INT);
        $stt->execute();
        while($data = $stt->fetch(PDO::FETCH_ASSOC))
        {
            $images[]= $data;
        }   
        return $images;        
    }

    public function findOne(int $id_movie, int $id_image): string
    {
        $stt = $this->con->prepare('SELECT * FROM movie_image where fk_movie=:id_user and id=:id_image');
        $stt-> bindValue('id_user',$id_movie,PDO::PARAM_INT);
        $stt-> bindValue('id_image',$id_image,PDO::PARAM_INT);
        $stt->execute();
        $image = $stt->fetch(PDO::FETCH_ASSOC);    
        return $image['image'];   
    }
}
?>