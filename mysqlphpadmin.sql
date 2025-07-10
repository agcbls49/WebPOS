USE webpos;
-- CREATE TABLE orderlisttable (
--     ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     Item varchar(150) NOT NULL,
--     Quantity int NOT NULL,
--     Price DECIMAL NOT NULL
-- );

INSERT INTO orderlisttable (ID, Item, Quantity, Price) VALUES (1, 'Hamburger', 1, 5.99);

SELECT * FROM orderlisttable;