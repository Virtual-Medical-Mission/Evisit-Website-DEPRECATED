CREATE TABLE forms (
    id bigint(20) not null auto_increment,
    name VARCHAR(255),
    questionnaire_id bigint(20),
    primary key (id)
);