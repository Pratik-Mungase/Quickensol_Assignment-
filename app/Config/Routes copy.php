<?php

use CodeIgniter\Router\RouteCollection;

#######################################
# GLOBAL VARIABLES
#######################################

$namespace_string;
$redirect_path;

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php'))
    require SYSTEMPATH . 'Config/Routes.php';

# Set the Base Route for Faster Access
$routes->get('/', '\App\Modules\Dashboard\Controllers\Dashboard::index');

/**
 *  Documentation for Routes
 *      Consider
 *          URI is demotest/test/fnname
 *              searches for Module Demotest, Controller Test, Function fnname
 *          URI is demotest/test
 *              searches for Module Demotest, Controller Test, Function index
 *              if not found then, will search for Module Demotest, Controller Demotest, function index 
 *          URI is demotest
 *              searches for Module Demotest, Controller Demotest, Function index
 * 
 *          If nothing is found will redirect to path stored in UNAUTHORISED_ACCESS constant
 */
# Modify the Routes to accomodate above Logic for all other Links
if (isset($_SERVER['PATH_INFO'])) {
    if (fileExists(APPPATH . 'Modules')) {
        $path = explode('/', trim($_SERVER['PATH_INFO'], '/'));
        # Step modified to Search for Actual Path instead of Namespaced One 
        $base_module_path = implode('/', [rtrim(APPPATH, '/'), 'Modules', ucfirst($path[0]), 'Controllers']);
        if (fileExists($base_module_path)) {
            $namespace_string = $path[0];
            $redirect_path = $base_module_path;
            
            if (isset($path[1]) and fileExists($base_module_path . '/' . ucfirst($path[1]) . '.php')) {
                $namespace_string .= '/' . $path[1];
                $redirect_path .= '\\' . ucfirst($path[1]) . '::';
                if (isset($path[2])) {
                    $namespace_string .= '/' . $path[2];
                    $redirect_path .= lcfirst($path[2]);
                } else
                    $redirect_path .= 'index';
            } else {
                //The Controller should be the Name of the Module
                $redirect_path .= '/' . ucfirst($path[0]) . '::';
                if (isset($path[1]))
                    $redirect_path .= lcfirst($path[1]);
                else
                    $redirect_path .= 'index';
            }
        } else {
            $routes->setDefaultNamespace('App\Controllers');
            $routes->setDefaultController('');
            $routes->setDefaultMethod('index');
            $routes->setTranslateURIDashes(false);
            $routes->set404Override();
            $routes->setAutoRoute(true);
            return;
        }
        
        # Extra Step Added to Accomodate the Added APPPATH, because Controller is searched in Namespace (Add \ to avoid confusion of the System)
        $redirect_path = '\App\\' . trim(implode('\\', explode('/', ltrim($redirect_path, APPPATH))), '\\');
        
        # Set the Base Route, and match any other String Beyond It
        $routes->add($namespace_string, $redirect_path);
        $routes->add($namespace_string . '/(:any)', $redirect_path . '/$1');
        return;
    }
}

//This is the default Controller and Method
$routes->setDefaultNamespace('App\Modules\Dashboard\Controllers');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';