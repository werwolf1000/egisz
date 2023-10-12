CREATE TABLE app.sellers (
                            `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                            `name` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
                            `phone` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
                            `version` INT(10) UNSIGNED NOT NULL,
                            `created_at` date NOT NULL,
                            PRIMARY KEY (`id`) USING BTREE
)COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB;

LOAD DATA INFILE "/var/dump/sellers.csv"
REPLACE INTO TABLE app.sellers
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
ESCAPED BY '"'
LINES TERMINATED BY '\n'
(@id, @name, @version, @phone)
SET name=@name, phone=@phone, version=@version


