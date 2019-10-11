use heroku_6639abf7d3c0725;
create table if not exists `networth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(6) NOT NULL,
  `liabilities` double NOT NULL,
  `assets` double NOT NULL,
  `networth` double NOT NULL,
  PRIMARY KEY (`id`), `user_id` INT(11), INDEX `user_id`(`user_id`),
	FOREIGN KEY (`user_id`)
	REFERENCES `users`(`id`)
	ON DELETE CASCADE ON UPDATE cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




//username
bf719ff1122979
 //host
us-cdbr-iron-east-02.cleardb.net
-- //password
f2612284