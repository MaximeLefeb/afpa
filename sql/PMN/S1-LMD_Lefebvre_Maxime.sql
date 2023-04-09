-- 1  
SHOW TABLE client;
-- 2
SELECT * FROM client;

-- 3
SELECT id, nom FROM TABLE client;

-- 4
SELECT * FROM client WHERE code_postal BETWEEN 60000 AND 95000;

-- 5
SELECT * FROM client WHERE id = 1 OR id = 5;

-- 6
SELECT * FROM client WHERE LOWER(raisonsociale) LIKE 'a%';

-- 7
SELECT * FROM client WHERE code_postal LIKE '3%';

-- 8
SELECT * FROM client WHERE LOWER(raisonsociale) NOT LIKE 'a%';

-- 9
SELECT * FROM client WHERE adresse IS NULL;

-- 10 
SELECT id, nom FROM client ORDER BY nom DESC;

-- 11 
SELECT * FROM client WHERE LOWER(ville) != 'paris';

-- 12 
SELECT * FROM client WHERE LOWER(nom) LIKE '%er%';

-- 13 
SELECT numero_commande FROM commande WHERE date_com BETWEEN DATE_SUB(NOW(), INTERVAL 3 MONTH) AND NOW();

-- 14 
SELECT * FROM representant WHERE idrep > 2 ORDER BY DESC;

-- 15 
SELECT * FROM representant WHERE substr(prenomrep, 1, 1) BETWEEN 'D' AND 'Q' AND (substr(nomrep, 1, 1) IN ('L', 'S'));

-- 16 
SELECT to_char(date_commande, 'MM/YYYY') AS date FROM commande;

ALTER SESSION SET NLS_DATE_FORMAT = 'MM-YYYY'; /* Changer format des dates pour la session */

-- 17 
SELECT to_char(date_commande, 'MM/YY') AS date FROM commande;

-- 18 
DELETE FROM ligne_com WHERE id BETWEEN 1 AND 10;

ROLLBACK;

-- 19
UPDATE client SET adresse = 'Nouvelle adresse utilisateur' WHERE client = 4;