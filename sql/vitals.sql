CREATE TABLE vitals
(
    id        bigint(20) NOT NULL AUTO_INCREMENT,
    oxsat     FLOAT,
    heartrate FLOAT,
    BP        FLOAT,
    temp      FLOAT,
    EKG       text,
    ip        text,
    time      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);
