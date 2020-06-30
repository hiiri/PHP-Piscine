SELECT upper(u.last_name) AS `NAME`, 
    u.first_name, 
    s.price 
    FROM member AS m
    INNER JOIN user_card AS u ON m.id_user_card = u.id_user
    INNER JOIN subscription AS s ON s.id_sub = m.id_sub
    WHERE price > 42 
    ORDER BY u.last_name, u.first_name ASC;