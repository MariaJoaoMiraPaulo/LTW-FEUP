CREATE TABLE restaurant (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	OwnerID INTEGER,
	name VARCHAR NOT NULL,
	address VARCHAR,
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
	gender VARCHAR,
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


INSERT INTO restaurant VALUES (NULL, NULL,'CasaDOro', 'Rua Cais das Pedras,15 4050-46','Porto','http://www.gull.pt/','Almoço','Sushi',' 12:30 to 18:00, 19:30 to 01:00','€70 for two people','4');
INSERT INTO restaurant VALUES (NULL, NULL,'Cafeína', 'Rua do Padrão, 100, Foz','Porto','http://www.cafeina.pt/','Jantar','Mediterrânia',' 12:30 to 18:00, 19:30 to 01:00','€70 for two people','4.5');
INSERT INTO restaurant VALUES (NULL, 1, 'Portarossa', 'Rua de Corte Real, 289, Foz','Porto','http://www.cafeina.pt/pt/Portarossa','Almoço','Mediterrânia',' 12:30 to 18:00, 19:30 to 01:00','€40 for two people','4');

