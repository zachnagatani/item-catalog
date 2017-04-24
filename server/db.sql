CREATE TABLE categories (
    categoryName varchar(255) NOT NULL,
    PRIMARY KEY(categoryName)
);

CREATE TABLE items (
    id int UNSIGNED AUTO_INCREMENT,
    itemName varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
    categoryName varchar(255) UNSIGNED NOT NULL,
    timeAdded TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY(categoryName) REFERENCES categories(categoryName)
);