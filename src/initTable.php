<?php
$databaseFile = '/var/www/html/your_database.db';

$db = new SQLite3($databaseFile);
$db->exec('CREATE TABLE IF NOT EXISTS books_table (id INTEGER PRIMARY KEY, title TEXT NOT NULL, author TEXT NOT NULL, pages INT NOT NULL, file_name varchar(100) NOT NULL)'); // Adjust columns accordingly
//$db->exec('INSERT INTO books (title, author, imgpath, pages) VALUES ("Enigma Otiliei", "George Calinescu", 357)'); // Insert initial data

$db->exec('CREATE TABLE if not EXISTS uploading (id INTEGER PRIMARY KEY , name TEXT NOT NULL,email varchar(100) NOT NULL,file_name varchar(100) NOT NULL)');

?>