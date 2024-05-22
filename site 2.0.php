<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Your HTML head content here -->
</head>
<body>
    <div class="container">
        <h2>Calculadora de Produtos Semanais</h2>
        <form id="produto-form" method="post">
            <!-- Your form content here -->
        </form>

        <hr>

        <ul id="lista-produtos">
            <?php
            // Server-side PHP code to retrieve and display data from the database
            $db_host = 'localhost'; // Database host
            $db_user = 'username';  // Database username
            $db_pass = 'password';  // Database password
            $db_name = 'database';  // Database name

            // Connect to database
            $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch stored data from the database
            $sql = "SELECT * FROM produtos";
            $result = $conn->query($sql);

            // Display retrieved data
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li>{$row['nome']}: {$row['quantidade']}</li>";
                }
            } else {
                echo "<li>Nenhum produto adicionado ainda.</li>";
            }

            // Close database connection
            $conn->close();
            ?>
        </ul>

        <!-- Your JavaScript code here -->
    </div>
</body>
</html>

