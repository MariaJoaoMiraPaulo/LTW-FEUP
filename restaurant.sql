CREATE TABLE restaurant (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	OwnerID INTEGER NOT NULL REFERENCES users,
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
