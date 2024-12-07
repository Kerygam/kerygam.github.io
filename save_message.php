<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = htmlspecialchars($_POST['message']); // Biztonsági szempontból szűrés
    $timestamp = date("Y-m-d H:i:s");

    // Fájl mentése
    $file = 'messages.txt'; // A fájl a szerveren belül érhető el
    $entry = "[$timestamp] $message" . PHP_EOL;

    // Fájl hozzáfűzése
    if (file_put_contents($file, $entry, FILE_APPEND)) {
        echo "<script>alert('Message saved successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Error saving message. Please try again.'); window.location.href='index.html';</script>";
    }
} else {
    header("Location: index.html"); // Ha nem POST kérés, irányítsa vissza
    exit();
}
?>
