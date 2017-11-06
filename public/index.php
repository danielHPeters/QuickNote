<?php

include '../../lib/AutoLoader.php';

use rafisa\lib\AutoLoader;
use rafisa\lib\view\View;
use rafisa\lib\routing\RoutesConfig;
use rafisa\lib\routing\RouteSimple;

AutoLoader::register();

session_start();

session_regenerate_id(true);

RoutesConfig::set('basePath', '');

RouteSimple::init();

RouteSimple::add('', function () {
    $navBar = new View(dirname(__FILE__) . '/../views/partials/', 'navbar');
    $navBar->load();
    $content = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
    sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam';
    $index = new View(dirname(__FILE__) . '/../views/', 'page');
    $index->setVar('charset', 'UTF-8');
    $index->setVar('pageTitle', 'QuickNote');
    $index->setVar('navbar', $navBar->getHtml());
    $index->setVar('title', 'Welcome to QuickNote');
    $index->setVar('content', $content);
    $index->setVar('footer', 'Made by Daniel Peters');
    $index->load();
    echo $index->getHtml();
});

RouteSimple::add('about', function () {
    $navBar = new View(dirname(__FILE__) . '/../views/partials/', 'navbar');
    $navBar->load();
    $content = 'QuickNote is a simple to use, highly efficient notes manager.';
    $about = new View(dirname(__FILE__) . '/../views/', 'page');
    $about->setVar('charset', 'UTF-8');
    $about->setVar('pageTitle', 'About');
    $about->setVar('navbar', $navBar->getHtml());
    $about->setVar('title', 'About QuickNote');
    $about->setVar('content', $content);
    $about->setVar('footer', 'Made by Daniel Peters');
    $about->load();
    echo $about->getHtml();
});

RouteSimple::add('notes', function () {
    $navBar = new View(dirname(__FILE__) . '/../views/partials/', 'navbar');
    $navBar->load();
    $noteBoard = new View(dirname(__FILE__) . '/../views/partials/', 'note-board');
    $noteBoard->load();
    $content = $noteBoard->getHtml();
    $about = new View(dirname(__FILE__) . '/../views/', 'page');
    $about->setVar('charset', 'UTF-8');
    $about->setVar('pageTitle', 'Notes');
    $about->setVar('navbar', $navBar->getHtml());
    $about->setVar('title', 'Your Notes');
    $about->setVar('content', $content);
    $about->setVar('footer', 'Made by Daniel Peters');
    $about->load();
    echo $about->getHtml();
});

RouteSimple::add('register', function () {
    $navBar = new View(dirname(__FILE__) . '/../views/partials/', 'navbar');
    $navBar->load();
    $noteBoard = new View(dirname(__FILE__) . '/../views/partials/', 'user-register-form');
    $noteBoard->load();
    $content = $noteBoard->getHtml();
    $about = new View(dirname(__FILE__) . '/../views/', 'page');
    $about->setVar('charset', 'UTF-8');
    $about->setVar('pageTitle', 'Register');
    $about->setVar('navbar', $navBar->getHtml());
    $about->setVar('title', 'Sign Up to QuickNote');
    $about->setVar('content', $content);
    $about->setVar('footer', 'Made by Daniel Peters');
    $about->load();
    echo $about->getHtml();
});

RouteSimple::add('login', function () {
    $navBar = new View(dirname(__FILE__) . '/../views/partials/', 'navbar');
    $navBar->load();
    $noteBoard = new View(dirname(__FILE__) . '/../views/partials/', 'login-form');
    $noteBoard->load();
    $content = $noteBoard->getHtml();
    $about = new View(dirname(__FILE__) . '/../views/', 'page');
    $about->setVar('charset', 'UTF-8');
    $about->setVar('pageTitle', 'Login');
    $about->setVar('navbar', $navBar->getHtml());
    $about->setVar('title', 'Log in to QuickNote');
    $about->setVar('content', $content);
    $about->setVar('footer', 'Made by Daniel Peters');
    $about->load();
    echo $about->getHtml();
});

RouteSimple::add('password', function () {
    $navBar = new View(dirname(__FILE__) . '/../views/partials/', 'navbar');
    $navBar->load();
    $noteBoard = new View(dirname(__FILE__) . '/../views/partials/', 'change-password-form');
    $noteBoard->load();
    $content = $noteBoard->getHtml();
    $about = new View(dirname(__FILE__) . '/../views/', 'page');
    $about->setVar('charset', 'UTF-8');
    $about->setVar('pageTitle', 'Change Password');
    $about->setVar('navbar', $navBar->getHtml());
    $about->setVar('title', 'Change your Password');
    $about->setVar('content', $content);
    $about->setVar('footer', 'Made by Daniel Peters');
    $about->load();
    echo $about->getHtml();
});

RouteSimple::add('password-change', function () {
    include dirname(__FILE__) . '/../services/change-password.php';
});

RouteSimple::add('user-login', function () {
    include dirname(__FILE__) . '/../services/login.php';
});

RouteSimple::add('user-register', function () {
    include dirname(__FILE__) . '/../services/add-user.php';
});

RouteSimple::add('logout', function () {
    include dirname(__FILE__) . '/../services/logout.php';
});

RouteSimple::add('change-password', function () {
    include dirname(__FILE__) . '/../services/change-password.php';
});

RouteSimple::add404(function (string $url) {
    $navBar = new View(dirname(__FILE__) . '/../views/partials/', 'navbar');
    $navBar->load();
    $content = 'Page ' . $url . ' not found';
    $error404 = new View(dirname(__FILE__) . '/../views/', 'page');
    $error404->setVar('charset', 'UTF-8');
    $error404->setVar('pageTitle', '404');
    $error404->setVar('navbar', $navBar->getHtml());
    $error404->setVar('title', 'ERROR 404');
    $error404->setVar('content', $content);
    $error404->setVar('footer', 'Made by Daniel Peters');
    $error404->load();

    // Send 404 Header
    header("HTTP/1.0 404 Not Found");
    echo $error404->getHtml();
});

RouteSimple::run();

session_write_close();
