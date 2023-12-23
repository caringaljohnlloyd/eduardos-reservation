<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/getData','MainController::getData');
$routes->get('/getDataShop','MainController::getDataShop');
$routes->post('/saveShop','MainController::saveShop');
$routes->post('/register','MainController::register');
$routes->post('/del','MainController::del');
$routes->post('update/(:num)', 'MainController::update/$1');
$routes->match(['post','get'],'/login', 'MainController::login');
$routes->post('/submit-feedback', 'MainController::submitFeedback');
$routes->post('save', 'MainController::save');
$routes->post('/logout', 'MainController::logout');
$routes->post('/getCart', 'MainController::Cart');
$routes->get('/getProd/(:num)', 'MainController::getCart/$1');
$routes->get('/getRoom','MainController::getRoom');
$routes->get('/getShop','MainController::getShop');
$routes->get('/getPool','MainController::getPool');
$routes->get('/getManifest','MainController::getManifest');
$routes->post('manifest','MainController::manifest');
$routes->post('updateCartQuantity', 'MainController::updateCartQuantity');
$routes->get('/getFeedback','MainController::getFeedback');
$routes->post('booking','MainController::booking');
$routes->get('/getbook','MainController::getbook');
$routes->post('/submit-rating','MainController::submitRating');
$routes->post('/checkout', 'MainController::checkout');
$routes->get('/search/(:any)', 'MainController::search/$1');
$routes->get('/getInvoice','MainController::getInvoice');
$routes->put('updateQuantity/(:num)', 'MainController::updateQuantity/$1');
$routes->post('updateQuantity', 'MainController::updateQuantity');
$routes->get('api/auditHistory/(:num)', 'MainController::getAuditHistory/$1');
$routes->post('/api/feedback/delete/(:num)', 'MainController::deleteFeedback/$1');
$routes->post('/accept-booking/(:num)', 'MainController::acceptBooking/$1');
$routes->post('/mark-as-paid/(:num)', 'MainController::markAsPaid/$1');
$routes->get('/getInvoices/(:num)', 'MainController::getInvoices/$1');
$routes->get('/getImage/(:segment)', 'MainController::getImage/$1');
$routes->post('/saveShop', 'MainController::saveShop');
$routes->put('/updateShop/(:num)', 'MainController::updateShop/$1');
$routes->put('/updateRoom/(:num)', 'MainController::updateRoom/$1');
$routes->get('/getStaff','MainController::getStaff');
$routes->post('/saveStaff', 'MainController::saveStaff');
$routes->put('/updateStaff/(:num)', 'MainController::updateStaff/$1');
$routes->delete('/deleteStaff/(:num)', 'MainController::deleteStaff/$1');
$routes->delete('/deleteShop/(:num)', 'MainController::deleteShop/$1');
$routes->delete('/deleteRoom/(:num)', 'MainController::deleteRoom/$1');
$routes->post('/api/feedback/hide/(:num)', 'MainController::deleteFeedback/$1');
$routes->post('/api/staffback/hide/(:num)', 'MainController::hideStaff/$1');
$routes->post('/checkoutpos', 'MainController::checkoutpos');
$routes->post('/saveRoom', 'MainController::saveRoom');
$routes->get('/api/user-orders', 'MainController::getUserOrders');
$routes->post('/api/mark-order-paid/(:num)', 'MainController::markOrderPaid/$1');
$routes->post('/api/confirm-order/(:num)', 'MainController::confirmOrder/$1');
$routes->post('/api/decline-booking/(:num)', 'MainController::declineBooking/$1');
$routes->post('/api/decline-order/(:num)', 'MainController::declineOrder/$1');
$routes->get('getNotif', 'MainController::getNotifications');


$routes->group('api', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->post('reset-password', 'MainController::resetPassword');
});
$routes->group('api', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->post('update-password', 'MainController::updatePassword');
});







