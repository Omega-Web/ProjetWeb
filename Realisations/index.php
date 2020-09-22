<?PHP

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'bootstrap.php';
use Code\Infrastructure\Database;
use Code\Repository\MovieRepository;
use Code\Repository\StaffRepository;


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