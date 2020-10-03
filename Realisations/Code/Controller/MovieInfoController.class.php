<?php

namespace Code\Controller;

use Code\Repository\Movie_imageRepository;
use Code\Infrastructure\Database;
use Code\Model\Movie_user;
use Code\Repository\GenreRepository;
use Code\Repository\MovieRepository;
use Code\Service\MovieService;
use Code\Service\Movie_userService;
use Code\Repository\Movie_staffRepository;
use Code\Repository\Movie_userRepository;
use Code\Repository\StaffRepository;

class MovieInfoController
{
    private $movieService;
    private $movieUserService;
    private $movie;
    private $usermovie;

    public function __construct()
    {
        $movieImageRepo     = new Movie_imageRepository(Database::get());
        $genreRepo          = new GenreRepository(Database::get());
        $movieRepo          = new MovieRepository(Database::get());
        $movieStaffRepo     = new Movie_staffRepository(Database::get());
        $staffRepo          = new StaffRepository(Database::get());
        $movieUserRepo      = new Movie_userRepository(Database::get());

        $this->service = new MovieService($movieRepo, $genreRepo, $movieImageRepo, $movieStaffRepo, $staffRepo);
        $this->movieUserService = new Movie_userService($movieUserRepo, $movieRepo);
    }

    public function getInfoMovie($id_user, $id_movie)
    {
        $this->movie = $this->service->findOne($id_movie);
        // HAVE TO ADD SESSION ID FOR ->
        $this->usermovie = $this->movieUserService->findOne($id_user, $id_movie);
    }

    public function getTitle(): string
    {
        return $this->movie->getTitle();
    }
    public function getImageBase64()
    {
        return base64_encode($this->movie->getImages()[0]['image']);
    }
    public function getId(): int
    {
        return $this->movie->getId();
    }
    public function getPlot(): string
    {
        return $this->movie->getPlot();
    }
    public function getComment(): string
    {
        return $this->usermovie->getComment();
    }
    public function getDate(): string
    {
        return $this->movie->getDate()->format('d M Y');
    }
    public function getStaffs(): array
    {
        return $this->movie->getStaffs();
    }
    public function getGenres(): array
    {
        return $this->movie->getGenres();
    }
    public function getDuration(): string
    {
        return $this->movie->getDuration();
    }
    public function getWatchState(): string
    {
        if ($this->usermovie->getWatch_state()) {
            return '../../Assets/eye.svg';
        } else {
            return '../../Assets/hide.svg';
        }
    }

    public function isMovieInList(): string
    {
        if($this->usermovie->getId_movie() == 0 && $this->usermovie->getId_user() == 0){
            return 'Ajouter';
        }else{
            return 'Ajouté';
        }

    }

    public function editUserMovie($post, $idMovie = 0, $idUser = 0)
    {
        // $fp = fopen('log.txt', 'w');
        // fwrite($fp, $this->usermovie->getId_movie() . ' uugrhuiu'.  $this->usermovie->getId_user());
        // fclose($fp);

        switch ($post) {
            case 'updateWatchState':
                $watch_state = $this->usermovie->getWatch_state();
                $this->usermovie->setWatch_state(!$watch_state);
                $this->movieUserService->update($this->usermovie);
                $image = $this->getWatchState();
                $response = ['image' => $image];
                echo json_encode($response);
                break;
            case 'addToList':

                $this->usermovie = new Movie_user([]);
                $this->usermovie->setId_movie($idMovie);
                $this->usermovie->setId_user($idUser);
                $this->movieUserService->insert($this->usermovie);
                $textBtn = $this->isMovieInList();
                $response = ['text' => $textBtn];
                echo json_encode($response);
                break;
                // case 'addToList':


                //     $movie_user = new Movie_userRepository(Database::get());

                //     $this->usermovie->insert(); // Movie_user $movie_user
                //     $seenImage = '../../Assets/seen.svg';
                //     $unseenImage = '../../Assets/hide.svg';

                //     echo json_encode(['seen' => $seenImage, 'unseen' => $unseenImage]);
                //     break;
                // case 'updateComment':
                //     $comment = $this->usermovie->getComment();
                //     $this->usermovie->setWatch_state(!$watch_state);

                //     $seenImage = '../../Assets/seen.svg';
                //     $unseenImage = '../../Assets/hide.svg';

                //     echo json_encode(['seen' => $seenImage, 'unseen' => $unseenImage]);
                //     break;
        }
    }
}
