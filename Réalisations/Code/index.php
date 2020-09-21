<?PHP

//header('Content-Type: text/plain');
require_once 'bootstrap.php';

use App\Repository\AnimalRepository;
use App\Repository\SpeciesRepository;
use App\Repository\RaceRepository;
use App\Service\AnimalService;
use App\Service\RaceService;
use \App\Infrastructure\Database;
use \App\Model\Animal;

$animalRepo = new AnimalRepository(Database::get());
$speciesRepo = new SpeciesRepository(Database::get());
$raceRepo = new RaceRepository(Database::get());

$raceService = new RaceService($raceRepo, $speciesRepo);
$animalService = new AnimalService($animalRepo, $speciesRepo, $raceService);

$ctrl = new \App\Controller\AnimalController($animalService, $speciesRepo, $raceService);

if (!empty($_GET['id'])){
    $ctrl->edit($_GET['id']);
}

else{
    $ctrl->list();
}




//$ctrl->render('Home/index');


//$animal = $animalService->findOne(1);
//print_r($animal);


//$animals = $animalService->getAll();

//echo $animal->getName() . ' ' . $animal->getSpecies()->getLatinName() . PHP_EOL;
//print_r($animals);


//$animals = $animalRepo->findAll();

//foreach ($animals as $animal) {
//    echo $animal->getName() . PHP_EOL;
//}

//echo $animal->getName();
//$race = $raceRepo->findOne(2);
//echo $race->getName();
//
//$species = $speciesRepo->findOne(1);
//echo $species->getName();