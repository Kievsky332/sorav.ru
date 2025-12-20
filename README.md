Сайт полностю готов!
sorav.ru 
Где # заполните данные базы данных
# Какие базы данных надо создать?
## reacts - Реакции
```sql
CREATE TABLE `reacts` (
  `Id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `ip` text COLLATE utf8mb4_general_ci NOT NULL,
  `Sadly` int NOT NULL COMMENT 'Sad = 0 ,Awesome =1',
  `date_time` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `reacts`
  ADD PRIMARY KEY (`Id`);



ALTER TABLE `reacts`
  MODIFY `Id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
```
## user - Пользователи
```sql
CREATE TABLE `auth` (
  `id` int NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `rass` (
  `date` text COLLATE utf8mb4_general_ci NOT NULL,
  `rass` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `auth`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2019915474;
```
# CRON
login-php/del_table.php - На 00:00
login-php/rass_send.php - на 12:00
