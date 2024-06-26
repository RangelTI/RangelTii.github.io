# RangelTii.github.io
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Produtos Semanais</title>
    <style>
        body {
            background-color: #232323;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #333;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select,
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #666;
            border-radius: 5px;
            background-color: #444;
            color: #fff;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        hr {
            border: none;
            border-top: 1px solid #666;
            margin: 20px 0;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            padding: 10px;
            border-bottom: 1px solid #666;
            background-color: #444;
        }

        #resultado {
            margin-top: 20px;
        }

        #resultado h3 {
            text-align: center;
            margin-bottom: 10px;
        }

        #resultado p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Calculadora de Produtos Semanais</h2>
        <form id="produto-form">
            <label for="nome">Nome do Produto:</label>
            <select id="nome" name="nome">
                <option value="">Selecione um produto</option>
                <option value="Fonte">Fonte</option>
                <option value="Memoria">Memória</option>
                <option value="SSD">SSD</option>
                <option value="Processador">Processador</option>
                <option value="Placa Mae">Placa Mãe</option>
            </select>
            <label for="quantidade">Quantidade Utilizada:</label>
            <input type="number" id="quantidade" name="quantidade" required>
            <button type="button" onclick="adicionarProduto()">Adicionar Produto</button>
            <hr>
            <ul id="lista-produtos"></ul>
            <button type="button" onclick="calcularTotal()">Calcular Total</button>
        </form>

        <div id="resultado"></div>
    </div>

    <script>
        let produtos = [];

        function adicionarProduto() {
            const nome = document.getElementById("nome").value.trim();
            const quantidade = parseInt(document.getElementById("quantidade").value);

            if (nome && quantidade > 0) {
                produtos.push({ nome, quantidade });
                atualizarListaProdutos();
                document.getElementById("nome").value = "";
                document.getElementById("quantidade").value = "";
            } else {
                alert("Por favor, selecione um produto e informe a quantidade corretamente.");
            }
        }

        function atualizarListaProdutos() {
            const listaProdutos = document.getElementById("lista-produtos");
            listaProdutos.innerHTML = "";
            produtos.forEach(produto => {
                const li = document.createElement("li");
                li.textContent = `${produto.nome}: ${produto.quantidade}`;
                listaProdutos.appendChild(li);
            });
        }

        function calcularTotal() {
            let totalProdutos = {};
            produtos.forEach(produto => {
                if (totalProdutos[produto.nome]) {
                    totalProdutos[produto.nome] += produto.quantidade;
                } else {
                    totalProdutos[produto.nome] = produto.quantidade;
                }
            });

            let resultado = "<h3>Quantidade de produtos utilizados semanalmente:</h3>";
            for (const nome in totalProdutos) {
                resultado += `<p>${nome}: ${totalProdutos[nome]}</p>`;
            }

            document.getElementById("resultado").innerHTML = resultado;
        }
    </script>
</body>
</html>
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


