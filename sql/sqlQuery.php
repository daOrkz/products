<?php

$queryStr = [
  'getUserStatus' =>
"SELECT 
  users.login, status.name, status.status_code 
FROM 
  users 
INNER JOIN 
  status 
ON
  users.status_id = status.id 
WHERE 
  users.login = '%s'
",
'getPswUser' =>  
"SELECT 
  password
FROM
  users
WHERE
  login = '%s'
"
];