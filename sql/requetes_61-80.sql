/*61 : Sélectionner les noms, le numéro de service, l’emplois et le salaires des
personnes travaillant dans la même ville que HAVET.*/
select nom, prenom, emp.noserv, emploi, sal, ville 
from emp, serv
where emp.noserv=serv.noserv
and ville=(select ville
                from serv,emp
                where emp.noserv=serv.noserv
                and nom='HAVET');
                
                /*ou mieux*/
                
select nom, e.noserv, emploi, sal
from emp e inner join serv s on e.noserv = s.noserv
where s.ville = (select ville
               from serv s1 inner join emp e1 on e1.noserv = s1.noserv
               where nom = 'HAVET');                
/*62 : Sélectionner les employés du service 1, ayant le même emploi qu'un employé du
service N°3.*/
select *
from emp
where noserv=1
and emploi in (select distinct emploi
                from emp
                where noserv=3);
/*63 : Sélectionner les employés du service 1 dont l'emploi n'existe pas dans le service
3.*/
select *
from emp
where noserv=1
and emploi not in (select distinct emploi
                from emp
                where noserv=3);

/*64 : Sélectionner nom, prénom, emploi, salaire pour les employés ayant même emploi
et un salaire supérieur à celui de CARON.*/
select nom, prenom, emploi, sal
from emp
where emploi=(select emploi
                from emp
                where nom='CARON')
and sal>(select sal
                from emp
                where nom='CARON');
                
                /*ou*/
select nom, prenom, emploi, sal
from emp e
where sal > (select sal
             from emp e1
             where nom = 'CARON'
             and e.emploi = e1.emploi);
/*65 : Sélectionner les employés du service N°1 ayant le même emploi qu'un employé du
service des VENTES.*/
select nom, prenom, emploi, sal
from emp
where noserv=1
and emploi in (select emploi
                from emp inner join serv on emp.noserv=serv.noserv
                where service='VENTES');
/*66 : Sélectionner les employés de LILLE ayant le même emploi que RICHARD, trier
le résultat dans l'ordre alphabétique des noms.*/
select nom, prenom, ville
from emp inner join serv on emp.noserv=serv.noserv
where ville = 'LILLE'
and emploi = (select emploi
              from emp
              where nom = 'RICHARD')
order by nom; 
/*67 : Sélectionner les employés dont le salaire est plus élevé que le salaire moyen de leur
service (moyenne des salaires = avg(sal)), résultats triés par numéros de service.*/
select nom, prenom, sal, noserv
from emp e
where sal > (select avg(sal)
                from emp e1
                where e.noserv=e1.noserv)
order by noserv;
/*68 : Sélectionner les employés du service INFORMATIQUE embauchés la même
année qu'un employé du service VENTES.( année : to_char(embauche,’YYYY’) )*/

select nom, prenom, service, embauche
from emp e inner join serv s on e.noserv = s.noserv
where service = 'INFORMATIQUE'
and date_format(embauche,'%Y') in (select date_format(embauche,'%Y')
                                 from emp e1 inner join serv s1 on e1.noserv = s1.noserv
                                 and service = 'VENTES');
/*69 : Sélectionner le nom, l’emploi, la ville pour les employés qui ne travaillent pas dans
le même service que leur supérieur hiérarchique direct.*/

select nom, emploi, ville
from emp e, serv s
where e.noserv = s.noserv
and e.noserv <> (select noserv
                 from emp e1
                 where e1.noemp = e.sup);

/*70 : Sélectionner le nom, le prénom, le service, le revenu des employés qui ont des
subalternes, trier le résultat suivant le revenu décroissant.*/
select nom, prenom, emploi, (sal+nvl(comm,0)) as revenu , noserv
from emp
where sup in (select sup
                from emp)
order by (sal+nvl(comm,0)) desc;

/*71 :Sélectionner le nom, l’emploi, le revenu mensuel (nommé Revenu) avec deux décimales
pour tous les employés, dans l’ordre des revenus décroissants.*/
select nom, emploi, ROUND ((sal+nvl(comm,0)),2) as revenu
from emp
order by revenu desc;
/*72 : Sélectionner le nom, le salaire, commission des employés dont la commission représente
plus que le double du salaire.*/
select nom, emploi, sal, comm
from emp
where comm>sal*2;
/*73 : Sélectionner nom, prénom, emploi, le pourcentage de commission (deux décimales) par
rapport au revenu mensuel ( renommé "% Commissions") , pour tous les vendeurs dans
l'ordre décroissant de ce pourcentage.*/
select nom, prenom, emploi, round(ifnull(comm,0)/(sal+ifnull(comm,0))*100,2) as "%commissions"
from emp
where emploi='VENDEUR'
order by 4 desc;   /* order by "%commissions" ne fonctionnera pas
/*74 : Sélectionner le nom, l’emploi, le service et le revenu annuel ( à l’euro près) de tous les
vendeurs.*/
select nom, emploi, service,round((sal+ifnull(comm,0))*12,0) as revenu
from emp, serv
where emploi='VENDEUR'
and emp.noserv=serv.noserv;
/*75 : Sélectionner nom, prénom, emploi, salaire,commissions, revenu mensuel pour les employés
du service dont le numéro sera saisi au clavier.*/
select nom, prenom, emploi, sal, comm, sal+nvl(comm,0) as revenu
from emp
where noserv= &noserv;  /* Cette fonctionnalité est disponible uniqueemnt sous Oracle*/

/*76 : Idem en remplaçant les noms des colonnes : SAL par SALAIRE, COMM par
COMMISSIONS, SAL+NVL(COMM,0) par GAIN_MENSUEL.*/
select nom, prenom, emploi, sal as salaire, comm as commissions, sal+nvl(comm,0) as GAIN_MENSUEL
from emp
where noserv= &noserv;

/*77 : Idem en remplaçant GAIN_ MENSUEL par GAIN MENSUEL*/
select nom, prenom, emploi, sal as salaire, comm as commissions, sal+nvl(comm,0) as "GAIN MENSUEL"
from emp
where noserv= &noserv;
/*78 : Afficher le nom, l'emploi, les salaires journalier et horaire pour les employés du service
dont le numéro sera saisi au clavier (22 jours/mois et 8 heures/jour), sans arrondi, arrondi au
centime près.*/
select nom, emploi,
		(sal/22) as "salaire journalier sans arrondi",
		round((sal/22),2) as "salaire journalier", 
		(sal/22/8) as "salaire horaire sans orrondi"
		round((sal/22/8),2) as "salaire horaire"
from emp
where noserv= &noserv;
/*79 : Idem sans arrondir mais en tronquant.*/
select nom, emploi, truncate((sal/22),2) as "salaire journalier", truncate((sal/21/8),2) as "salaire horaire"
from emp
where noserv= &noserv;

/*80 : Concaténer les colonnes Service et Ville en les reliant par " ----> ", les premières lettres des
noms de villes doivent se trouver sur une même verticale.*/
select service, ville, 
	concat(rpad(service,(select max(length(service)) from services),'-'), '--->', ville) as "service-->ville"
from services