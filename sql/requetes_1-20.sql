/*1:Sélectionner toutes les colonnes de la table SERV.*/
select * 
from serv;
/*2:Sélectionner d’une autre manière ces colonnes.*/
select noserv, service, ville
from serv;
/*3:Sélectionner les colonnes SERVICE et NOSERV de la table SERV.*/
select service,noserv
from serv;
/*4:Sélectionner toutes les colonnes de la table EMP.*/
select * 
from emp;
/*5:Sélectionner les emplois de la table EMP.*/
select emploi
from emp;
/*6:Sélectionner les différents emplois de la table EMP.*/
select DISTINCT emploi
from emp;
/*7 : Sélectionner les employés du service N°3.*/
select nom, prenom
from emp
where NOSERV=3;
/*8 : Sélectionner les noms, prénoms, numéro d’employé, numéro
de service de tous les techniciens.*/
select nom,prenom,noemp,noserv
from emp
where emploi='TECHNICIEN';
/*9 : Sélectionner les noms, numéros de service de tous les services
dont le numéro est supérieur à 2.*/
select service,noserv
from serv
where noserv>2;
/*10 : Sélectionner les noms, numéros de service de tous les
services dont le numéro est inférieur ou égal à 2.*/
select service,noserv
from serv
where noserv<=2;
/*11 : Sélectionner les employés dont la commission est inférieure
au salaire. Vérifiez le résultat jusqu’à obtenir la bonne réponse.*/
select nom,prenom, sal,comm
from emp
where comm < sal;
/*ou*/
select nom,prenom, sal,comm
from emp
where ifnull(COMM,0)<SAL;

/*12 : Sélectionner les employés qui ne touchent jamais de
commission.*/
select nom,prenom,comm
from emp
where comm is null;
/*13 : Sélectionner les employés qui touchent éventuellement une
commission et dans l’ordre croissant des commissions.*/
select nom,prenom,comm
from emp
where comm is not null
order by comm;
/*14 : Sélectionner les employés qui ont un chef.*/
select nom,prenom,sup
from emp
where sup is not null;
/*15 : Sélectionner les employés qui n’ont pas de chef.*/
select nom,prenom,sup
from emp
where sup is null;
/*16 : Sélectionner les noms, emploi, salaire, numéro de service de tous les
employés du service 5 qui gagnent plus de 20000 €.*/
select nom,emploi,sal,noserv
from emp
where noserv=5
and SAL>20000;
/* 17 : Sélectionner les vendeurs du service 6 qui ont un revenu mensuel
supérieur ou égal à 9500 €.*/
select nom, sal+comm as revenu, noserv, emploi 
from emp
where emploi='VENDEUR'
and noserv=6
and sal+ifnull(comm,0)>=9500;
/*18 : Sélectionner dans les employés tous les présidents et directeurs.
Attention, le français et la logique sont parfois contradictoires.*/
select * 
from emp
where emploi IN ('PRESIDENT','DIRECTEUR');
/* 19 : Sélectionner les directeurs qui ne sont pas dans le service 3.*/
select *
from emp
where emploi='DIRECTEUR'
and not noserv=3;
/* 20 : Sélectionner les directeurs et « les techniciens du service 1 ».*/
select * 
from emp
where EMPLOI='DIRECTEUR'
or (emploi='TECHNICIEN' and noserv=1);