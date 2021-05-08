<?php 
require_once './Data/config.php';
session_start();

$arr = [
    "/form1" => "Controller/MainController.php&action_index",
    "/form2" => "Controller/MainController.php&CallForm2",
    "/capcha2" => "Controller/MainController.php&GenerateNumCaptcha",
    "/verify" => "Controller/MainController.php&ValidateForm",
    "/" => "Controller/MainController.php&action_index",
];

$request = $_SERVER["REQUEST_URI"];
$root = $arr[$request];

if (!empty($root)) {
    $routerActions = explode("&", $root);
    $classAction = $routerActions[1] ?? null;
    $path = $routerActions[0] ?? null;
    preg_match("//(?P<class>\w*).php/", $path, $match);
    if (!empty($match['class']) && !empty($path) && !empty($classAction)) {
        require $path;
        $main_controller = new $match['class']();
        $form_object = $main_controller->$classAction();
    }
}

die;
?>