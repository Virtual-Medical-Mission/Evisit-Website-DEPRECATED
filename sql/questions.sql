CREATE TABLE questions (
    id bigint(20) not null auto_increment,
    name VARCHAR(255),
    type VARCHAR(255),
    validation VARCHAR(255),
    question VARCHAR(255),
    fid bigint(20),
    additionalinfoid bigint(20),
    primary key (id)
);