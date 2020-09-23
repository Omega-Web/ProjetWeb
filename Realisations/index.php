<?PHP

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'bootstrap.php';
use Code\Infrastructure\Database;
use Code\Model\Movie;
use Code\Repository\MovieRepository;
use Code\Repository\StaffRepository;

// try {
//     $repo = new MovieRepository(Database::get());
//     $repo->

// Test update Genre :)
// $movieArray = array();
// $movieArray['id'] = 12;
// $movieArray['title'] = 'Taxi';
// $movieArray['plot'] = "Daniel est un fou du volant. Cet ex-livreur de pizzas est aujourd'hui chauffeur de taxi et sait échapper aux radars les plus perfectionnés. Pourtant, un jour, il croise la route d'Emilien, policier recalé pour la huitième fois à son permis de conduire. Pour conserver son taxi, il accepte le marché que lui propose Emilien : l'aider à démanteler un gang de braqueurs de banques qui écume les succursales de la ville à bord de puissants véhicules. Road-movie urbain sur un scénario de Luc Besson, également producteur.";
// $movieArray['duration'] = '01:30:00';
// $movieArray['date'] = '1998-04-08';
// $movieArray['age_restriction_id'] = NULL;

// $movieArray2 = array();
// $movieArray2['id'] = 12;
// $movieArray2['title'] = '300';
// $movieArray2['plot'] = 'This is Sparta';
// $movieArray2['duration'] = '01:42:19';
// $movieArray2['date'] = '2001-09-12';
// $movieArray2['age_restriction_id'] = 6;
// $movie = new Movie($movieArray);
// $movie2 = new Movie($movieArray2);

// $movieRepo = new MovieRepository(Database::get());
// $movieRepo->updateMovie($movie, $movie2);


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