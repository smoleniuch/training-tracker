<?php
require_once("core/init.php");

$user = new User();


$router = new Router();


$router->bind('/panel', 'GET', function() {
    $panelController = new PanelController();
    return $panelController->displayPanel();
});

$router->bind('/profile', 'GET', function() {
    $profileController = new ProfileController();
    return $profileController->displayProfile();
});


if($layout = $router->runUrl($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'])){

  echo $layout;

}
//default
else{

  echo $router->runUrl("login.php","GET");

}

?>
