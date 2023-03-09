--CREATE TYPE phone_numbers_t AS VARRAY(3) OF VARCHAR2(20);
CREATE TABLE destination (
    des_name               VARCHAR(25) PRIMARY KEY,
    des_location           VARCHAR(25),
    des_description        VARCHAR(100),
    ratings                INTEGER DEFAULT 0,
    tourist_attraction_id  INTEGER,
    FOREIGN KEY ( tourist_attraction_id )
        REFERENCES tourist_attractions ( tourist_attraction_id )
);

CREATE TABLE tourist_attractions (
    tourist_attraction_id    INTEGER PRIMARY KEY,
    tourist_attraction_name  varchar(50)
);

insert into tourist_attractions values (1, 'The big building');
insert into tourist_attractions values (1, 'The big sea');
insert into destination values ('dubai', 'arab peninsula', 'its a desert', 4,  1);