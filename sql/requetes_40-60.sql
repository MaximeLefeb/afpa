/*40 : Trier les employés (nom, prénom, n° de service, salaire) du service 3 par
ordre de salaire croissant.*/
select nom,prenom, noserv, sal
from emp
where noserv=3
order by sal asc;
/*41 : Trier les employés (nom, prénom, n° de service , salaire) du service 3
par ordre de salaire décroissant.*/
select nom,prenom, noserv, sal
from emp
where noserv=3
order by  sal desc;
/*42 : Idem en indiquant le numéro de colonne à la place du nom colonne.*/
select nom,prenom, noserv, sal
from emp
where noserv=3
order by  4 desc;
/*43 : Trier les employés (nom, prénom, n° de service, salaire, emploi) par
emploi, et pour chaque emploi par ordre décroissant de salaire.*/
select nom,prenom, noserv, sal,emploi
from emp
order by  emploi,sal desc;
/*44 : Idem en indiquant les numéros de colonnes.*/
select nom,prenom, noserv, sal,emploi
from emp
order by  5,4 desc;
/*45 : Trier les employés (nom, prénom, n° de service, commission) du service
3 par ordre croissant de commission.*/
select nom,prenom, noserv, comm
from emp
where noserv=3
order by  comm;
/*46 : Trier les employés (nom, prénom, n° de service, commission) du service
3 par ordre décroissant de commission, en considérant que celui dont la
commission est nulle ne touche pas de commission.*/
select nom,prenom, noserv, comm
from emp
where noserv=3 
and comm is not null
order by  comm desc;

/*47 : Sélectionner le nom, le prénom, l'emploi, le nom du service de l'employé
pour tous les employés.*/
select nom, prenom, emploi, service
from emp inner join serv on emp.noserv = serv.noserv;

/*48 : Sélectionner le nom, l'emploi, le numéro de service, le nom du service
pour tous les employés.*/
select emp.nom, emp.emploi, emp.noserv, serv.service
from emp, serv
where emp inner join serv on emp.noserv = serv.noserv;

/*49 : Idem en utilisant des alias pour les noms de tables.*/
select e.nom, e.emploi, e.noserv, s.service
from emp e inner join serv s on e.noserv = s.noserv;

/*50 : Sélectionner le nom, l'emploi, suivis de toutes les colonnes de la table
SERV pour tous les employés.*/
select e.nom, e.emploi, s.noserv, s.service, s.ville
from emp e inner join serv s on e.noserv = s.noserv;

/*ou*/
select nom, emploi, s.*
from emp e inner join serv s on e.noserv = s.noserv;

/*51 : Sélectionner les nom et date d'embauche des employés suivi des nom et
date d'embauche de leur supérieur pour les employés plus ancien que leur
supérieur, dans l'ordre nom employés, noms supérieurs.*/

select employe.nom, employe.embauche, superieur.nom, superieur.embauche
from emp employe inner join emp superieur on employe.sup= superieur.noemp
and employe.embauche<superieur.embauche
order by employe.nom, superieur.nom;

/*52 : Sélectionner sans doublon les prénoms des directeurs et « les prénoms des
techniciens du service 1 » avec un UNION.*/
select distinct prenom
from emp
where emploi='DIRECTEUR'
union
select distinct prenom 
from emp
where emploi='TECHNICIEN'
and noserv=1;

/*53 : Sélectionner les numéros de services n’ayant pas d’employés sans une
jointure externe.*/
select noserv
from serv
not in (
select distinct noserv
from emp );

/*54 : Sélectionner les services ayant au moins un employé.*/
SELECT distinct service
FROM emp, serv 
WHERE serv.noserv = emp.noserv
AND noemp is not null;

/*54 bis : Sélectionner les numéros de services ayant des employés sans une
jointure externe*/
SELECT distinct noserv
FROM emp;

/*55 : Sélectionner les employés qui travaillent à LILLE.*/
select nom, prenom
from emp inner join serv on emp.noserv=serv.noserv
where ville='LILLE';

/*ou*/
select nom, prenom
from emp
where noserv in (select noserv
                from serv
                where ville = 'LILLE');
/*56 : Sélectionner les employés qui ont le même chef que DUBOIS, DUBOIS exclu.*/
select nom, prenom, noserv, emploi, sup
from emp
where nom<>'DUBOIS'
and sup in (select sup 
           from emp
           where nom='DUBOIS');
          
/*57 : Sélectionner les employés embauchés le même jour que DUMONT.*/
select nom, prenom, noserv, emploi, embauche
from emp
where embauche = (select embauche 
           from emp
           where nom='DUMONT')
           ;
/*58 : Sélectionner les nom et date d'embauche des employés plus anciens que MINET,
dans l’ordre des embauches.*/
select nom, prenom, emploi, embauche
from emp
where embauche<(select embauche 
           from emp
           where nom='MINET')
order by embauche;
/*59 : Sélectionner le nom, le prénom, la date d’embauche des employés plus anciens
que tous les employés du service N°6. (Attention MIN)*/
select nom, prenom, emploi, embauche
from emp
where embauche<(select min(embauche) 
           from emp
           where noserv=6)
order by embauche;
/*60 : Sélectionner le nom, le prénom, le revenu mensuel des employés qui gagnent
plus qu'au moins un employé du service N°3, trier le résultat dans l'ordre croissant
des revenus mensuels.*/
select nom, prenom, emploi, embauche, (sal+ifnull(comm,0)) as revenu
from emp
where (sal+ifnull(comm,0))>=(select min(sal+ifnull(comm,0))
           from emp
           where noserv=3)
order by (sal+ifnull(comm,0));