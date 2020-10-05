<?php
namespace Code\Service;

use Code\Model\Movie_user;
use Code\Provider\IMovie_userProvider;
use Code\Provider\IMovieProvider;

class Movie_userService implements IMovie_userProvider
{

    private $movie_userAccess;
    private $movieAccess;

    public function __construct(IMovie_userProvider $mu,IMovieProvider $m)
    {
        $this->movie_userAccess = $mu;
        $this->movieAccess=$m;
    }

    public function findAllByIdMovie($id_movie): array
    {
        $movies_user = $this->movie_userAccess->findAllByIdMovie($id_movie);
        foreach ($movies_user as $movie_user) {
            $movie = $this->movieAccess->findOne($movie_user->getId_movie());
            $movie_user->setMovie($movie);
        }
        return $movies_user;
    }

    public function findAllByIdUser($id_user): array
    {
        $movies_user = $this->movie_userAccess->findAllByIdUser($id_user);
        foreach ($movies_user as $movie_user) {
            $movie = $this->movieAccess->findOne($movie_user->getId_movie());
            $movie_user->setMovie($movie);
        }
        return $movies_user;
    }

    public function findAll(): array
    {
        $movies_user = $this->movie_userAccess->findAll();
        foreach ($movies_user as $movie_user) {
            $movie = $this->movieAccess->findOne($movie_user->getId_movie());
            $movie_user->setMovie($movie);
        }
        return $movies_user;
    }

    public function findOne(int $id_user, int $id_movie): Movie_user
    {
        $movie_user = $this->movie_userAccess->findOne($id_user,$id_movie);
        $movie = $this->movieAccess->findOne($movie_user->getId_movie());
        $movie_user->setMovie($movie);
        return $movie_user;
    }

    public function update(Movie_user $movie_user): bool{

        return $this->movie_userAccess->update($movie_user);
    }

    public function insert(Movie_user $movie_user): bool{

        return $this->movie_userAccess->insert($movie_user);
    }

    public function delete(Movie_user $movie_user): bool{

        return $this->movie_userAccess->delete($movie_user);
    }


}

?>