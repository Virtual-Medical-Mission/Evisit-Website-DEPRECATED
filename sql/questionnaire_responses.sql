CREATE TABLE questionnaire_responses (
    id bigint(20) not null auto_increment,
    qid bigint(20),
    uid bigint(20),
    response VARCHAR(255),
    apid bigint(20),
    primary key (id)
);