GRANT USAGE ON *.* TO 'phpuser'@'localhost' IDENTIFIED BY PASSWORD '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257';
GRANT SELECT, SHOW VIEW ON `project2_renan`.`products_view` TO 'phpuser'@'localhost' WITH GRANT OPTION;
GRANT EXECUTE ON PROCEDURE `project2_renan`.`customers_delete` TO 'phpuser'@'localhost';
GRANT EXECUTE ON PROCEDURE `project2_renan`.`products_select` TO 'phpuser'@'localhost';
GRANT EXECUTE ON PROCEDURE `project2_renan`.`purchases_insert` TO 'phpuser'@'localhost';
GRANT EXECUTE ON PROCEDURE `project2_renan`.`products_insert` TO 'phpuser'@'localhost';
GRANT EXECUTE ON PROCEDURE `project2_renan`.`customers_select` TO 'phpuser'@'localhost';
GRANT EXECUTE ON PROCEDURE `project2_renan`.`purchases_select` TO 'phpuser'@'localhost';
GRANT EXECUTE ON PROCEDURE `project2_renan`.`purchases_update` TO 'phpuser'@'localhost';
GRANT EXECUTE ON PROCEDURE `project2_renan`.`customers_update` TO 'phpuser'@'localhost';
GRANT EXECUTE ON PROCEDURE `project2_renan`.`purchases_delete` TO 'phpuser'@'localhost';
GRANT EXECUTE ON PROCEDURE `project2_renan`.`purchases_filter` TO 'phpuser'@'localhost';
GRANT EXECUTE ON PROCEDURE `project2_renan`.`getpassword` TO 'phpuser'@'localhost';
GRANT EXECUTE ON PROCEDURE `project2_renan`.`customers_insert` TO 'phpuser'@'localhost';
GRANT EXECUTE ON PROCEDURE `project2_renan`.`products_update` TO 'phpuser'@'localhost';
GRANT EXECUTE ON PROCEDURE `project2_renan`.`products_delete` TO 'phpuser'@'localhost';

