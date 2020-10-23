create database GESTION_EMPLOYES if not exists;

create table emp if not exists 
(
noemp int(4) primary key not null,
nom varchar(20),
prenom varchar(20),
emploi varchar(20),
sup int(4),
embauche date,
sal float(9,2),
comm float(9,2),
noserv int(2) not null
);

create table serv if not exists 
(
noserv int(2) primary key not null,
service varchar(20),
ville varchar(20)
);

--Ajout d'un lien entre employers et services à travers la colonne noserv de employes
ALTER TABLE emp
ADD FOREIGN KEY (noserv) REFERENCES serv(noserv)

--Ajout d'un lien réflexif entre un employers et son superieur
ALTER TABLE emp
ADD FOREIGN KEY (sup) REFERENCES emp(noemp)