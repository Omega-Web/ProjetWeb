<?PHP

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'bootstrap.php';
use Code\Infrastructure\Database;
use Code\Model\Genre;
use Code\Repository\GenreRepository;
use Code\Repository\MovieRepository;
use Code\Repository\StaffRepository;

// Test insert Genre :)
// $genreArray = array();
// $genreArray['id'] = 0;
// $genreArray['name'] = 'comedyhorror';
// $genre = new Genre($genreArray);
// $genreRepo = new GenreRepository(Database::get());
// $genreRepo->insertGenre($genre);

// Test update Genre :)
// $genreArray = array();
// $genreArray['id'] = 17;
// $genreArray['name'] = 'comedyhorror';

// $genreArray2 = array();
// $genreArray2['id'] = 17;
// $genreArray2['name'] = 'comedyhorror updated';
// $genre = new Genre($genreArray);
// $genre2 = new Genre($genreArray2);

// $genreRepo = new GenreRepository(Database::get());
// $genreRepo->updateGenre($genre, $genre2);

// Test insert Genre :)
// $genreArray = array();
// $genreArray['id'] = 21;
// $genreArray['name'] = 'NEWcomedyhorror';
// $genre = new Genre($genreArray);
// $genreRepo = new GenreRepository(Database::get());
// $genreRepo->deleteGenre($genre);


/*$repo = new StaffRepository(Database::get());
$staffs = $repo->findAll();
print_r($staffs);*/
/*$repo = new MovieRepository(Database::get());
$Movies = $repo->findAll();
print_r($Movies);*/

// $ctrl->render('Home/index');


// $animal = $animalService->findOne(1);
// print_r($animal);


// $animals = $animalService->getAll();

// echo $animal->getName() . ' ' . $animal->getSpecies()->getLatinName() . PHP_EOL;
// print_r($animals);


// $animals = $animalRepo->findAll();

// foreach ($animals as $animal) {
//    echo $animal->getName() . PHP_EOL;
// }

// echo $animal->getName();
// $race = $raceRepo->findOne(2);
// echo $race->getName();

// $species = $speciesRepo->findOne(1);
// echo $species->getName();