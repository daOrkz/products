<?php

$queryStr['getUserStatus'] = 
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
";

$queryStr['getAllUsers'] = 
"SELECT 
  users.id, users.login, status.name, status.status_code 
  FROM 
    users 
  INNER JOIN 
    status 
  ON
    users.status_id = status.id
";

$queryStr['searchUserOnId'] = 
"SELECT
  * 
FROM
  users
WHERE
  id = '%s'
";
$queryStr['searchOnLogin'] = 
"SELECT
  * 
FROM
  users
WHERE
  login = '%s'
";

$queryStr['offsetUsers'] = 
"
ORDER BY users.id
LIMIT %u OFFSET %u
";

$queryStr['getPswUser'] = 
"SELECT 
  password
FROM
  users
WHERE
  login = '%s'
";

$queryStr['getAllGoods'] = 
"SELECT
  *
FROM
  goods
";
$queryStr['offset'] = 
// "SELECT
//   *
// FROM
//   goods 
"ORDER BY id
LIMIT %u OFFSET %u
";

$queryStr['updateGood'] = 
"UPDATE
  goods
SET
  title = :title,  price = :price, text = :text, img = :image
WHERE
  id = '%s'
";

$queryStr['aboutGood'] = 
"SELECT
  *
FROM
  goods
WHERE
  id = '%s'
";

$queryStr['deleteGood'] = 
"DELETE FROM
  goods
WHERE
id = '%s'
";

$queryStr['addGood'] = 
"INSERT INTO
  goods
SET
  title = :title,  price = :price, text = :text, img = :image
";

$queryStr['searchOnText'] = 
"SELECT
  * 
FROM
  goods
WHERE
  MATCH (title,text) 
AGAINST
('%s' IN BOOLEAN MODE)
";

$queryStr['searchOnId'] = 
"SELECT
  * 
FROM
  goods
WHERE
  id = '%s'
";
$queryStr['searchOnPrice'] = 
"SELECT
  * 
FROM
  goods
WHERE
  price = '%s'
";

