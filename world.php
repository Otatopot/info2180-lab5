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
    <table style="width:100%">
      <tr>
        <th>Name</th>
        <th>Continent</th>
        <th>Independence</th>
        <th>Head of State</th>
      </tr>
      <?php foreach ($country_results as $row): ?>
      <tr>
        <th><?= $row['name']; ?></th>
        <th><?= $row['continent']; ?></th>
        <th><?= $row['independence_year']; ?></th>
        <th><?= $row['head_of_state']; ?></th>
      </tr>  
      <?php endforeach; ?>
    

<?php $query = htmlspecialchars(trim($_REQUEST['country'])); ?>
    <?php if (empty($query)==TRUE): ?>
      <table style="width:100%">
      <tr>
        <th>Name</th>
        <th>Continent</th>
        <th>Independence</th>
        <th>Head of State</th>
      </tr>
      <?php foreach ($country_results as $row): ?>
      <tr>
        <th><?= $row['name']; ?></th>
        <th><?= $row['continent']; ?></th>
        <th><?= $row['independence_year']; ?></th>
        <th><?= $row['head_of_state']; ?></th>
      </tr>  
      <?php endforeach; ?>
    <?php endif ?>
