CREATE TABLE restaurant (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name VARCHAR,
	adress VARCHAR,
	location VARCHAR,
	website VARCHAR,
	rating VARCHAR
);

CREATE TABLE comments (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	restaurant_id INTEGER REFERENCES restaurant,
	author VARCHAR,
	title VARCHAR,
	userRate VARCHAR,
	text VARCHAR
);

CREATE TABLE users (
  username VARCHAR PRIMARY KEY,
  password VARCHAR
);

INSERT INTO restaurant VALUES (NULL, 'Gull', 'Rua Cais das Pedras,15 4050-46','Porto','http://www.gull.pt/','4');

INSERT INTO comments VALUES (NULL, 1, 'Joana Ramos','Mediano',3,'O restaurante é bonito e o serviço irrepreensível. As tres estrelas são mesmo pela comida. O sushi não vale o preço, sem dúvida! E a massa com camarão trigre é um prato quase triste (pela conjugação do preço, qualidade e quantidade). Recomendaria apenas pela simpatia, pela sangria e pelo espaço.');
INSERT INTO comments VALUES (NULL, 1, 'Jorge Amaral','Vista',5, 'Gostaria de realçar a vista privilegiada sobre o rio Douro que este restaurante nos possibilita. Relativamente à refeição em si, nada demais, sushi bom, vinho excelente e sobremesas incríveis. A repetir');

INSERT INTO users VALUES ('admin', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'); -- Password is tested hashed with SHA 1
