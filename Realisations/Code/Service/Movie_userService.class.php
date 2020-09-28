<?php
namespace Code\Service;

use Code\Model\Movie_user;
use Code\Provider\IMovie_userProvider;
use Code\Provider\IMovieProvider;

class Movie_userService implements IMovie_userProvider
{

    private $movie_user;
    private $movie;

    public function __construct(IMovie_userProvider $mu,IMovieProvider $m)
    {
        $this->movie_user = $mu;
        $this->movie=$m;
    }

    public function findAllByIdMovie($id_movie): array
    {
        $movies_user = $this->movie_user->findAllByIdMovie($id_movie);
        foreach ($movies_user as $movie_user) {
            $movie = $this->movie->findOne($movie_user->getId_movie());
            $movie_user->setMovie($movie);
        }
        return $movies_user;
    }

    public function findAllByIdUser($id_user): array
    {
        $movies_user = $this->movie_user->findAllByIdUser($id_user);
        foreach ($movies_user as $movie_user) {
            $movie = $this->movie->findOne($movie_user->getId_movie());
            $movie_user->setMovie($movie);
        }
        return $movies_user;
    }

    public function findAll(): array
    {
        $movies_user = $this->movie_user->findAll();
        foreach ($movies_user as $movie_user) {
            $movie = $this->movie->findOne($movie_user->getId_movie());
            $movie_user->setMovie($movie);
        }
        return $movies_user;
    }

    public function findOne(int $id_user, int $id_movie): Movie_user
    {
        $movie_user = $this->movie_user->findOne($id_user,$id_movie);
        $movie = $this->movie->findOne($movie_user->getId_movie());
        $movie_user->setMovie($movie);
        return $movie_user;
    }
}

?>