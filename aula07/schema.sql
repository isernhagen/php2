create database sistema;

	USE sistema;

	create table users(
		id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		login VARCHAR(32) NOT NULL,
		password VARCHAR(64) NOT NULL,
		email VARCHAR(64),
		PRIMARY KEY(id)
	);

	INSERT INTO users VALUES (1, 'rodrigo', MD5('milenium'), 'rodrigo@milenium.com.br');
	INSERT INTO users VALUES (2, 'ricardo', MD5('milenium'), 'ricardo@milenium.com.br');
	INSERT INTO users VALUES (3, 'antonio', MD5('milenium'), 'antonio@milenium.com.br');
	INSERT INTO users VALUES (4, 'joao', MD5('milenium'), 'joao@milenium.com.br');
	INSERT INTO users VALUES (5, 'severino', MD5('milenium'), 'severino@milenium.com.br');
	INSERT INTO users VALUES (6, 'pedro', MD5('milenium'), 'pedro@milenium.com.br');
	INSERT INTO users VALUES (7, 'augusto', MD5('milenium'), 'augusto@milenium.com.br');
	INSERT INTO users VALUES (8, 'teste', MD5('milenium'), 'teste@milenium.com.br');
	INSERT INTO users VALUES (9, 'root', MD5('milenium'), 'root@milenium.com.br');
	INSERT INTO users VALUES (10, 'admin', MD5('milenium'), 'admin@milenium.com.br');
	

