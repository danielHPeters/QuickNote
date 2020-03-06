<?php

namespace nm;

use function file_exists;
use function spl_autoload_register;
use function str_replace;

/**
 * Class AutoLoader.
 * Use this if you can't or don't want to use the composer autoloader. In that case you also need to register
 * the autoloader from the external library.
 *
 * @package nm
 * @author Daniel Peters
 * @version 1.0
 */
class AutoLoader {
  public static function register (): void {
    spl_autoload_register(function (string $class) {
      $file = __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';

      if (file_exists($file)) {
        require $file;
      }
    });
  }
}
