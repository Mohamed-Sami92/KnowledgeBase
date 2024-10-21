<?php
$query = $_GET['query'];
$files = glob('data/*.json');

echo "<h2>Search Results</h2>";
$found = false;

foreach ($files as $file) {
    $json_data = file_get_contents($file);
    $topic = json_decode($json_data, true);

    if (stripos($topic['title'], $query) !== false || stripos($topic['description'], $query) !== false || stripos($topic['tags'], $query) !== false) {
        echo "<li><strong>" . $topic['title'] . "</strong> - " . $topic['description'] . "</li>";
        $found = true;
    }
}

if (!$found) {
    echo "<p>No results found.</p>";
}
?>
