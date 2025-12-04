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

    <?php 
    $country = $_GET['country'];
    $lookup = $_GET['lookup'] ?>
    <?php if ($lookup == 'lookup'): ?>
    <?php 
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
    </table>
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
          </table>
        <?php endif ?>
  <?php else: ?>
    <?php 
    $coun = $conn->query("SELECT c.name, c.district, c.population FROM cities c join countries cs on c.country_code = cs.code WHERE cs.name LIKE '%$country%'");
    $city_results = $coun->fetchAll(PDO::FETCH_ASSOC); 
    //Replace the above with SQL functionality.?>
    <table style="width:100%">
      <tr>
        <th>Name</th>
        <th>District</th>
        <th>Population</th>
      </tr>
      <?php foreach ($city_results as $row): ?>
      <tr>
        <th><?= $row['name']; ?></th>
        <th><?= $row['district']; ?></th>
        <th><?= $row['population']; ?></th>
      </tr>  
      <?php endforeach; ?>
    </table>
    <?php $query = htmlspecialchars(trim($_REQUEST['country'])); ?>
        <?php if (empty($query)==TRUE): ?>
          <table style="width:100%">
          <tr>
            <th>Name</th>
            <th>District</th>
            <th>Population</th>
          </tr>
          <?php foreach ($city_results as $row): ?>
          <tr>
            <th><?= $row['name']; ?></th>
            <th><?= $row['district']; ?></th>
            <th><?= $row['population']; ?></th>
          </tr>  
          <?php endforeach; ?>
          </table>
        <?php endif ?>
  <?php endif ?>


    