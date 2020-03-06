<?php

namespace nm\controllers\error;

use nm\Config;
use lib\http\StatusCode;
use lib\route\Controller;
use lib\route\Request;
use lib\route\Response;

/**
 * Class ErrorController.
 *
 * @package nm\controller\error
 * @author Daniel Peters
 * @version 1.0
 */
class ErrorController implements Controller {
  public function get401 (Request $request, Response $response): void {
    $response->setStatus(StatusCode::UNAUTHORIZED);
    $response->render('error', [
      'lang' => Config::APP_LOCALE,
      'title' => $response->getStatus() . ' Unauthorized',
      'navigation' => '',
      'css' => '',
      'message' => 'You are not allowed to access the page"' . $request->getUri() . '".',
      'scripts' => ''
    ]);
  }

  public function get404 (Request $request, Response $response): void {
    $response->setStatus(StatusCode::NOT_FOUND);
    $response->render('error', [
      'lang' => Config::APP_LOCALE,
      'title' => $response->getStatus() . ' Not Found',
      'navigation' => '',
      'css' => '',
      'message' => 'Oops. Note Man could not fetch the page"' . $request->getUri() . '".',
      'scripts' => ''
    ]);
  }
}
