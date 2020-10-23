/*Pour ces exercices, vous devez vous connecter sous votre identifiant et faire une copie
des tables EMP et SERV.*/
create table emp2
(
noemp int(4) not null,
nom varchar(20),
prenom varchar(20),
emploi varchar(20),
sup int(4),
embauche date,
sal float(9,2),
comm float(9,2),
noserv int(2)
);

alter table emp2
add constraint PK_EMP2 primary key (noemp);


create table serv2
(
noserv int(2) not null,
service varchar(20),
ville varchar(20)
);

alter table serv2
add constraint PK_SERV2 primary key(noserv);



insert into emp2 values (1000,'LEROY','PAUL','PRESIDENT',null,'1987-10-25',55005.5,null,1);
insert into emp2 values (1100,'DELPIERRE','DOROTHEE','SECRETAIRE',1000,'1987-10-25',12351.24,null,1);
insert into emp2 values (1101,'DUMONT','LOUIS','VENDEUR',1300,'1987-10-25',9047.9,0,1);
insert into emp2 values (1102,'MINET','MARC','VENDEUR',1300,'1987-10-25',8085.81,17230,1);
insert into emp2 values (1104,'NYS','ETIENNE','TECHNICIEN',1200,'1987-10-25',12342.23,null,1);
insert into emp2 values (1105,'DENIMAL','JEROME','COMPTABLE',1600,'1987-10-25',15746.57,null,1);
insert into emp2 values (1200,'LEMAIRE','GUY','DIRECTEUR',1000,'1987-03-11',36303.63,null,2);
insert into emp2 values (1201,'MARTIN','JEAN','TECHNICIEN',1200,'1987-06-25',11235.12,null,2);
insert into emp2 values (1202,'DUPONT','JACQUES','TECHNICIEN',1200,'1988-10-30',10313.03,null,2);
insert into emp2 values (1300,'LENOIR','GERARD','DIRECTEUR',1000,'1987-04-02',31353.14,13071,3);
insert into emp2 values (1301,'GERARD','ROBERT','VENDEUR',1300,'1999-04-16',7694.77,12430,3);
insert into emp2 values (1303,'MASURE','EMILE','TECHNICIEN',1200,'1988-06-17',10451.05,null,3);
insert into emp2 values (1500,'DUPONT','JEAN','DIRECTEUR',1000,'1987-10-23',28434.84,null,5);
insert into emp2 values (1501,'DUPIRE','PIERRE','ANALYSTE',1500,'1984-10-24',23102.31,null,5);
insert into emp2 values (1502,'DURAND','BERNARD','PROGRAMMEUR',1500,'1987-07-30',13201.32,null,5);
insert into emp2 values (1503,'DELNATTE','LUC','PUPITREUR',1500,'1999-01-15',8801.01,null,5);
insert into emp2 values (1600,'LAVARE','PAUL','DIRECTEUR',1000,'1991-12-13',31238.12,null,6);
insert into emp2 values (1601,'CARON','ALAIN','COMPTABLE',1600,'1985-09-16',33003.3,null,6);
insert into emp2 values (1602,'DUBOIS','JULES','VENDEUR',1300,'1990-12-20',9520.95,35535,6);
insert into emp2 values (1603,'MOREL','ROBERT','COMPTABLE',1600,'1985-07-18',33003.3,null,6);
insert into emp2 values (1604,'HAVET','ALAIN','VENDEUR',1300,'1991-01-01',9388.94,33415,6);
insert into emp2 values (1605,'RICHARD','JULES','COMPTABLE',1600,'1985-10-22',33503.35,null,5);
insert into emp2 values (1615,'DUPREZ','JEAN','BALAYEUR',1000,'1998-10-22',6000.6,null,5);

commit;


insert into serv2 values (1,'DIRECTION','PARIS');
insert into serv2 values (2,'LOGISTIQUE','SECLIN');
insert into serv2 values (3,'VENTES','ROUBAIX');
insert into serv2 values (4,'FORMATION','VILLENEUVE D''ASCQ');
insert into serv2 values (5,'INFORMATIQUE','LILLE');
insert into serv2 values (6,'COMPTABILITE','LILLE');
insert into serv2 values (7,'TECHNIQUE','ROUBAIX');


commit;

/*121 : Augmenter de 10% ceux qui ont une salaire inférieur au salaire moyen. Valider.*/
UPDATE emp2
SET sal = 1.1*(sal)
where sal<(select avg(sal)
            from emp);

/*122 : Insérez vous comme nouvel employé embauché aujourd’hui au salaire que vous
désirez. Valider.*/
insert into emp2 (noemp, nom, prenom, sal, embauche, emploi) 
values ( (select max(noemp)+1 from emp2),'SACI','MOHAMED-ELHADI',3000,'21/12/2017','DEVELOPPEUR');

insert into emp2 (noemp, nom, prenom, sal, embauche, emploi)
values ((select max(noemp)+1 from emp), 'DELSART', 'THIBAULT', (select avg(sal) from emp), '10/11/2005', 'PUPITREUR');
/*123 : Effacer les employés ayant le métier de SECRETAIRE. Valider.*/
DELETE FROM emp2 
WHERE emploi='SECRETAIRE';
commit;
/*124 : Insérer le salarié dont le nom est MOYEN, prénom Toto, no 1010, embauché le
12/12/99, supérieur 1000, pas de comm, service no 1, salaire vaut le salaire moyen des
employés. Valider.*/
select @salMoy := AVG(sal) from emp2;
insert into emp2 (noemp, nom, prenom, sal, embauche, emploi, sup, noserv) 
values ( 1010,'MOYEN','Toto',@salMoy,'1999-12-12','DEVELOPPEUR',1000,1);
commit;

/*125 : Supprimer tous les employés ayant un A dans leur nom. Faire un SELECT sur
votre table pour vérifier cela. Annuler les modifications et vérifier que cette action
s’est bien déroulée.*/
delete from emp2
where nom like '%A%';

select *
from emp2;

rollback;

select *
from emp2;

/*126 : Les verrous. Supprimer l’employé créé à l’exercice 122 de votre voisin. Ne pas
valider. Vérifiez tous les deux le contenu de la table. Demander à votre voisin
d’augmenter son propre salaire de 1000 €. Valider la suppression. Chacun vérifie
l’action. Refaire l’exercice en échangeant les rôles.*/
/*127 : Créer les tables EMP et SERV comme copie des tables EMP et SERV.*/
CREATE TABLE EMP1  (SELECT * FROM EMP);
CREATE TABLE SERV1  (SELECT * FROM SERV);

/* 128 : Vérifier que la table PROJ n’existe pas.*/
drop table if EXISTS proj;

/* ou */
use emploi;
show tables;

/* ou */

select * 
from proj;

/*129 :
Créer une table PROJET avec les colonnes suivantes:
numéro de projet (noproj), type numérique 3 chiffres, doit contenir une valeur.  nom de projet (nomproj), type caractère, longueur = 10
budget du projet (budget), type numérique, 6 chiffres significatifs et 2 décimales.
Vérifier l'existence de la table PROJET.
Faire afficher la description de la table PROJET.
C’était une erreur!!! Renommez la table PROJET en PROJ
.*/
create table projet
(
noproj int(3) not null,
nomproj varchar(10),
budget float(6,2)
);

alter table projet
add constraint PK_proj primary key (noproj);

DESCRIBE projet;

rename table projet to proj;
/*130 :
 Insérer trois lignes de données dans la table PROJ:
numéros des projets = 101, 102, 103
noms des projets = alpha, beta, gamma
budgets = 250000, 175000, 950000
 Afficher le contenu de la table PROJ.
 Valider les insertions faites dans la table PROJ.*/
insert into proj (nomproj,noproj,budget) values ('ALPHA', 101,250000);
insert into proj (nomproj,noproj,budget) values ('BETA', 102,175000);
insert into proj (nomproj,noproj,budget) values ('GAMMA', 103,950000);
commit;
select * from proj;

/*131 :
 Modifier la table PROJ en donnant un budget de 1.500.000 Euros au projet 103.
 Modifier la colonne budget afin d'accepter des projets jusque 10.000.000.000 d’Euros
 Retenter la modification demandée 2 lignes au dessus.*/
update proj 
set budget=1500000
where noproj=103;

alter table proj
modify budget float(13,2);

update proj 
set budget=1500000
where noproj=103;
commit;

select *
from proj;

/*132 :
 Ajouter une colonne NOPROJ (type numérique) à la table EMP.
 Afficher le contenu de la table EMP.*/
 alter table emp
 add noproj int(3);

 select *
 from emp;

/*133 : Affecter les employés du service 2 et les directeurs au projet 101.*/
update emp
set noproj=101
where noserv=2
or emploi='DIRECTEUR';
commit;
 select *
 from emp;
/* 134 : Affecter les employés dont le numéro est supérieur à 1350 au projet 102, sauf
ceux qui sont déjà affectés à un projet.*/
update emp
set noproj=102 
where noemp>1350
and noproj is null;
commit;


commit;
/*135 : Affecter les employés n'ayant pas de projet au projet 103.*/
update emp
set noproj=103 
where noproj is null;
commit;
/*136 : Sélectionner les noms d'employés avec le nom de leur projet et le nom de leur
service.*/
select emp.nom,emp.prenom,emp.emploi, proj.nomproj, serv.service
from emp, serv, proj
where emp.noserv=serv.noserv
and emp.noproj=proj.noproj;