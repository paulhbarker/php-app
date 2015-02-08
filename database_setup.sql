SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS system_users;
CREATE TABLE system_users
( user_id             INT UNSIGNED  PRIMARY KEY AUTO_INCREMENT
, username            VARCHAR(20)   UNIQUE NOT NULL
, last_name           VARCHAR(20)   NOT NULL
, first_name          VARCHAR(20)   NOT NULL
, email               VARCHAR(20)   UNIQUE NOT NULL
, password            VARCHAR(255)  NOT NULL
, rights              INT(1)        NOT NULL
, created_by          INT UNSIGNED  NOT NULL
, creation_date       DATE          NOT NULL
, last_updated_by     INT UNSIGNED  NOT NULL
, last_update_date    DATE          NOT NULL
, CONSTRAINT system_users_fk1 FOREIGN KEY (created_by) REFERENCES system_users (user_id)
, CONSTRAINT system_users_fk2 FOREIGN KEY (last_updated_by) REFERENCES system_users (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS categories;
CREATE TABLE categories 
( category_id         INT UNSIGNED  PRIMARY KEY AUTO_INCREMENT
, name                VARCHAR(50)   UNIQUE NOT NULL
, created_by          INT UNSIGNED  NOT NULL
, creation_date       DATE          NOT NULL
, last_updated_by     INT UNSIGNED  NOT NULL
, last_update_date    DATE          NOT NULL
, CONSTRAINT categories_fk1 FOREIGN KEY (created_by) REFERENCES system_users (user_id)
, CONSTRAINT categories_fk2 FOREIGN KEY (last_updated_by) REFERENCES system_users (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS payees;
CREATE TABLE payees 
( payee_id            INT UNSIGNED  PRIMARY KEY AUTO_INCREMENT
, name                VARCHAR(100)  NOT NULL
, created_by          INT UNSIGNED  NOT NULL
, creation_date       DATE          NOT NULL
, last_updated_by     INT UNSIGNED  NOT NULL
, last_update_date    DATE          NOT NULL
, CONSTRAINT payees_fk1 FOREIGN KEY (created_by) REFERENCES system_users (user_id)
, CONSTRAINT payees_fk2 FOREIGN KEY (last_updated_by) REFERENCES system_users (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS payments;
CREATE TABLE payments 
( payment_id          INT UNSIGNED  PRIMARY KEY AUTO_INCREMENT
, payee_id            INT UNSIGNED  NOT NULL
, category_id         INT UNSIGNED  NOT NULL
, sum                 NUMERIC(15,2) NOT NULL
, created_by          INT UNSIGNED  NOT NULL
, creation_date       DATE          NOT NULL
, last_updated_by     INT UNSIGNED  NOT NULL
, last_update_date    DATE          NOT NULL
, CONSTRAINT payments_fk1 FOREIGN KEY (payee_id) REFERENCES payees (payee_id)
, CONSTRAINT payments_fk2 FOREIGN KEY (category_id) REFERENCES categories (category_id)
, CONSTRAINT payments_fk3 FOREIGN KEY (created_by) REFERENCES system_users (user_id)
, CONSTRAINT payments_fk4 FOREIGN KEY (last_updated_by) REFERENCES system_users (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;