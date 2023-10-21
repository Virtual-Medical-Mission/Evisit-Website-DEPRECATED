CREATE TABLE appointments (
    id bigint(20) not null auto_increment,
    uid bigint(20),
    vid bigint(20),
    checkedin VARCHAR(255),
    checkedout VARCHAR(255),
    doctor VARCHAR(255),
    ip TEXT,
    PRIMARY KEY (id)
);
