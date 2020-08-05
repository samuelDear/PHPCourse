<?php 
    ini_set('display_errors', 1);
    ini_set('display_starup_error',1);
    error_reporting(E_ALL);

    require_once('../vendor/autoload.php');

    session_start();

    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/..');
    $dotenv->load();

    use Illuminate\Database\Capsule\Manager as Capsule;
    use Aura\Router\RouterContainer;

    $capsule = new Capsule;

    $capsule->addConnection([
      'driver'    => 'mysql',
      'host'      => getenv('DB_HOST'),
      'database'  => getenv('DB_NAME'),
      'username'  => getenv('DB_USER'),
      'password'  => getenv('DB_PASS'),
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => '',
    ]);

    // Make this Capsule instance available globally via static methods... (optional)
    $capsule->setAsGlobal();
    // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
    $capsule->bootEloquent();

    $request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
        $_SERVER,
        $_GET,
        $_POST,
        $_COOKIE,
        $_FILES
    );

    $routerContainer = new RouterContainer();
    $map = $routerContainer->getMap();
    $map->get('index', '/PHPCourse/', [
        'controller' => 'App\Controllers\IndexController',
        'action' => 'indexAction'
    ]);
    $map->get('addJobs', '/PHPCourse/jobs/add', [
        'controller' => 'App\Controllers\JobsController',
        'action' => 'getAddJobAction',
        'auth' => true
    ]);
    $map->get('addProjects', '/PHPCourse/project/add', [
        'controller' => 'App\Controllers\ProjectController',
        'action' => 'getAddProjectAction',
        'auth' => true
    ]);

    $map->post('saveJobs', '/PHPCourse/jobs/add', [
        'controller' => 'App\Controllers\JobsController',
        'action' => 'getAddJobAction'
    ]);
    $map->post('saveProjects', '/PHPCourse/project/add', [
        'controller' => 'App\Controllers\ProjectController',
        'action' => 'getAddProjectAction'
    ]);
    $map->get('createUsers', '/PHPCourse/users/add', [
        'controller' => 'App\Controllers\UserController',
        'action' => 'create',
        'auth' => true
    ]);
    $map->post('storeUsers', '/PHPCourse/users/add', [
        'controller' => 'App\Controllers\UserController',
        'action' => 'store'
    ]);

    $map->get('loginForm', '/PHPCourse/login', [
        'controller' => 'App\Controllers\AuthController',
        'action' => 'getLogin'
    ]);

    $map->get('logout', '/PHPCourse/logout', [
        'controller' => 'App\Controllers\AuthController',
        'action' => 'getLogout'
    ]);
    
    $map->post('auth', '/PHPCourse/auth', [
        'controller' => 'App\Controllers\AuthController',
        'action' => 'postLogin'
    ]);

    $map->get('admin', '/PHPCourse/admin', [
        'controller' => 'App\Controllers\AdminController',
        'action' => 'getIndex',
        'auth' => true
    ]);

    $matcher = $routerContainer->getMatcher();
    $route = $matcher->match($request);

    if(!$route){
        echo 'No route';
    } else{
        $handlerData = $route->handler;
        
        $needsAuth = $handlerData['auth'] ?? false;
        $sessionUserId = $_SESSION['userId'] ?? null;

        if(!$sessionUserId && $needsAuth){
            echo 'Protected route';
            $controllerName = 'App\Controllers\AuthController';
            $actionName = "getLogin";
        }else{
            $controllerName = $handlerData['controller'];
            $actionName = $handlerData['action'];
        }

        $controller = new $controllerName;
        $response = $controller->$actionName($request);
        //require($route->handler);

        foreach($response->getHeaders() as $name => $values){
            foreach($values as $value){
                header(sprintf('%s: %s',$name, $value), false);
            }
        }

        http_response_code($response->getStatusCode());
        echo $response->getBody();
    }

    //var_dump($route->handler);

    //$route = $_GET['route'] ?? '/';

    /*if($route == '/'){
        require('../index.php');
    }else if($route == 'addJob'){
        require('../addJob.php');
    }else if($route == 'addProject'){
        require('../addProject.php');
    }*/

    function printElement($job){
      //if($job->visible){
        echo '<li class="work-position">';
        echo '<h5>'.$job->title.'</h5>';
        echo '<p>'.$job->dsc.'</p>';
        echo '<p>'.$job->getDurationAsString().'</p>';
        echo '<strong>Achievements:</strong>';
        echo '<ul>';
        echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
        echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
        echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
        echo '</ul>';
        echo '</li>';
      //}
    }

?>