CREATE TABLE nodes (
    id bigint(20) not null auto_increment,
    next_form VARCHAR(255),
    response VARCHAR(255),
    isDxTx BOOLEAN,
    qid bigint(20),
    dxtxid bigint(20),
    primary key (id)
);