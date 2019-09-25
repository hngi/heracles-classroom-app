use heroku_6639abf7d3c0725;
create table if not exists `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `password` varchar(1024) NOT NULL,
  primary key (`id`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO heroku_6639abf7d3c0725.users (`fullname`, `email`, `phone`, `password`) VALUES
('Akuagwu Philemon', 'phpmyadmin', '$2y$10$I5RL2sbB0WTg15Dm5fK4Q.dEVBOKdYtwc5ZUefaE3KFZL77/ncl8W', 'phpmyadmin'),
('Akuagwu Philemon', 'phpmyadmin', 'phpmyadmin', '$2y$10$ukMVxCNs3T0EFSqoluQBluNrfjR.SSy2hO.FH7U08DoceBQEAzg6W'),
('Akuagwu Philemon', 'phpmyadmin@gmail.com', 'phpmyadmin', '$2y$10$nGoMhHnhinGohjIAUoUI3ecci/hT9LulIqhXDkrLZI7NytFyiGv2K');

use heroku_6639abf7d3c0725;
create table if not exists `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `value` double NOT NULL,
  `date_added` date NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`), 
  `user_id` INT(11), 
  INDEX `user_id`(`user_id`),
	FOREIGN KEY (`user_id`)
	REFERENCES heroku_6639abf7d3c0725.users(`id`)
	ON DELETE CASCADE ON UPDATE cascade
) ENGINE=InnoDB DEFAULT CHARSET=latin1;