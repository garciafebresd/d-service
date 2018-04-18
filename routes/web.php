<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return redirect('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('alertTypes', 'AlertTypeController');

Route::resource('alerts', 'AlertsController');

Route::resource('calendarServices', 'CalendarServiceController');

Route::resource('chats', 'ChatController');

Route::resource('clientTypes', 'ClientTypeController');

Route::resource('clients', 'ClientsController');

Route::resource('companies', 'CompanyController');

Route::resource('configTables', 'ConfigTableController');

Route::resource('employees', 'EmployeeController');

Route::resource('employeeTypes', 'EmployeeTypeController');

Route::resource('logTypes', 'LogTypeController');

Route::resource('notifications', 'NotificationController');

Route::resource('packages', 'PackageController');

Route::resource('paymentMethods', 'PaymentMethodController');

Route::resource('paymentMethodEnableds', 'PaymentMethodEnabledController');

Route::resource('routePoints', 'RoutePointsController');

Route::resource('services', 'ServiceController');

Route::resource('servicePlans', 'ServicePlanController');

Route::resource('serviceRatings', 'ServiceRatingsController');

Route::resource('serviceTypes', 'ServiceTypeController');

Route::resource('surveys', 'SurveyController');

Route::resource('surveyContacts', 'SurveyContactController');

Route::resource('systemLogs', 'SystemLogController');

Route::resource('userTypes', 'UserTypeController');

Route::resource('vehicles', 'VehiclesController');

Route::resource('vehiclesTypes', 'VehiclesTypeController');

Route::resource('chats', 'ChatController');

Route::resource('relClientPaymentMethods', 'RelClientPaymentMethodController');

Route::resource('relServiceEmployees', 'RelServiceEmployeeController');