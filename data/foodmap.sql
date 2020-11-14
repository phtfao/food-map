
CREATE TABLE local (
    id integer PRIMARY KEY AUTOINCREMENT NOT NULL, 
    latitude decimal(2, 10) NOT NULL, 
    longitude decimal(2, 10) NOT NULL, 
    observacao text, 
    dt_cadastro text(10) NOT NULL,
    dt_alteracao text(10)
);