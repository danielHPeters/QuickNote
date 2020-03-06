<?php
namespace nm;

/**
 * Application configuration.
 *
 * @package nm
 * @author Daniel Peters
 * @version 1.0
 */
class Config {
  const APP_NAME = 'Quick Note by Note Masters';
  const APP_HOST = 'localhost';
  const APP_ROOT = __DIR__ . '/../../';
  const APP_LOCALE = 'en-us';
  const SERVER_HTTP_VERSION = 'HTTP/1.1';
  const PUBLIC_DIR = self::APP_ROOT . 'public/';
  const GALLERY_DIR = Config::PUBLIC_DIR . 'img/gallery/';
  const DOCUMENTS_DIR = Config::PUBLIC_DIR . 'docs/';
  const VIEWS = __DIR__ . '/../view';
  const LOGS = self::APP_ROOT . 'logs/';
  const DEFAULT_LOGFILE = self::LOGS . 'application.log';

  const DB_DRIVER = 'mysql';
  const DB_HOST = 'localhost';
  const DB_DATABASE_NAME = 'quick_note';
  const DB_USER = 'root';
  const DB_PASSWORD = '';
  const DB_PORT = 3306;
  const DB_CHARSET = 'utf8mb4';
}
