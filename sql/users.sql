CREATE TABLE users
(
    id bigint(20) NOT NULL AUTO_INCREMENT,
    full_name VARCHAR(255),
    gender VARCHAR(255),
    DOB TEXT,
    password VARCHAR(255),
    vid bigint(20),
    PRIMARY KEY (id)
)