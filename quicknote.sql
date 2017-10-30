CREATE DATABASE IF NOT EXISTS quicknote;
USE quicknote;
CREATE TABLE IF NOT EXISTS user (
  id        SERIAL,
  firstName VARCHAR(255) NOT NULL,
  lastName  VARCHAR(255) NOT NULL,
  userName  VARCHAR(255) NOT NULL,
  email     VARCHAR(255) NOT NULL,
  password  VARCHAR(255) NOT NULL,

  UNIQUE (email),
  PRIMARY KEY (id)
);
CREATE TABLE IF NOT EXISTS team (
  id       SERIAL,
  teamName VARCHAR(255) NOT NULL,

  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS note (
  id        SERIAL,
  noteTitle VARCHAR(255)    NOT NULL,
  noteText  TEXT            NOT NULL,
  fkTeam    BIGINT UNSIGNED NOT NULL,

  PRIMARY KEY (id),
  FOREIGN KEY (fkTeam) REFERENCES team (id)
);

CREATE TABLE userTeam (
  id      SERIAL,
  fkUser  BIGINT UNSIGNED NOT NULL,
  fkGroup BIGINT UNSIGNED NOT NULL,

  PRIMARY KEY (id),
  FOREIGN KEY (fkUser) REFERENCES user (id),
  FOREIGN KEY (fkGroup) REFERENCES team (id)
);