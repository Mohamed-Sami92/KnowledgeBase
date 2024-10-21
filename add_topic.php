<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $tags = $_POST['tags'];
    $created_at = date('Y-m-d H:i:s');

    // Store the topic in a JSON file
    $topic_data = array(
        'title' => $title,
        'description' => $description,
        'tags' => $tags,
        'created_at' => $created_at
    );

    // Create a unique filename for each topic
    $filename = 'data/' . time() . '.json';

    // Save the topic data to the file
    file_put_contents($filename, json_encode($topic_data));

    // Redirect back to the homepage
    header("Location: ../index.html");
}
?>
