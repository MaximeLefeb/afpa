-- 1
SELECT * FROM client INNER JOIN commande ON commande.idclient = client.idclient;

-- 2
SELECT * FROM article LEFT JOIN LIGNE_COM ON LIGNE_COM.IDARTICLE = article.IDARTICLE WHERE LIGNE_COM.IDARTICLE IS NULL;

-- 3
SELECT client.idclient FROM client INNER JOIN commande ON client.idclient = commande.idclient WHERE commande.datecom <= ADD_MONTHS(sysdate, -12);