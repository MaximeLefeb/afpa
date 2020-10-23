/*81 : Sélectionner nom, emploi pour les employés en ajoutant une colonne "CODE EMPLOI",
trier le résultat sur ce code.**** 0 signifie que le code emploi n’existe pas.*/
select nom, emploi, (case when emploi='PRESIDENT' then 1
                          when emploi='DIRECTEUR' then 2 
                          when emploi='COMPTABLE' then 3
                          when emploi='VENDEUR' then 4
                          when emploi='TECHNICIEN' then 5
                          else 0
                    end) as 'code emploi'
from emp
order by 3;


/* 82 : Sélectionner les employés en remplaçant les noms par '*****' dans le service n°1, trier le
résultat suivant le N° de service.*/
select (case when noserv=1 then '**********'        
             else nom
        end) as nom, prenom, noserv
from emp
order by 3;
/*83 : Sélectionner les noms des services en affichant que les 5 premiers caractères.*/
select substr(service,1,5)
from serv;
/*84 : Sélectionner les employés embauchés en 1988.*/
select *
from emp
where embauche>='1988-01-01'
and embauche<'1989-01-01'
order by embauche;

/*ou*/
select *
from emp
where DATE_FORMAT(embauche,'%Y')=1988
order by embauche;

/*ou*/
select *
from emp
where embauche like '%88%'
order by embauche;

/* 85 : Sélectionner les noms des employés sur 3 colonnes la première en majuscules, la seconde
avec l'initiale en majuscule et le reste en minuscules, la troisième en minuscules.*/
select upper(nom) as 'Nom en Maj', concat(upper(substring(nom,1,1)),lower(substring(nom,2,length(nom)))) 'Nom en Cap', lower(nom) 'Nom en Min'
from emp;
/*Pour ORACLE:à la demande de l'utilisateur*/
select nom, upper(nom), Initcap(nom), lower(nom)
from emp
where nom = upper('&nom');
/*86 : Sélectionner les positions des premiers M et E dans les noms des employés*/
select nom,instr(nom,'M') as "position du 1er M", instr(nom,'E') as "position du 1er E"
from emp;

/*ou*/

select nom,(case when locate('M',nom)=0 then 'Pas de M'
               else locate('M',nom)
            end) as "position du 1er M", (case when locate('E',nom)=0 then 'Pas de E'
                               else locate('E',nom)
                                          end) as "position du 1er E"
from emp

/*87 : Afficher le nombre de lettres qui sert à écrire le nom de chaque service.*/
select service, length(service) as "nb de  lettres pour écrire"
from serv;
/*88 : Tracer un Histogramme des salaires avec nom, emploi, salaire triés dans l'ordre décroissant
(max de l’histogramme avec 30 caractères).*/
select nom, emploi,sal, rpad('#',sal/2000,'#') as Histo_SAL
from emp;
/*89 : Sélectionner nom, emploi, date d'embauche des employés d’un service dont le numéro sera
saisi au clavier.*/
select nom, emploi, embauche, noserv
from emp
where noserv=6;

/*90 : Même chose en écrivant la colonne embauche sous la forme ‘dd-mm-yy’, renommée
embauche.*/
select nom, emploi, DATE_FORMAT(embauche,'%d-%m-%y') as embauche, noserv
from emp
where noserv=6;
/*91 : Même chose en écrivant la colonne embauche sous la forme ‘day dd month yyyy'*/
select nom, emploi, DATE_FORMAT(embauche,'%a %d %M %Y') as embauche, noserv
from emp
where noserv=6;
/*92 : Même chose en écrivant la colonne embauche sous la forme ‘day dd month(abv) yy'*/
select nom, emploi, DATE_FORMAT(embauche,'%a %d %b %y') as embauche, noserv
from emp
where noserv=6
/*93 : Même chose en écrivant la colonne embauche sous la forme 'yy month(abv) dd'*/
select nom, emploi, DATE_FORMAT(embauche,'%y %b %d') as embauche, noserv
from emp
where noserv=6;
/*94 : Même chose en écrivant la colonne embauche sous la forme ‘Day-dd-Month-yyyy'*/
select nom, emploi, DATE_FORMAT(embauche,'%a-%d-%M-%Y') as embauche, noserv
from emp
where noserv=6;
/*95 : Sélectionner les employés avec leur ancienneté en jours dans l'entreprise.*/
select nom, prenom, emploi, noserv, embauche, datediff(sysdate(),embauche) as anciennete
from emp
order by anciennete desc;

/*96 : Sélectionner les employés avec leur ancienneté en mois dans l'entreprise.*/
select nom, prenom, emploi, noserv, embauche, timestampdiff(month,embauche,sysdate()) as anciente
from emp
order by anciente desc;
/*97 : Sélectionner toutes les dates d’embauche majorées de 12 ans.(en rajoutant 12 ans à leurs anciennetés)*/
select nom, prenom, emploi, embauche,concat(date_format(embauche,'%Y')+12,date_format(embauche,'-%m-%d')) as 'embauche majorée de 12 ans'
from emp
order by 5 desc;
/*98 : Sélectionner les employés ayant plus de 12 ans d’ancienneté.*/
select nom, prenom, emploi, embauche, timestampdiff(year,embauche,sysdate()) as anciennete
from emp
where timestampdiff(year,embauche,sysdate()) >12
order by 5;

select nom, prenom, emploi, embauche, timestampdiff(month,embauche,sysdate()) as anciennete
from emp
where timestampdiff(month,embauche,sysdate()) >144
order by 5;

/*99 : Depuis combien de jours êtes-vous nés ?*/
select  timestampdiff(day,'1980-12-24',sysdate()) as 'Mon age en jours'

/*100 : Depuis combien de mois êtes-vous nés ?*/
select  timestampdiff(month,'1980-12-24',sysdate()) as 'Mon age en jours'
