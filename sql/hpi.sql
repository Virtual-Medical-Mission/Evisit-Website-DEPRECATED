CREATE table hpi (
    id bigint(20) not null auto_increment,
    username varchar(255),
    language varchar(255),
    tribe varchar(255),
    location varchar(255),
    start_date varchar(255),
    medical_conditions varchar(255),
    medications varchar(255),
    surgeries varchar(255),
    allergies varchar(255),
    hospitalized varchar(255),
    clean_water varchar(255),
    transportation varchar(255),
    immunizations varchar(255),
    dietary_restrictions varchar(255),
    smoke_rate varchar(255),
    alcohol_rate varchar(255),
    drug_rate varchar(255),
    physical_activities varchar(255),
    family_history varchar(255),
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    primary key (id)

);