<?php
header("Content-Type: application/xml; charset=utf-8");
ini_set('display_errors', 1);
error_reporting(E_ALL);
$host = 'localhost';      
$db   = 'c2860545_instrum';   
$user = 'c2860545_instrum';         
$pass = 'hRc/EuYbqDae1sP';        

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    echo '<error>Error de conexión: ' . htmlspecialchars($e->getMessage()) . '</error>';
    exit;
}

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// 1. URL Principal institucional
echo "  <url>\n";
echo "    <loc>https://cdeldorado.gob.ar/</loc>\n";
echo "    <changefreq>daily</changefreq>\n";
echo "    <priority>1.0</priority>\n";
echo "  </url>\n";

// 2. Consultar las ordenanzas desde la base de datos de instrumentos.online
try {
    // Apuntamos a la tabla 'datos' (y usamos 'id' como identificador principal)
    $stmt = $pdo->query("SELECT id FROM datos ORDER BY id DESC");
    
    while ($row = $stmt->fetch()) {
        $id = $row['id'];
        
        // URL dinámica apuntando a tus instrumentos legales
        $urlOrdenanza = "https://instrumentos.online/consulta/ordenanza/" . $id;

        echo "  <url>\n";
        echo "    <loc>" . htmlspecialchars($urlOrdenanza, ENT_XML1, 'UTF-8') . "</loc>\n";
        echo "    <changefreq>weekly</changefreq>\n";
        echo "    <priority>0.9</priority>\n";
        echo "  </url>\n";
    }
} catch (Exception $e) {
    echo "  <!-- Error en consulta: " . htmlspecialchars($e->getMessage()) . " -->\n";
}

echo '</urlset>';
?>















