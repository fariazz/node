<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "index"; 
$route['404_override'] = ''; 

$route['profile'] = 'index/profile'; 
$route['clubInUse'] = 'index/clubInUse'; 
$route['scheduledMatches'] = 'index/scheduledMatches'; 
$route['completedMatches'] = 'index/completedMatches'; 
$route['addResultList'] = 'index/addResultList'; 
$route['addResult'] = 'index/addResult'; 
$route['addResult/(:any)'] = 'index/addResult/$1'; 
$route['addResultList/(:any)/(:any)'] = 'index/addResultList/$1/$2'; 
$route['confirmResult'] = 'index/confirmResult'; 
$route['confirmResult/(:any)'] = 'index/confirmResult/$1'; 
$route['scheduledTrainings'] = 'index/scheduledTrainings'; 
$route['showUser/(:any)'] = 'index/showUser/$1'; 
$route['challengeForGame/(:any)'] = 'index/challengeForGame/$1'; 
$route['game/(:any)'] = 'index/game/$1'; 
$route['training/(:any)'] = 'index/training/$1'; 
$route['gameConfirmed/(:any)'] = 'index/gameConfirmed/$1'; 
$route['trainingConfirmed/(:any)'] = 'index/trainingConfirmed/$1'; 
$route['gameUpdated/(:any)'] = 'index/gameUpdated/$1'; 
$route['trainingUpdated/(:any)'] = 'index/trainingUpdated/$1'; 
$route['resultUpdated/(:any)'] = 'index/resultUpdated/$1'; 
$route['gameConfirm/(:any)'] = 'index/gameConfirm/$1'; 
$route['trainingConfirm/(:any)'] = 'index/trainingConfirm/$1'; 
$route['cancelGame/(:any)'] = 'index/cancelGame/$1'; 
$route['cancelTraining/(:any)'] = 'index/cancelTraining/$1'; 
$route['cancelled/(:any)'] = 'index/cancelled/$1'; 
$route['challengeForGame/(:any)'] = 'index/challengeForGame/$1'; 
$route['challengeForTraining/(:any)'] = 'index/challengeForTraining/$1'; 
$route['challengeForGame'] = 'index/challengeForGame'; 
$route['clubList'] = 'index/clubList'; 
$route['playerList'] = 'index/playerList'; 
$route['clubListMy'] = 'index/clubListMy'; 
$route['clubEdit/(:any)'] = 'index/clubEdit/$1'; 
$route['clubShow/(:any)'] = 'index/clubShow/$1'; 
$route['clubEdit'] = 'index/clubEdit'; 
$route['clubDelete/(:any)'] = 'index/clubDelete/$1'; 
$route['clubAdd'] = 'index/clubAdd'; 
$route['profile/(:any)'] = 'index/profile/$1'; 

$route['changePassword'] = 'index/changePassword'; 
$route['clientAccount'] = 'index/clientAccount'; 
$route['requestorAccount'] = 'index/requestorAccount'; 
$route['newClient'] = 'index/newClient'; 
$route['newRequestor'] = 'index/newRequestor'; 
$route['editClient/(:any)'] = 'index/editClient/$1'; 
$route['editRequestor/(:any)'] = 'index/editRequestor/$1'; 
$route['deleteClient/(:any)'] = 'index/deleteClient/$1'; 
$route['deleteRequestor/(:any)'] = 'index/deleteRequestor/$1'; 

$route['logout'] = 'auth/logout'; 
$route['emailNotValidated'] = 'auth/emailNotValidated'; 
$route['register'] = 'auth/register'; 
$route['setpassdone'] = 'auth/index/setpassdone'; 
$route['restorePassword'] = 'auth/restorePassword';
$route['restorePassword/(:any)'] = 'auth/restorePassword/$1';

$route['setpass/(:any)/(:any)'] = 'auth/setpass/$1/$2';
$route['setpass/(:any)'] = 'auth/setpass/$1';

$route['changePassword/(:any)'] = 'index/changePassword/$1'; 
$route['changePassword'] = 'index/changePassword'; 

$route['email/(:any)/(:any)'] = 'auth/email/$1/$2';















/*$route['qrnotfound'] = 'index/qrnotfound'; 
$route['addQr'] = 'index/addQr'; 
$route['searchQr'] = 'index/searchQr'; 
$route['searchQr/(:any)'] = 'index/searchQr/$1'; 
$route['showQr/(:any)'] = 'index/showQr/$1'; 
$route['getCountryCities/(:any)'] = 'index/getCountryCities/$1'; 
$route['mypages'] = 'user/mypages'; 
$route['settings'] = 'user/settings'; 
$route['changepass/(:any)'] = 'user/changepass/$1'; 
$route['changepass'] = 'user/changepass'; 
$route['logoutUser'] = 'login/logoutUser';
$route['restorepass'] = 'login/restorepass';
$route['restorepass/(:any)'] = 'login/restorepass/$1';
$route['setpass/(:any)/(:any)'] = 'login/setpass/$1/$2';
$route['setpass/(:any)'] = 'login/setpass/$1';

//$route['editpage'] = 'user/editpage';
$route['editpage/(:any)'] = 'user/editpage/$1';
$route['deactivatepage/(:any)'] = 'user/deactivatepage/$1';
$route['activatepage/(:any)'] = 'user/activatepage/$1';
$route['deletepage/(:any)'] = 'user/deletepage/$1';*/

/*

$multilanguageUriPattern = '^(\w{2})/';

foreach ($route as $routeRule => $routeDestination) {
    
    $routeRule = $multilanguageUriPattern.$routeRule;
    
    //set new rule to the route
    $route[$routeRule] = $routeDestination; 
}

//add mutlilanguage support to standart routing system
$route['^(\w{2})/(.*)$'] = '$2'; 
$route['^(\w{2})$'] = $route['default_controller']; */