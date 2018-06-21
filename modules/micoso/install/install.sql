CREATE TABLE IF NOT EXISTS ps_micoso (id_micoso int(11) NOT NULL AUTO_INCREMENT, 
id_product int(11) NOT NULL,namen VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, grade tinyint(1) NOT NULL, 
comment text NOT NULL,date_add datetime NOT NULL,PRIMARY KEY(id_micoso)) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8