<?php

namespace nm;

use nm\controllers\error\ErrorController;
use nm\controllers\home\IndexController;
use lib\application\ApplicationWeb;
use lib\database\Configuration;
use lib\http\StatusCode;
use lib\route\Router;

/**
 * Class App.
 *
 * @package nm
 * @author Daniel Peters
 * @version 1.0
 */
class App extends ApplicationWeb {
  protected function configureSettings (): void {
    $this->logDestination = Config::DEFAULT_LOGFILE;
    $this->viewsPath = Config::VIEWS;
    $this->config = new Configuration(
      Config::DB_DRIVER,
      Config::DB_HOST,
      Config::DB_DATABASE_NAME,
      Config::DB_USER,
      Config::DB_PASSWORD,
      Config::DB_PORT,
      Config::DB_CHARSET
    );
  }

  protected function configureRoutes (Router $router): void {
    // Start render routes block
    $router->get('', IndexController::class . '#index');
    // End render routes block

    // Start API routes block
    // End API routes block

    // Start error routes block
    $router->setErrorHandler(StatusCode::NOT_FOUND, ErrorController::class . '#get404');
    $router->setErrorHandler(StatusCode::UNAUTHORIZED, ErrorController::class . '#get401');
    // End error routes block
  }
}
