-- Database: db_barca

-- DROP DATABASE IF EXISTS db_barca;

CREATE DATABASE db_barca
    WITH 
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Spanish_El Salvador.1252'
    LC_CTYPE = 'Spanish_El Salvador.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;
    
CREATE TABLE jugador(
    id serial NOT NULL,
    nombre character varying(100) NOT NULL,
    posicion character varying(100) NOT NULL,
    camiseta integer NOT NULL,
    PRIMARY KEY (id)
)