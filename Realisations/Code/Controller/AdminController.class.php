<?php

namespace Code\Controller;

use Code\Infrastructure\Database;
use Code\Repository\GenreRepository;
use Code\Repository\Movie_genreRepository;
use Code\Repository\MovieRepository;
use Code\Repository\UserRepository;
use Code\Model\User;

class AdminController
{
    private $genreRepo;
    private $movieGenreRepo;
    private $movieRepo;
    private $userRepo;


    public function __construct()
    {
        $this->genreRepo = new GenreRepository(Database::get());
        $this->movieGenreRepo = new Movie_genreRepository(Database::get());
        $this->movieRepo = new MovieRepository(Database::get());
        $this->userRepo = new UserRepository(Database::get());


        // $this->service = new MovieService($movieRepo, $genreRepo, $movieImageRepo, $movieStaffRepo, $staffRepo);
        // $this->movieUserService = new Movie_userService($movieUserRepo, $movieRepo);
    }

    public function getGenres()
    {
        return $this->genreRepo->findAll();
    }

    public function getMovies(){
        return $this->movieRepo->findAll();
    }

    public function deleteUser($id)
    {
        $user = new User([]);
        $user->setId($id);

        return $this->userRepo->deleteUser($user);
    }
    // public function deleteMovie($id)
    // {

    // }



    public function actionAdmin($post, $idUser = 0,  $idMovie = 0, $comment = "")
    {
        switch ($post) {
            case 'deleteMovie':

            
                break;
            case 'deleteUser':
                    $this->deleteUser($idUser);
                    $response = [
                        'text' => 'Utilisateur bien supprimé'
                    ];
                    echo json_encode($response);    
                break;
            default:
                break;
        }
    }

}
