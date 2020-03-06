CREATE DATABASE IF NOT EXISTS `quick_note`;
USE `quick_note`;

CREATE TABLE IF NOT EXISTS `users`
(
    `id`         CHAR(36)     NOT NULL,
    `first_name` VARCHAR(255) NOT NULL,
    `last_name`  VARCHAR(255) NOT NULL,
    `username`   VARCHAR(255) NOT NULL,
    `email`      VARCHAR(255) NOT NULL,
    `password`   VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    `updated_at` TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
    `deleted_at` TIMESTAMP             DEFAULT NULL,

    UNIQUE (`email`),
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `teams`
(
    `id`         CHAR(36)     NOT NULL,
    `name`       VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    `updated_at` TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
    `deleted_at` TIMESTAMP             DEFAULT NULL,

    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `boards`
(
    `id` CHAR(36) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `team_id` CHAR(36) NOT NULL,
    `created_at` TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    `updated_at` TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
    `deleted_at` TIMESTAMP             DEFAULT NULL,

    PRIMARY KEY (`id`),
    FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`)
);

CREATE TABLE IF NOT EXISTS `columns`
(
    `id` CHAR(36) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `board_id` CHAR(36) NOT NULL,
    `created_at` TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    `updated_at` TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
    `deleted_at` TIMESTAMP             DEFAULT NULL,

    PRIMARY KEY (`id`),
    FOREIGN KEY (`board_id`) REFERENCES `boards` (`id`)
);

CREATE TABLE IF NOT EXISTS `notes`
(
    `id`         CHAR(36)     NOT NULL,
    `title`      VARCHAR(255) NOT NULL,
    `content`    TEXT         NOT NULL,
    `column_id`    CHAR(36)     NOT NULL,
    `created_at` TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    `updated_at` TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
    `deleted_at` TIMESTAMP             DEFAULT NULL,

    PRIMARY KEY (`id`),
    FOREIGN KEY (`column_id`) REFERENCES `columns` (`id`)
);

CREATE TABLE `user_team`
(
    `id`         CHAR(36)  NOT NULL,
    `user_id`    CHAR(36)  NOT NULL,
    `team_id`    CHAR(36)  NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
    `deleted_at` TIMESTAMP          DEFAULT NULL,

    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
    FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`)
);
