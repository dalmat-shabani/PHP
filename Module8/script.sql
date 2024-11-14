--Create the categories table
CREATE TABLE categories (
    id INTEGER , PRIMARY KEY, --This is the primary key and is the type of INTEGER
    name VARCHAR(255) NOT NULL --this column is the type of VARCHAR(255  and cannot be null
);

--Create the products table
CREATE TABLE products(
    id INTEGER , PRIMARY KEY, --This is the primary key and is the type of INTEGER
    name VARCHAR(255) NOT NULL, --this column is the type of VARCHAR(255  and cannot be null
    category_id INTEGER NOT NULL,--This column is the type INTEGER and cannot be NULL
    FOREIGN KEY(category_id) REFERENCES categories(id)--This column is a foreign key that references the id column in the ctaegories table
);

--Insert data into the categories table
INSERT INTO ctaegories (id, name) VALUES
(1, 'Fruit'),
(2, 'Bakery'),
(3, 'Dry Goods'),
(4, 'Vegetables');

--Insert data into the products table
INSERT INTO products(id, name, category_id) VALUES
(1, 'Apples', 1),
(2, 'Bannanas', 1),
(3, 'Oranges', 1),
(4, 'Strawberries', 1),
(5, 'Bread', 2),
(6, 'Cake', 2),
(7, 'Cookies', 2),
(8, 'Pasta', 3),
(9, 'Rice', 3),
(10, 'Cereal', 3);
