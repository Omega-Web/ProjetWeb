<?PHP

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'bootstrap.php';
require_once './Infrastructure/Database.class.php';
require_once './Repository/MovieRepository.class.php';
use Code\Infrastructure\Database;
use Code\Repository\MovieRepository;
use PDOException;
Use PDO;




 //$con = new PDO('mysql:host=localhost:8889,dbname=videotheque', 'root', 'root');

$MovieRepo = new MovieRepository(Database::get());
$Movies[] = $MovieRepo->findByTitle("P");
foreach($Movies as $Movie)
{
   print($Movie->getTitle());
}





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