<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Dashboard::index');
// Add a route for the addYear method
$routes->get('add-year', 'YearController::addYear');
// Add a route for the year method (assuming it handles form submission)
$routes->post('add-year', 'YearController::year');
// Add a route for the yearlist method
$routes->get('yearlist', 'YearController::yearlist');
$routes->get('year/edit/(:num)', 'YearController::edit/$1');
$routes->post('year/update/(:num)', 'YearController::update/$1');
$routes->get('year/delete/(:num)', 'YearController::delete/$1');

$routes->get('add-darta', 'DartaController::addDarta');
$routes->get('list-darta', 'DartaController::dartalist');

// Route to display the Darta list using UserController

$routes->match(['get', 'post'], 'darta', 'DartaController::darta');
$routes->get('darta/delete/(:num)', 'DartaController::delete/$1');
$routes->get('darta/edit/(:num)', 'DartaController::edit/$1');
$routes->post('darta/update/(:num)', 'DartaController::update/$1');

//ChalaniRoutes
$routes->get('add-chalani', 'ChalaniController::addChalani');
$routes->get('list-chalani', 'ChalaniController::chalanilist');

// Route to display the Chalani list using UserController

$routes->match(['get', 'post'], 'chalani', 'ChalaniController::chalani');
$routes->get('chalani/delete/(:num)', 'ChalaniController::delete/$1');
$routes->get('chalani/edit/(:num)', 'ChalaniController::edit/$1');
$routes->post('chalani/update/(:num)', 'ChalaniController::update/$1');



$routes->get('dartachalani/dartaDetails/(:segment)', 'DartaController::dartaDetails/$1');
$routes->get('dartachalani/chalaniDetails/(:segment)', 'ChalaniController::chalaniDetails/$1');



// Routes for BewosayeController
$routes->get('add-bewosaye', 'BewosayeController::addBewosaye');
$routes->get('bewosaye-list', 'BewosayeController::bewosayeList');
$routes->post('bewosaye', 'BewosayeController::bewosaye');
$routes->get('bewosaye/edit/(:num)', 'BewosayeController::edit/$1');
$routes->post('bewosaye/update/(:num)', 'BewosayeController::update/$1');
$routes->get('bewosaye/delete/(:num)', 'BewosayeController::delete/$1');

//Print Busines
$routes->get('bewosaye/print/(:segment)', 'BewosayeController::print/$1');
//BewosayeDetails
$routes->get('bewosaye/bewosayeDetails/(:segment)', 'BewosayeController::bewosayeDetails/$1');

// Routes for ApangaController
$routes->get('add-apanga', 'ApangaController::addApanga');
$routes->get('apanga-list', 'ApangaController::apangaList');
$routes->post('apanga', 'ApangaController::apanga');
$routes->get('apanga/edit/(:num)', 'ApangaController::edit/$1');
$routes->post('apanga/update/(:num)', 'ApangaController::update/$1');
$routes->get('apanga/delete/(:num)', 'ApangaController::delete/$1');

//Print Apanga
$routes->get('aanga/print/(:segment)', 'ApangaController::print/$1');
//ApangaDetails
$routes->get('apanga/apangaDetails/(:segment)', 'ApangaController::apangaDetails/$1');

// Add a route for the addYear method
$routes->get('add-buscat', 'BuscatController::addCategory');
// Add a route for the year method (assuming it handles form submission)
$routes->post('add-buscat', 'BuscatController::buscat');
$routes->get('buscategorylist', 'BuscatController::buscatlist');
$routes->get('buscat/edit/(:num)', 'BuscatController::edit/$1');
$routes->post('buscat/update/(:num)', 'BuscatController::update/$1');
$routes->get('buscat/delete/(:num)', 'BuscatController::delete/$1');


// Add a route for the addWard method
$routes->get('add-ward', 'WardController::addWard');

// Add a route for the ward method (assuming it handles form submission)
$routes->post('add-ward', 'WardController::ward');

// Add a route for the wardlist method
$routes->get('wardlist', 'WardController::wardlist');
$routes->get('ward/edit/(:num)', 'WardController::edit/$1');
$routes->post('ward/update/(:num)', 'WardController::update/$1');
$routes->get('ward/delete/(:num)', 'WardController::delete/$1');

// Routes for AgriController
$routes->get('add-agri', 'AgriController::addagri');
$routes->get('agri-list', 'AgriController::agriList');
$routes->post('agri', 'AgriController::agri');
$routes->get('agri/edit/(:num)', 'AgriController::edit/$1');
$routes->post('agri/update/(:num)', 'AgriController::update/$1');
$routes->get('agri/delete/(:num)', 'AgriController::delete/$1');
//Print Agri
$routes->get('agri/print/(:segment)', 'AgriController::print/$1');
//AgriDetails
$routes->get('agri/agriDetails/(:segment)', 'AgriController::agriDetails/$1');

// Routes for ClubController
$routes->get('add-club', 'ClubController::addclub');
$routes->get('club-list', 'ClubController::clublist');
$routes->post('club', 'ClubController::club');
$routes->get('club/edit/(:num)', 'ClubController::edit/$1');
$routes->post('club/update/(:num)', 'ClubController::update/$1');
$routes->get('club/delete/(:num)', 'ClubController::delete/$1');
//Print Club
$routes->get('club/print/(:segment)', 'ClubController::print/$1');
//ClubDetails
$routes->get('club/clubDetails/(:segment)', 'ClubController::clubDetails/$1');

//Country, District && Municipality List in Forms
$routes->post('bewosaye/district', 'Dropdown::district');
$routes->post('bewosaye/municipality', 'Dropdown::municipality');

// Routes for SahakariController
$routes->get('add-sahakari', 'SahakariController::addsahakari');
$routes->get('sahakari-list', 'SahakariController::sahakarilist');
$routes->post('sahakari', 'SahakariController::sahakari');
$routes->get('sahakari/edit/(:num)', 'SahakariController::edit/$1');
$routes->post('sahakari/update/(:num)', 'SahakariController::update/$1');
$routes->get('sahakari/delete/(:num)', 'SahakariController::delete/$1');
//Print Sahakari
$routes->get('sahakari/print/(:segment)', 'SahakariController::print/$1');
//SahakariDetails
$routes->get('sahakari/sahakariDetails/(:segment)', 'SahakariController::sahakariDetails/$1');

// Routes for GhabargaController
$routes->get('add-ghabarga', 'GhabargaController::addghabarga');
$routes->get('ghabarga-list', 'GhabargaController::ghabargalist');
$routes->post('ghabarga', 'GhabargaController::ghabarga');
$routes->get('ghabarga/edit/(:num)', 'GhabargaController::edit/$1');
$routes->post('ghabarga/update/(:num)', 'GhabargaController::update/$1');
$routes->get('ghabarga/delete/(:num)', 'GhabargaController::delete/$1');
//Print Ghabarga
$routes->get('ghabarga/print/(:segment)', 'GhabargaController::print/$1');
//GhabargaDetails
$routes->get('ghabarga/ghabargaDetails/(:segment)', 'GhabargaController::ghabargaDetails/$1');

// Routes for WaterregController
$routes->get('add-waterreg', 'WaterregController::addwaterreg');
$routes->get('waterreg-list', 'WaterregController::waterreglist');
$routes->post('waterreg', 'WaterregController::waterreg');
$routes->get('waterreg/edit/(:num)', 'WaterregController::edit/$1');
$routes->post('waterreg/update/(:num)', 'WaterregController::update/$1');
$routes->get('waterreg/delete/(:num)', 'WaterregController::delete/$1');
//Print Waterreg
$routes->get('waterreg/print/(:segment)', 'WaterregController::print/$1');
//WaterregDetails
$routes->get('waterreg/waterregDetails/(:segment)', 'WaterregController::waterregDetails/$1');


// Routes for SamuhaController
$routes->get('add-samuha', 'SamuhaController::addsamuha');
$routes->get('samuha-list', 'SamuhaController::samuhaList');
$routes->post('samuha', 'SamuhaController::samuha');
$routes->get('samuha/edit/(:num)', 'SamuhaController::edit/$1');
$routes->post('samuha/update/(:num)', 'SamuhaController::update/$1');
$routes->get('samuha/delete/(:num)', 'SamuhaController::delete/$1');
//Print Samuha
$routes->get('samuha/print/(:segment)', 'SamuhaController::print/$1');
//SamuhaDetails
$routes->get('samuha/samuhaDetails/(:segment)', 'SamuhaController::samuhaDetails/$1');


$routes->post('bewosaye/district', 'Dropdown::district');
$routes->post('bewosaye/municipality', 'Dropdown::municipality');

/* Routes for Progress MIS */
// Routes for LawsDirectiveController
$routes->get('add-laws', 'LawDirectiveController::addlaw');
$routes->get('laws-list', 'LawDirectiveController::lawsList');
$routes->post('laws', 'LawDirectiveController::laws');
$routes->get('laws/edit/(:num)', 'LawDirectiveController::edit/$1');
$routes->post('laws/update/(:num)', 'LawDirectiveController::update/$1');
$routes->get('laws/delete/(:num)', 'LawDirectiveController::delete/$1');


// Routes for Employee
$routes->get('add-employee', 'EmployeeController::addemployee');
$routes->get('employee-list', 'EmployeeController::employeelist');
$routes->post('employee', 'EmployeeController::employee');
$routes->get('employee/edit/(:num)', 'EmployeeController::edit/$1');
$routes->post('employee/update/(:num)', 'EmployeeController::update/$1');
$routes->get('employee/delete/(:num)', 'EmployeeController::delete/$1');
$routes->get('employee/employeeDetails/(:segment)', 'EmployeeController::employeeDetails/$1');

// Routes for EducationMonthly Progress

$routes->get('edu-monthly', 'Progress\EduMonthlyController::index');
$routes->post('edu/saveData', 'Progress\EduMonthlyController::saveData');

$routes->get('/edu-monthly/getMonthData', 'Progress\EduMonthlyController::getMonthData');




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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
