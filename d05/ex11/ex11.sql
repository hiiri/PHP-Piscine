SELECT  upper(u.last_name) AS `NAME`,
        u.first_name,
        s.price
    FROM user_card AS u
    INNER JOIN member AS m ON m.id_member = u.id_user
    INNER JOIN subscription AS s ON m.id_sub = s.id_sub
    WHERE s.price > 42
    ORDER BY last_name ASC, first_name ASC
;