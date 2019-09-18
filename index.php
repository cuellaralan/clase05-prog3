<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
// include './funciones.php';
include './alumno.php';

$config ['displayErrorDetails'] = true;
$config ['addContentLengthHeader']= false; 
$app = new \Slim\App(["settings" => $config]);
// $app = new \Slim\App;

$app->get('/usuarios[/{name}]', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->post('/usuarios[/{name}]', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->group('/alumnos', function(){
    $this->get('/', function ( $request, $response, $args){
        $response->getBody()->write("Hola bienvenido a la apirest... Ingresa tu nombre");
    });

    $this->post('/', function ( $request, $response, $args){
        $response->getBody()->write("Hola bienvenido a la apirest... Ingresa tu nombre");
    });

    $this->get('/traer', function ( $request, $response, $args){
        $archivo = 'alumnos.txt';
        $alumnos = funciones::Listar($archivo);
        // var_dump($alumnos);
        foreach($alumnos as $obj){
            echo($obj['_nombre']);
            $al = new Alumno($obj['_nombre'], $obj['_apellido'], $obj['_legajo'], $obj['_foto']);
            $response->getBody()->write($al->datosPersona());
        }
        
        return $response;
    });
    
});

$app->run();

?>