use heroku_6639abf7d3c0725;
create table if not exists `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  primary key (`id`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

