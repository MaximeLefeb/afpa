/*101 : Afficher la moyenne des revenus (avec commission) des vendeurs.*/
select avg(sal+IFNULL(comm,0)) as "moyenne salaire"
from emp
where emploi='VENDEUR';

/* 102 : Paramétrer la requête qui précède sur l’emploi.*/
select emploi,avg(sal+IFNULL(comm,0)) as "moyenne salaire"
from emp
group by  emploi;


/* 103 : Afficher la somme des salaires et la somme des commissions des
vendeurs.*/
select sum(sal) as "Toatl des salaires", sum(IFNULL(comm,0)) as "total des commissions"
from emp 
where emploi='VENDEUR';

/* 104 : Afficher le plus haut salaire, le plus bas salaire, la différence entre les
deux.*/

select max(sal) as "Salaire max", min(sal) as "Salaire Min", (max(sal)-min(sal)) as "ecart des salaires", STDDEV(sal) as x1, variance(sal) as x2
from emp;

/* 105 : Compter les employés embauchés chaque trimestre.*/
select count(noemp) as 'Nombre de recrues', DATE_FORMAT(embauche,'%Y')
from emp
group by DATE_FORMAT(embauche,'%Y')
order by 2;

/*106 : Afficher le nombre de lettres du service dont le nom est le plus court.*/
select min(length(service))
from serv;

/*107 : Sélectionner nom, emploi, revenu mensuel de l'employé qui gagne le
plus.*/
select nom, emploi, (sal+IFNULL(comm,0)) as Revenu
from emp
where (sal+IFNULL(comm,0)) = (select max(sal+IFNULL(comm,0))
                           from emp);
           

/*108 : Déterminer le nombre d'employés du service 3 qui reçoivent
éventuellement une commission.*/

select count(noemp)
from emp
where noserv = 3
and comm is not null;

/* 109 : Déterminer le nombre d'emploi différents du service N°1.*/
select count(distinct emploi)
from emp
where noserv=1;

/*110 : Déterminer le nombre d'employés du service N°3.*/
select count(noemp)
from emp
where noserv=3;

/*111 : Pour chaque service, afficher son N° et le salaire moyen des employés du service
arrondi l’euro près.*/
select noserv,round(avg(sal),0) as "Salaire Moyen"
from emp
group by noserv
order by noserv;
/*112 : Pour chaque service donner le salaire annuel moyen de tous les employés qui ne
sont ni président, ni directeur.*/
select noserv,round(avg(sal*12),0) as "Salaire Annuel Moyen"
from emp
where emploi not in('PRESIDENT','DIRECTEUR')
group by noserv
order by noserv;
/*113 : Grouper les employés par service et par emploi à l'intérieur de chaque service,
pour chaque groupe afficher l'effectif et le salaire moyen.*/
select noserv, emploi, round(avg(sal),0) as "Salaire moyen", count(noemp) as effectif
from emp
group by noserv, emploi
order by noserv, emploi;

select noserv, emploi, 
count(noemp)as EFF, round(avg(sal),0) as SALMOY
from emp
group by noserv, emploi
order by noserv, emploi;
/*114 : Idem en remplaçant le numéro de service par le nom du service.*/

select service, emploi, 
count(noemp)as EFF, round(avg(sal),0) as SALMOY
from serv, emp
where serv.noserv=emp.noserv
group by service, emploi
order by service, emploi;

/*115 : Afficher l'emploi, l'effectif, le salaire moyen pour tout type d'emploi ayant plus
de deux représentants.*/
select emploi, count(noemp) as effectif, round(avg(sal+IFNULL(comm,0))) as Salaire_Moyenne
from emp
group by emploi
having count(noemp)>2

/* 116 : Sélectionner les services ayant au mois deux vendeurs.*/
select service , count(noemp) as effectif
from emp, serv
where emploi='VENDEUR'
and emp.noserv=serv.noserv
group by service
having count(noemp)>=2;

/*ou*/

select noserv, count(noemp) as effectif
from emp
where emploi = 'VENDEUR'
group by noserv
having count(noemp) >= 2;

/*117 : Sélectionner les services ayant une commission moyenne supérieure au quart du
salaire moyen.*/

select service , round(avg(IFNULL(comm,0)),0) as MOY_COMM, round(avg(sal)/4,0) as SAL_MOY
from emp, serv
where emp.noserv=serv.noserv
group by service
having avg(IFNULL(comm,0))> avg(sal)/4;

/*118 : Sélectionner les emplois ayant un salaire moyen supérieur au salaire moyen des
directeurs.*/

select emploi ,round(avg(sal),0) as SAL_MOY
from emp
group by emploi
having avg(sal)> (select avg(sal) 
                    from emp
                    where emploi='DIRECTEUR');

/* 119 : Afficher, sur la même ligne, pour chaque service, le nombre d'employés ne
touchant pas de commission et le nombre d'employés touchant une commission.*/

select service, count(comm) as commOk, count(*)-count(comm)as commPasOk
from emp, serv
where emp.noserv=serv.noserv
group by service;
/*120 : Afficher l'effectif, la moyenne et le total pour les salaires et les commissions par
emploi.*/

select emploi,count(emploi) as effectif, avg(sal) as salMoy, sum(sal) as SalTotal, avg(comm) as commisMoy, sum(comm) as commisTotal
from emp
group by emploi;