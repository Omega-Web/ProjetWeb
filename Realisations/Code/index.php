<?PHP

//require_once 'bootstrap.php';
use Code\Infrastructure\Database;
use PDOException;
Use PDO;
require_once './Infrastructure/Database.class.php';

error_reporting(E_ALL);
ini_set("display_errors", 1);

global $con;
echo"FERNANDES";
try
{
 global $con;
 //$con = new PDO('mysql:host=localhost:8889,dbname=videotheque', 'root', 'root');
 $con = Database::get();
}
catch(PDOException $e)
{
    echo"CORNO";
    die($e->getMessage());
}

echo "LECRAM";
$sql = 'SELECT * FROM movie';
$rs = $this->$con->query($sql);
while($data = $rs->fetch(PDO::FETCH_ASSOC))
{
   print_r($data);
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