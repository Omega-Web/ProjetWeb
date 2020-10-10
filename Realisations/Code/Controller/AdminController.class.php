<?php

namespace Code\Controller;

use Code\Infrastructure\Database;
use Code\Repository\GenreRepository;
use Code\Repository\Movie_genreRepository;
use Code\Repository\MovieRepository;
use Code\Repository\UserRepository;
use Code\Model\User;
use Code\Model\Movie;
use Code\Model\Movie_genre;
use Code\Model\Movie_image;
use Code\Repository\Movie_imageRepository;
use Exception;

class AdminController
{
    private $genreRepo;
    private $movieGenreRepo;
    private $movieRepo;
    private $userRepo;
    private $imageRepo;


    public function __construct()
    {
        $this->genreRepo = new GenreRepository(Database::get());
        $this->movieGenreRepo = new Movie_genreRepository(Database::get());
        $this->movieRepo = new MovieRepository(Database::get());
        $this->userRepo = new UserRepository(Database::get());
        $this->imageRepo = new Movie_imageRepository(Database::get());


        // $this->service = new MovieService($movieRepo, $genreRepo, $movieImageRepo, $movieStaffRepo, $staffRepo);
        // $this->movieUserService = new Movie_userService($movieUserRepo, $movieRepo);
    }

    public function getGenres()
    {
        return $this->genreRepo->findAll();
    }

    public function getMovies()
    {
        return $this->movieRepo->findAll();
    }


    public function deleteUser($id)
    {
        $user = new User([]);
        $user->setId($id);

        return $this->userRepo->deleteUser($user);
    }
    public function deleteMovie($id)
    {
        $movie = new Movie([]);
        $movie->setId($id);

        return $this->movieRepo->delete($movie);
    }

    public function getFile($file)
    {
        $directory = "../Assets/Uploads";
        if (!empty($file['name'])) {
            $tmp_name = $file['tmp_name'];
            $name = basename($file['name']);
            move_uploaded_file($tmp_name, "$directory/$name");
            $path = $directory . "/" . $name;
            $data = file_get_contents($path);
            $base64 = $data;
            unlink($path);
            return $base64;
        }
    }

    public function insertGenre($idGenre, $idMovie)
    {
        $movieGenre = new Movie_genre([]);
        $movieGenre->setId_genre($idGenre);
        $movieGenre->setId_movie($idMovie);

        $this->movieGenreRepo->insert($movieGenre);
    }
    public function insertImage($idMovie, $file)
    {
        $movieImage = new Movie_image([]);

        $movieImage->setImage($file);
        $movieImage->setId_movie($idMovie);

        $this->imageRepo->insert($movieImage);
    }
    public function insertMovie($m)
    {
        $movie = new Movie([]);
        $movie->setTitle($m['title']);
        $movie->setPlot($m['plot']);
        $movie->setDuration($m['duration']);
        $movie->setDate($m['date']);
        $this->movieRepo->insert($movie);

        return $this->movieRepo->getLastInsertedId();
    }

    public function actionAdmin($post, $idUser = 0, $idMovie = 0, $movie)
    {
        switch ($post) {
            case 'deleteMovie':
                $this->deleteMovie($idMovie);
                $response = [
                    'text' => 'Film bien supprimé'
                ];
                echo json_encode($response);
                break;
            case 'deleteUser':
                $this->deleteUser($idUser);
                $response = [
                    'text' => 'Utilisateur bien supprimé'
                ];
                echo json_encode($response);
                break;
            case 'addMovie':
                $idMovie = $this->insertMovie($movie);
                $base64 = $this->getFile($_FILES['file']);
                $this->insertImage($idMovie, $base64);
                
                $fp = fopen('log.txt', 'w');
                fwrite($fp, $idMovie . PHP_EOL);
                fwrite($fp, $movie['genre']  . PHP_EOL);
                fclose($fp);
                
                
                $this->insertGenre($movie['genre'], $idMovie);
                $response = [
                    'text' => 'Film bien ajouté',
                    'error' => 'Le film na pas pu être ajouté',
                ];
                echo json_encode($response);
                break;
            default:
                break;
        }
    }
}
