SELECT DISTINCT game 
FROM users
WHERE level > 10 and id IN (SELECT user_id FROM payments 
GROUP BY user_id
HAVING SUM(amount)>100)