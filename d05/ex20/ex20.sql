SELECT 
    f.id_genre, 
    g.name AS name_genre,
    d.id_distrib AS id_distrib,
    d.name AS name_distrib,
    f.title AS title_film
FROM film AS f
LEFT JOIN genre AS g ON g.id_genre = f.id_genre
LEFT JOIN distrib AS d ON d.id_distrib = f.id_distrib
WHERE f.id_genre >= 4 AND f.id_genre <= 8
;