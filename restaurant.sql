CREATE TABLE restaurant (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name VARCHAR,
	adress VARCHAR,
	location VARCHAR,
	website VARCHAR,
	services VARCHAR,
	category VARCHAR,
	openHours VARCHAR,
	price INTEGER,
	rating INTEGER
);

CREATE TABLE users (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
  username VARCHAR,
	fullName VARCHAR,
	birthDate VARCHAR,
	photoId VARCHAR,
	type VARCHAR,
  password VARCHAR
);

CREATE TABLE comments (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	restaurant_id INTEGER REFERENCES restaurant,
	id_autor INTEGER REFERENCES users,
	title VARCHAR,
	userRate INTEGER,
	text VARCHAR
);


INSERT INTO restaurant VALUES (NULL, 'Gull', 'Rua Cais das Pedras,15 4050-46','Porto','http://www.gull.pt/','Almoço','Sushi',' 12:30 to 18:00, 19:30 to 01:00','€70 for two people','4');
INSERT INTO restaurant VALUES (NULL, 'Cafeína', 'Rua do Padrão, 100, Foz','Porto','http://www.cafeina.pt/','Jantar','Mediterrânia',' 12:30 to 18:00, 19:30 to 01:00','€70 for two people','4.5');
INSERT INTO restaurant VALUES (NULL, 'Portarossa', 'Rua de Corte Real, 289, Foz','Porto','http://www.cafeina.pt/pt/Portarossa','Almoço','Mediterrânia',' 12:30 to 18:00, 19:30 to 01:00','€40 for two people','4');

INSERT INTO comments VALUES (NULL, 1, 'Joana Ramos','Mediano',3,'O restaurante é bonito e o serviço irrepreensível. As tres estrelas são mesmo pela comida. O sushi não vale o preço, sem dúvida! E a massa com camarão trigre é um prato quase triste (pela conjugação do preço, qualidade e quantidade). Recomendaria apenas pela simpatia, pela sangria e pelo espaço.');
INSERT INTO comments VALUES (NULL, 1, 'Jorge Amaral','Vista',5, 'Gostaria de realçar a vista privilegiada sobre o rio Douro que este restaurante nos possibilita. Relativamente à refeição em si, nada demais, sushi bom, vinho excelente e sobremesas incríveis. A repetir');
