<?PHP

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'bootstrap.php';
use Code\Infrastructure\Database;
use Code\Model\Genre;
use Code\Model\Staff;
use Code\Repository\GenreRepository;
use Code\Repository\MovieRepository;
use Code\Repository\StaffRepository;

// Test update Movie :)
// $movieArray2 = array();
// $movieArray2['id'] = 12;
// $movieArray2['title'] = '300';
// $movieArray2['plot'] = 'This is Sparta';
// $movieArray2['duration'] = '01:42:19';
// $movieArray2['date'] = '2001-09-12';
// $movieArray2['age_restriction_id'] = 3;

// $newMovie = new Movie($movieArray2);
// $newMovie->setTitle($movieArray2['title']);
// $newMovie->setPlot($movieArray2['plot']);
// $newMovie->setDuration($movieArray2['duration']);
// $newMovie->setDate($movieArray2['date']);
// $newMovie->setAge_restriction_id($movieArray2['age_restriction_id']);

// $movieRepo = new MovieRepository(Database::get());
// print_r($newMovie);
// $movieRepo->updateMovie($newMovie);

// $staffArray = array();
// $staffArray['id'] = 8;
// $staffArray['firstname'] = 'Blabla';
// $staffArray['lastname'] = 'Bla';
// $staffArray['birthday'] = '2012-12-12';

// $newStaff = new Staff($staffArray);
// $newStaff->setId($staffArray['id']);
// $newStaff->setFirstname($staffArray['firstname']);
// $newStaff->setLastname($staffArray['lastname']);
// $newStaff->setBirthday($staffArray['birthday']);

// $staffRepo = new StaffRepository(Database::get());
// print_r($newStaff);
// $staffRepo->updateStaff($newStaff);

// $staffArray = array();
// $staffArray['id'] = 7;
// $staffArray['firstname'] = 'Blabla';
// $staffArray['lastname'] = 'Bla';
// $staffArray['birthday'] = '1995-08-05';
// $deletedStaff = new Staff($staffArray);

// $staffRepo = new StaffRepository(Database::get());
// print_r($deletedStaff);
// $staffRepo->deleteStaff($deletedStaff);

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