CREATE TABLE restaurant (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	OwnerID INTEGER,
	name VARCHAR UNIQUE NOT NULL,
	address VARCHAR,
	location VARCHAR,
	website VARCHAR,
	openHour DATE,
	closeHour DATE,
	price INTEGER,
	phoneNumber VARCHAR,
	rating INTEGER
);

CREATE TABLE photo (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name VARCHAR UNIQUE NOT NULL,
	restaurant_id INTEGER REFERENCES restaurant
);

CREATE TABLE reviewPhoto (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name VARCHAR UNIQUE NOT NULL,
	restaurant_id INTEGER REFERENCES restaurant,
	review_id INTEGER REFERENCES reviews
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
	date DATE,
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
