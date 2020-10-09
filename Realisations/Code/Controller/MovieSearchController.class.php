<?php

namespace Code\Controller;

use Code\Repository\Movie_imageRepository;
use Code\Infrastructure\Database;
use Code\Repository\GenreRepository;
use Code\Repository\Movie_staffRepository;
use Code\Repository\MovieRepository;
use Code\Repository\StaffRepository;
use Code\Service\MovieService;

class MovieSearchController
{
    private $MovieService;
    private $moviesArray;

    public function __construct()
    {
        $movieImageRepo = new Movie_imageRepository(Database::get());
        $genreRepo = new GenreRepository(Database::get());
        $movieRepo = new MovieRepository(Database::get());
        $movieStaffRepo = new Movie_staffRepository(Database::get());
        $staffRepo = new StaffRepository(Database::get());

        $this->MovieService = new MovieService($movieRepo, $genreRepo, $movieImageRepo, $movieStaffRepo, $staffRepo);
    }

    public function getMovies()
    {
        $this->moviesArray = $this->MovieService->findAll();
        return count($this->moviesArray);
    }

    public function getTitle($index): string
    {
        return $this->moviesArray[$index]->getTitle();
    }
    public function getImageBase64($index)
    {
        return base64_encode($this->moviesArray[$index]->getImages()[0]['image']);
    }
    public function getId($index): int
    {
        return $this->moviesArray[$index]->getId();
    }

    public function getPlot($index): string
    {
        return $this->moviesArray[$index]->getPlot();
    }

    private function getMovieByTitle($title)
    {
        $this->moviesArray = $this->MovieService->findAllByTitle($title);
        return count($this->moviesArray);
    }

    public function getHtmlCard($text): string
    {
        $taille = $this->getMovieByTitle($text);
        $html = "";
        for ($i = 0; $i < $taille; $i++) {

            $html .= '<div class="card">
            <div class="div-img">
                <img id="card-img" src="' . $this->getImageBase64($i) . ' alt="imageMovie" />
            </div>
            <div class="container">
                <h4 class="title"><b>' . $this->getTitle($i) . '</b></h4>
                <p>' . $this->getPlot($i) . '</p>
                <form action="../MovieInfo/MovieInfo.php" method="post">
                    <input type="text" name="movie-selected" value="' . $this->getId($i) . '" hidden />
                    <button type="submit" id="seemore-btn">Plus</button>
                </form>
            </div>
        </div>';
        }
        return $html;
    }
    public function CallAjax($action, $text = "")
    {
        switch ($action) {
            case 'search_movie':
                $fp = fopen("log.txt", "w");
                fwrite($fp, "dans case \n");
                $html = $this->getHtmlCard($text);
                fwrite($fp, $html);
                fclose($fp);
                $response = ['text' => "ok", 'html' => $html];
                echo json_encode($response);
                break;
        }
    }
}
