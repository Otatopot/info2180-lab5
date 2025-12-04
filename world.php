<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//specific country query

?>

    <?php // Accepts get Request variable from JS url.
// searchbar functionality not yet added 
    $country = $_GET['country'];
    $coun = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $country_results = $coun->fetchAll(PDO::FETCH_ASSOC); 
    //Replace the above with SQL functionality.?>
    <ul>
        <?php foreach ($country_results as $row): ?>
        <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
        <?php endforeach; ?>
    </ul>
    




<?php $query = htmlspecialchars(trim($_REQUEST['country'])); ?>
    <?php if (empty($query)==TRUE): ?>
      <ul>
        <?php foreach ($results as $row): ?>
        <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif ?>
