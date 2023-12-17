<?php
$databaseFile = '/var/www/html/your_database.db';

// Connect to the SQLite database
$db = new SQLite3($databaseFile);
$db->exec('CREATE TABLE IF NOT EXISTS uploading (id INTEGER PRIMARY KEY , name TEXT NOT NULL, email varchar(100) NOT NULL, file_name varchar(100) NOT NULL)');

$query = $db->query('SELECT * FROM books_table');
$data = array();

while ($row = $query->fetchArray(SQLITE3_ASSOC)) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);


?>

