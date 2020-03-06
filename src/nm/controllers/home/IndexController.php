<?php

namespace nm\controllers\home;

use lib\route\Controller;
use lib\route\Request;
use lib\route\Response;
use lib\util\Locale;
use nm\Config;

/**
 * Class IndexController.
 *
 * @package nm\controller\index
 * @author Daniel Peters
 * @version 1.0
 */
class IndexController implements Controller {
  public function index (Request $request, Response $response): void {
    $response->render("layout", ["title" => Config::APP_NAME, "lang" => Locale::EN_US]);
  }
}
