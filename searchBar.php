<?php
echo '<option value="Category">Category</option> ';
$db = new PDO('sqlite:db/restaurant.db');
$stmt = $db->prepare('SELECT  category FROM restaurant GROUP BY category ORDER BY COUNT(*) DESC LIMIT 5');
$stmt->execute();
while ($row = $stmt->fetch()) {
    echo '<option value="'. $row['category'] .'">'. $row['category'] .'</option>';
}
?>