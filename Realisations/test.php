<?PHP

use Code\Infrastructure\Database;
use Code\Model\Movie_image;
use Code\Model\Movie_user;
use Code\Repository\Movie_imageRepository;
use Code\Repository\Movie_userRepository;
use Code\Repository\MovieRepository;
use Code\Repository\UserRepository;
use Code\Service\Movie_userService;
use Code\Service\MovieService;

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'bootstrap.php';

/*$MovieRepo = new MovieRepository(Database::get());
$UserRepo = new Movie_userRepository(Database::get());
$service = new Movie_userService($UserRepo,$MovieRepo);


$movie_user  = new Movie_user([]);
$movie_user->setId_movie(10);
$movie_user->setId_user(2);
$movie_user->setPersonal_ranking(1);
$movie_user->setWatch_state(true);
$movie_user->setComment("putain");

//print_r($movie_user);

$service->delete($movie_user);*/

$repo = new Movie_imageRepository(Database::get());

/*$movie_image = new Movie_image([]);
$movie_image->setId_movie(2);
$movie_image->setImage(file_get_contents("F:\\fusee.png"));

$repo->insert($movie_image);*/
$image = $repo->findOne(20);
?>

 <img id="card-img" <?= 'src="data:image/jpg;charset=utf8;base64,'. base64_encode($image->getImage()).'"' ?> alt="imageMovie">