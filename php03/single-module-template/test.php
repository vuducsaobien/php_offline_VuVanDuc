<?php
$mysql = new mysqli($host,$username,$password,$database);

$keyword = 'racing';
$query = $mysql->query("SELECT * FROM products 
WHERE title LIKE '%$keyword%' OR description LIKE '%$keyword%'");

while($result = $query->fetch_object())
{
    echo '<p>';
    echo $result->title.'<br />';
    echo substr($result->description,'0','256');
    echo '</p>';
}


$result->title = preg_replace("/($keyword)/i",'<span class="highlight">$1</span>', $result->title);


?>