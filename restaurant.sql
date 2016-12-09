  CREATE TABLE restaurant (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	OwnerID INTEGER,
	name VARCHAR UNIQUE NOT NULL,
	address VARCHAR,
	location VARCHAR,
	website VARCHAR,
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

CREATE TABLE reviews (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	restaurant_id INTEGER REFERENCES restaurant,
	id_autor INTEGER REFERENCES users,
	title VARCHAR,
	userRate INTEGER,
	text VARCHAR,
	date TEXT,
	likes INTEGER
);

CREATE TABLE comments (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	review_id INTEGER REFERENCES reviews,
	id_autor INTEGER REFERENCES users,
	text VARCHAR,
	date TEXT,
	likes INTEGER
);


CREATE TABLE categories (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	restaurant_id INTEGER REFERENCES restaurant,
	category VARCHAR
);

CREATE TABLE services (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	restaurant_id INTEGER REFERENCES restaurant,
	service VARCHAR
);


INSERT INTO restaurant VALUES (NULL, NULL,'casadoro', 'Rua Cais das Pedras,15 4050-46','Porto','http://www.gull.pt/',' 12:30 to 18:00, 19:30 to 01:00','70','4');
INSERT INTO restaurant VALUES (NULL, NULL,'cafeína', 'Rua do Padrão, 100, Foz','Porto','http://www.cafeina.pt/',' 12:30 to 18:00, 19:30 to 01:00','70','4.5');
INSERT INTO restaurant VALUES (NULL, 1, 'portarossa', 'Rua de Corte Real, 289, Foz','Porto','http://www.cafeina.pt/pt/Portarossa',' 12:30 to 18:00, 19:30 to 01:00','40','4');

INSERT INTO categories VALUES (NULL, 1, 'Sushi');
INSERT INTO categories VALUES (NULL, 1, 'Meditarrânia');
INSERT INTO categories VALUES (NULL, 1, 'Snacks');

INSERT INTO services VALUES (NULL, 1, 'Breakfast');
INSERT INTO services VALUES (NULL, 1, 'Lunch');

