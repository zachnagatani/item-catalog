CREATE TABLE categories (
    id int UNSIGNED AUTO_INCREMENT,
    categoryName varchar(255) NOT NULL,
    PRIMARY KEY(id),
    UNIQUE(categoryName)
);

CREATE TABLE items (
    id int UNSIGNED AUTO_INCREMENT,
    itemName varchar(255) NOT NULL,
    categoryID int UNSIGNED NOT NULL,
    timeAdded TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY(categoryID) REFERENCES categories(id)
);