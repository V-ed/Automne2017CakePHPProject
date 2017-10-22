-- CREATE THE SQLITE DATABASE AND PROCEED BY EXECUTING ALL OF THE FOLLOWING COMMANDS ONE BY ONE

CREATE TABLE `evidence_items` (
  `id` INTEGER NOT NULL,
  `description` TEXT NOT NULL,
  `origin` TEXT NOT NULL,
  `isSealed` BOOLEAN NOT NULL,
  `isDeleted` BOOLEAN NOT NULL DEFAULT '0',
  `officer_id` INTEGER NOT NULL,
  `user_id` INTEGER NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NOT NULL
);

CREATE TABLE `files` (
  `id` INTEGER NOT NULL,
  `name` TEXT DEFAULT NULL,
  `path` TEXT NOT NULL,
  `detail` TEXT NOT NULL,
  `evidence_item_id` INTEGER NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NOT NULL
);

CREATE TABLE `officers` (
  `id` INTEGER NOT NULL,
  `email` TEXT NOT NULL,
  `officer_rank_id` INTEGER NOT NULL,
  `user_id` INTEGER NOT NULL
);

CREATE TABLE `officer_ranks` (
  `id` INTEGER NOT NULL,
  `rank_code` TEXT NOT NULL,
  `rank_name` TEXT NOT NULL,
  `rank_description` TEXT DEFAULT NULL
);

CREATE TABLE `users` (
  `id` INTEGER NOT NULL,
  `isAdmin` BOOLEAN NOT NULL DEFAULT '0',
  `firstName` TEXT NOT NULL,
  `lastName` TEXT NOT NULL,
  `username` TEXT NOT NULL,
  `password` TEXT NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NOT NULL
);

-- NOW ADD ALL THE PRIMARY KEYS / FOREIGN KEYS
-- IF YOU DON'T, THE DATABASE WON'T BE STABLE
-- KEEP IN MIND THAT AUTO_INCREMENT IS NOT AUTOMATIC

INSERT INTO `users` (`id`, `isAdmin`, `firstName`, `lastName`, `username`, `password`, `created`, `modified`) VALUES
(1, 1, 'Hacker', 'Man', 'V-ed', '$2y$10$Jm375SURCwRBd5sM1iafK.N5fAjSdzALuwDiLfiBR4ME09G/PeD/6', '2017-09-30 01:23:50', '2017-10-01 00:08:07'),
(2, 0, 'Regular', 'Dude', 'user', '$2y$10$CAgT/v11TgyxNx0QBF6krOqKmK8y31c3nH9SoIp5l/ISyyzLqt9eO', '2017-10-01 21:22:47', '2017-10-01 21:24:00'),
(3, 0, 'John', 'McGregor', 'officer', '$2y$10$gg2kyIOeO7dbVekhqb7spOQAzPQKHDmqgLN23Tm9X9GdYJR2snKLi', '2017-10-03 20:48:23', '2017-10-03 20:48:23'),
(4, 1, 'Ronald', 'Bonchemin', 'admin', '$2y$10$G6pCoN8oGSWn92D/kccl/.H1sunuAHTMz8W79B9.sMmIMtKWgI/GO', '2017-10-03 20:52:17', '2017-10-03 20:52:38');

INSERT INTO `officer_ranks` (`id`, `rank_code`, `rank_name`, `rank_description`) VALUES
(1, 'sgt', 'Sergeant', 'Sergeant of the US Police Department'),
(2, 'of', 'Officer', 'The most basic rank available to officers.');

INSERT INTO `officers` (`id`, `email`, `officer_rank_id`, `user_id`) VALUES
(1, 'guillaumemarcoux@gmail.com', 1, 1),
(2, 'officer@gmail.com', 2, 3);

INSERT INTO `evidence_items` (`id`, `description`, `origin`, `isSealed`, `isDeleted`, `officer_id`, `user_id`, `created`, `modified`) VALUES
(1, 'Hammer', 'Tool', 1, 0, 1, 1, '2017-10-01 09:52:44', '2017-10-03 03:01:03');

INSERT INTO `files` (`id`, `name`, `path`, `detail`, `evidence_item_id`, `created`, `modified`) VALUES
(1, 'hammer.jpg', 'files', 'Hammer Image', 1, '2017-10-01 10:20:13', '2017-10-03 21:08:55');
