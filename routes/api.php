<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


















































































































Route::resource('alert_types', 'AlertTypeAPIController');

Route::resource('alerts', 'AlertsAPIController');

Route::resource('calendar_services', 'CalendarServiceAPIController');

Route::resource('chats', 'ChatAPIController');

Route::resource('client_types', 'ClientTypeAPIController');

Route::resource('clients', 'ClientsAPIController');

Route::resource('companies', 'CompanyAPIController');

Route::resource('config_tables', 'ConfigTableAPIController');

Route::resource('employees', 'EmployeeAPIController');

Route::resource('employee_types', 'EmployeeTypeAPIController');

Route::resource('log_types', 'LogTypeAPIController');

Route::resource('notifications', 'NotificationAPIController');

Route::resource('packages', 'PackageAPIController');

Route::resource('payment_methods', 'PaymentMethodAPIController');

Route::resource('payment_method_enableds', 'PaymentMethodEnabledAPIController');

Route::resource('route_points', 'RoutePointsAPIController');

Route::resource('services', 'ServiceAPIController');

Route::resource('service_plans', 'ServicePlanAPIController');

Route::resource('service_ratings', 'ServiceRatingsAPIController');

Route::resource('service_types', 'ServiceTypeAPIController');

Route::resource('surveys', 'SurveyAPIController');

Route::resource('survey_contacts', 'SurveyContactAPIController');

Route::resource('system_logs', 'SystemLogAPIController');

Route::resource('user_types', 'UserTypeAPIController');

Route::resource('vehicles', 'VehiclesAPIController');

Route::resource('vehicles_types', 'VehiclesTypeAPIController');

Route::resource('chats', 'ChatAPIController');

Route::resource('rel_client_payment_methods', 'RelClientPaymentMethodAPIController');

Route::resource('rel_service_employees', 'RelServiceEmployeeAPIController');