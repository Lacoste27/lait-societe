CREATE VIEW etat_matiere_stock AS
SELECT  matiere_premiere_id
       ,SUM(entre)                 AS entre
       ,SUM(sortie)                AS sortie
       ,CASE 
              WHEN (sum(entre) - sum(sortie)) IS NOT NULL THEN (sum(entre) - sum(sortie))
              ELSE 0
       END as reste
       ,AVG(prixunitaire)          AS prixunitaire
FROM matiere_stock right join matiere_premiere on matiere_premiere.id = matiere_stock.matiere_premiere_id
GROUP BY  matiere_premiere_id; 

CREATE VIEW etat_matiere_stock AS
SELECT  matiere_premiere.id as matiere_premiere_id
       ,sum(entre) as entre
       ,sum(sortie) as sortie
       ,CASE 
              WHEN (sum(entre) - sum(sortie)) IS NOT NULL THEN (sum(entre) - sum(sortie))
              ELSE 0
       END as reste
       ,sum(matiere_premiere.seuill_stock) as seuill_stock
FROM matiere_stock right join matiere_premiere on matiere_premiere.id = matiere_stock.matiere_premiere_id GROUP BY matiere_premiere.id;

ALTER TABLE matiere_premiere ADD COLUMN sueill_stock INTEGER NOT NUll ;

CREATE OR REPLACE VIEW achat_faire AS
SELECT  s.matiere_premiere_id
       ,s.entre
       ,s.sortie
       ,s.reste
       ,m.seuill_stock
       ,m.nom
FROM etat_matiere_stock s
JOIN matiere_premiere m
ON s.matiere_premiere_id = m.id
WHERE s.reste < m.seuill_stock;

ALTER TABLE formule add FOREIGN KEY(produit_id) REFERENCES produit(id);

ALTER TABLE formule add FOREIGN KEY(matiere_premiere_id) REFERENCES matiere_premiere(id);

SELECT  f.produit_id
       ,f.matiere_premiere_id
       ,f.pourcentage
       ,(100 * f.pourcentage) / 100 AS quantite
       ,CASE WHEN ((100 * f.pourcentage) / 100) > ms.reste THEN 'Insuffisant'
            ELSE 'Suffisant' 
        END AS etat,
        ,ms.reste
FROM formule f
JOIN etat_matiere_stock ms
ON f.matiere_premiere_id = ms.matiere_premiere_id
WHERE f.produit_id = 1 AND compteur = 2 ;
    
CREATE VIEW etat_produit_stock AS
SELECT  produit_id
       ,SUM(entre)                 AS entre
       ,SUM(sortie)                AS sortie
       ,(SUM(entre) - SUM(sortie)) AS reste
       ,AVG(prixunitaire)          AS prixunitaire
FROM produit_stock
GROUP BY  produit_id;