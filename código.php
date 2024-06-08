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

$type = $_GET['type'];
$stage = $_GET['stage'];

// SQL para classificação geral
if ($type == 'Geral') {
    if ($stage == 1) {
        $sql = "SELECT Etapa_$stage.Posição_Etapa_$stage, Atleta.Nome, Atleta.id AS idAtleta, Etapa_$stage.Tempo 
                FROM Etapa_$stage
                JOIN Atleta ON Etapa_$stage.idAtleta = Atleta.id";
    } else if ($stage == 2) {
        $sql = "SELECT Atleta.id AS idAtleta, Atleta.Nome, 
                SEC_TO_TIME(SUM(TIME_TO_SEC(Etapa_1.Tempo + Etapa_2.Tempo))) AS TempoTotal 
                FROM Atleta
                LEFT JOIN Etapa_1 ON Atleta.id = Etapa_1.idAtleta
                LEFT JOIN Etapa_2 ON Atleta.id = Etapa_2.idAtleta
                GROUP BY Atleta.id, Atleta.Nome
                ORDER BY TempoTotal ASC";
    } else if ($stage == 3) {
        $sql = "SELECT Atleta.id AS idAtleta, Atleta.Nome, 
                SEC_TO_TIME(SUM(TIME_TO_SEC(Etapa_1.Tempo + Etapa_2.Tempo + Etapa_3.Tempo))) AS TempoTotal 
                FROM Atleta
                LEFT JOIN Etapa_1 ON Atleta.id = Etapa_1.idAtleta
                LEFT JOIN Etapa_2 ON Atleta.id = Etapa_2.idAtleta
                LEFT JOIN Etapa_3 ON Atleta.id = Etapa_3.idAtleta
                GROUP BY Atleta.id, Atleta.Nome
                ORDER BY TempoTotal ASC";
    } else if ($stage == 4) {
        $sql = "SELECT Atleta.id AS idAtleta, Atleta.Nome, 
                SEC_TO_TIME(SUM(TIME_TO_SEC(Etapa_1.Tempo + Etapa_2.Tempo + Etapa_3.Tempo + Etapa_4.Tempo))) AS TempoTotal 
                FROM Atleta
                LEFT JOIN Etapa_1 ON Atleta.id = Etapa_1.idAtleta
                LEFT JOIN Etapa_2 ON Atleta.id = Etapa_2.idAtleta
                LEFT JOIN Etapa_3 ON Atleta.id = Etapa_3.idAtleta
                LEFT JOIN Etapa_4 ON Atleta.id = Etapa_4.idAtleta
                GROUP BY Atleta.id, Atleta.Nome
                ORDER BY TempoTotal ASC";
    } else if ($stage == 5) {
        $sql = "SELECT Atleta.id AS idAtleta, Atleta.Nome, 
                SEC_TO_TIME(SUM(TIME_TO_SEC(Etapa_1.Tempo + Etapa_2.Tempo + Etapa_3.Tempo + Etapa_4.Tempo + Etapa_5.Tempo))) AS TempoTotal 
                FROM Atleta
                LEFT JOIN Etapa_1 ON Atleta.id = Etapa_1.idAtleta
                LEFT JOIN Etapa_2 ON Atleta.id = Etapa_2.idAtleta
                LEFT JOIN Etapa_3 ON Atleta.id = Etapa_3.idAtleta
                LEFT JOIN Etapa_4 ON Atleta.id = Etapa_4.idAtleta
                LEFT JOIN Etapa_5 ON Atleta.id = Etapa_5.idAtleta
                GROUP BY Atleta.id, Atleta.Nome
                ORDER BY TempoTotal ASC";
    } else {
        echo "Invalid stage";
        $conn->close();
        exit();
    }
    
    $result = $conn->query($sql);

        if (!$result) {
            die("Invalid query: " . $conn->error);
        }

        //Read data of each row
        while($row = $result->fetch_assoc()){
            echo "<tr>
                <td>" . $row["Posição_Etapa_$stage"] . "</td>
                <td>" . $row["Nome"] . "</td>
                <td>" . $row["TempoTotal"] . "</td>
            </tr>";
        }
} else if (in_array($stage, range(1, 5))) {
    // SQL para classificação por etapa
    $sql = "SELECT Etapa_$stage.Posição_Etapa_$stage, Atleta.Nome, Atleta.id AS idAtleta, Etapa_$stage.Tempo 
            FROM Etapa_$stage
            JOIN Atleta ON Etapa_$stage.idAtleta = Atleta.id";

    $result = $conn->query($sql);

    if (!$result) {
        die("Invalid query: " . $conn->error);
    }

    while($row = $result->fetch_assoc()){
        echo "<tr>
            <td>" . $row["Posição_Etapa_$stage"] . "</td>
            <td>" . $row["Nome"] . "</td>
            <td>" . $row["Tempo"] . "</td>
        </tr>";
    }
} else {
    echo "Invalid type or stage";
}

$conn->close();
exit();
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificações</title>
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
    <script>
        function showStage(type, stage = null) {
            var xhr = new XMLHttpRequest();
            var url = 'getStage.php?type=' + type;
            if (stage) {
                url += '&stage=' + stage;
            }
            xhr.open('GET', url, true);
            xhr.onload = function () {
                if (this.status == 200) {
                    document.querySelector('tbody').innerHTML = this.responseText;
                }
            };
            xhr.send();
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('Etapa').addEventListener('click', function() {
                showStage('Etapa', 1);
            });
            document.getElementById('Geral').addEventListener('click', function() {
                showStage('Geral');
            });
        });
    </script>
</head>
<body>
    <div class="Section15" style="width: 360px; height: 800px; background: #032383; position: relative;">
        <div class="Rectangle10"
            style="width: 360px; height: 42px; left: 0px; top: 143px; position: absolute; background: #D9D9D9"></div>
        <img class="Z3snnqskliwpnwjflqrqmsql2"
            style="width: 360px; height: 143px; left: 0px; top: 0px; position: absolute; opacity: 0.80"
            src="Fotos/Banner.png" />
        <div class="ClassificaEs"
            style="width: 361px; height: 17px; left: 0px; top: 111px; position: absolute; text-align: center; color: white; font-size: 24px; font-family: Inter; font-style: italic; font-weight: 700; word-wrap: break-word">
            Classificações</div>
        <div class="Etapa"
            style="width: 90px; height: 31px; left: 15px; top: 150px; position: absolute; text-align: center; color: black; font-size: 20px; font-family: Inter; font-style: italic; font-weight: 700; word-wrap: break-word; cursor: pointer;"
            id="Etapa">
            Etapa</div>
        <div class="Geral"
            style="width: 90px; height: 28px; left: 129px; top: 150px; position: absolute; text-align: center; color: black; font-size: 20px; font-family: Inter; font-style: italic; font-weight: 700; word-wrap: break-word; cursor: pointer;"
            id="Geral">
            Geral</div>
        <div class="Equipas"
            style="width: 99px; height: 31px; left: 243px; top: 150px; position: absolute; text-align: center; color: black; font-size: 20px; font-family: Inter; font-style: italic; font-weight: 700; word-wrap: break-word; cursor: pointer;"
            id="Equipas">
            Equipas</div>
        <div class="Group8" style="width: 333px; height: 31.46px; left: 11px; top: 190px; position: absolute">
            <div class="Rectangle7"
                style="width: 333px; height: 31.46px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 23px">
            </div>
            <img class="Lupa1" style="width: 22.20px; height: 19.54px; left: 12.95px; top: 5.47px; position: absolute"
                src="Fotos/lupa 1.png" />
            <div class="Search"
                style="width: 73.07px; height: 15.63px; left: 35.15px; top: 7.82px; position: absolute; text-align: center; color: black; font-size: 16px; font-family: Inter; font-weight: 100; word-wrap: break-word">
                Search</div>
        </div>
        <div class="Rectangle10"
            style="width: 360px; height: 39px; left: 0px; top: 228px; position: absolute; background: #D9D9D9"></div>
        
        <div class="Frame12" style="width: 630px; height: 22px; left: -56px; top: 237px; position: absolute">
            <div class="Etapa1" id="Etapa1" onclick="showStage('Etapa', 1)"
                style="width: 64px; height: 38px; left: 62px; top: 0px; position: absolute; text-align: center; color: black; font-size: 15px; font-family: Inter; font-weight: 700; word-wrap: break-word; cursor: pointer;">
                Etapa 1</div>
            <div class="Etapa2" id="Etapa2" onclick="showStage('Etapa', 2)"
                style="width: 66px; height: 38px; left: 126px; top: 0px; position: absolute; text-align: center; color: black; font-size: 15px; font-family: Inter; font-weight: 700; word-wrap: break-word; cursor: pointer;">
                Etapa 2</div>
            <div class="Etapa3" id="Etapa3" onclick="showStage('Etapa', 3)"
                style="width: 66px; height: 38px; left: 198px; top: 0px; position: absolute; text-align: center; color: black; font-size: 15px; font-family: Inter; font-weight: 700; word-wrap: break-word; cursor: pointer;">
                Etapa 3</div>
            <div class="Etapa4" id="Etapa4" onclick="showStage('Etapa', 4)"
                style="width: 66px; height: 38px; left: 269px; top: 0px; position: absolute; text-align: center; color: black; font-size: 15px; font-family: Inter; font-weight: 700; word-wrap: break-word; cursor: pointer;">
                Etapa 4</div>
            <div class="Etapa5" id="Etapa5" onclick="showStage('Etapa', 5)"
                style="width: 66px; height: 38px; left: 341px; top: 0px; position: absolute; text-align: center; color: black; font-size: 15px; font-family: Inter; font-weight: 700; word-wrap: break-word; cursor: pointer;">
                Etapa 5</div>
        </div>

        <div class="Rectangle9">
            <table>
                <thead>
                    <tr>
                        <th>Posição</th>
                        <th>Nome</th>
                        <th>Tempo</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Os dados da classificação serão carregados aqui -->
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>