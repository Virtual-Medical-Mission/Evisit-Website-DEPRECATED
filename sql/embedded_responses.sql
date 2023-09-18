CREATE TABLE embedded_responses (
    id bigint(20) not null auto_increment,
    questionnaire VARCHAR(255),
    question VARCHAR(255),
    uid bigint(20),
    response VARCHAR(255),
    apid bigint(20),
    primary key (id)
);