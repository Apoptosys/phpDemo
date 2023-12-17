<?php
$databaseFile = '/var/www/html/your_database.db';

// Connect to the SQLite database
$db = new SQLite3($databaseFile);
$db->exec('CREATE TABLE IF NOT EXISTS your_table (id INTEGER PRIMARY KEY, column1 TEXT, column2 TEXT)'); // Adjust columns accordingly
//$db->exec('INSERT INTO your_table (column1, column2) VALUES ("Data1", "Data2")'); // Insert initial data
// Replace 'your_table' and 'your_columns' with your actual table and columns
$query = $db->query('SELECT * FROM books_table');
$data = array();

while ($row = $query->fetchArray(SQLITE3_ASSOC)) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);

$db->exec('DELETE FROM books_table');
?>

