<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipa</title>
    <style>
        .Rectangle9 {
            width: 330px;
            height: 495px;
            left: 15px;
            top: 284px;
            position: absolute;
            background: #D9D9D9;
            overflow: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #032383;
            color: white;
        }
    </style>
</head>

<div class="Section17" style="width: 360px; height: 800px; background: #032383; position: relative;">
    <img class="Z3snnqskliwpnwjflqrqmsql2"
        style="width: 360px; height: 143px; left: 0px; top: 0px; position: absolute; opacity: 0.80"
        src="Fotos Fantasy/Banner.png" />
    <div class="Equipa"
        style="width: 361px; height: 17px; left: 0px; top: 111px; position: absolute; text-align: center; color: white; font-size: 24px; font-family: Inter; font-style: italic; font-weight: 700; word-wrap: break-word">
        Equipa</div>
    <div class="Rectangle9" style="widsth: 330px; height: 588px; left: 15px; top: 191px; position: absolute; background: #D9D9D9">
    
    <table id='ciclistasTable'>
            <thead>
                <tr>
                    <th>Nome do Ciclista</th>
                    <th>Equipa</th>
                    <th>Créditos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                $servername = 'ave.dee.isep.ipp.pt';
                $username = '1201034';
                $dbpassword = 'MWY2MzMxMDdiMWQ2';
                $dbname = '1201034';

                $conn = new mysqli($servername, $username, $dbpassword, $dbname);

                // Verifica a conexão
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }


                $sql = "SELECT * FROM Atleta"; //INSERT INTO `Lista_de_Saída` (Posição, Atleta, Equipa) VALUES ('1', 'Xavi', 'Nome da equipa');

                $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    //Read data of each row
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                            <td>" . $row["Nome"] . "</td>
                            <td>" . $row["Equipa"] . "</td>
                            <td>" . $row["Créditos"] . "</td>
                        </tr>";
                    }
                ?>         
            </tbody>
        </table>


    </div>

    <div class="Rectangle7"
        style="width: 360px; height: 35px; left: 0px; top: 143px; position: absolute; background: #D9D9D9"></div>
    <div class="Escolhe5Ciclistas"
        style="width: 220px; height: 34px; left: -16px; top: 151px; position: absolute; text-align: center; color: black; font-size: 16px; font-family: Inter; font-weight: 700; word-wrap: break-word">
        Escolhe 5 ciclistas</div>
    <div id="creditos" class="CrDitos3000"
        style="width: 158px; height: 32px; left: 202px; top: 151px; position: absolute; text-align: center; color: black; font-size: 16px; font-family: Inter; font-weight: 700; word-wrap: break-word">
        Créditos: 3000</div>
    
    <a href="../Fantasy.html" style="text-decoration: none;">
        <div class="ArrowCircle"
            style="width: 34px; height: 34px; left: 11px; top: 10px; position: absolute; background: black; border-radius: 9999px">
        </div>
        <img class="ArrowVector3"
            style="width: 20px; height: 12px; left: 38px; top: 33px; position: absolute; transform: rotate(-180deg); transform-origin: 0 0"
            src="Fotos Fantasy/Arrow Vector 0.png" />
        </div>
    </a>

    <script>
document.addEventListener("DOMContentLoaded", function() {
    // Inicializa os créditos
    let creditos = 3000;
    const creditosElement = document.getElementById("creditos");

    // Seleciona todas as linhas da tabela, exceto o cabeçalho
    const rows = document.querySelectorAll("#ciclistasTable tbody tr");

    // Adiciona um evento de clique para cada linha
    rows.forEach(row => {
        row.addEventListener("click", function() {
            const firstCell = row.cells[0]; // Seleciona a primeira célula da linha
            const creditosCell = parseFloat(row.cells[2].innerText); // Obtém o valor dos créditos

            // Verifica se a célula já está sublinhada
            if (row.style.textDecoration === "underline") {
                // Remove o sublinhado
                row.style.textDecoration = "";
                // Adiciona os créditos de volta
                creditos += creditosCell;
            } else {
                // Subtrai os créditos
                creditos -= creditosCell;
                if (creditos<0)
                {
                    creditos += creditosCell;
                    alert("Número de créditos excedidos!");
                }
                else
                    // Sublinha a célula
                    row.style.textDecoration = "underline";
                
            }

            // Atualiza o texto dos créditos
            creditosElement.innerText = `Créditos: ${creditos}`;
        });
    });
});
</script>
