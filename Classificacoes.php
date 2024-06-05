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
            style="width: 90px; height: 31px; left: 15px; top: 150px; position: absolute; text-align: center; color: black; font-size: 20px; font-family: Inter; font-style: italic; font-weight: 700; word-wrap: break-word">
            Etapa</div>
        <div class="Geral"
            style="width: 90px; height: 28px; left: 129px; top: 150px; position: absolute; text-align: center; color: black; font-size: 20px; font-family: Inter; font-style: italic; font-weight: 700; word-wrap: break-word">
            Geral</div>
        <div class="Equipas"
            style="width: 99px; height: 31px; left: 243px; top: 150px; position: absolute; text-align: center; color: black; font-size: 20px; font-family: Inter; font-style: italic; font-weight: 700; word-wrap: break-word">
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
        <div class="Frame8" style="width: 630px; height: 22px; left: -56px; top: 238px; position: absolute">
            <div class="Etapa1" id="Etapa1" onclick="showStage(1)"
                style="width: 184px; height: 38px; left: 0px; top: 0px; position: absolute; text-align: center; color: black; font-size: 16px; font-family: Inter; font-style: italic; font-weight: 700; word-wrap: break-word">
                Etapa 1</div>
            <div class="Etapa2" id="Etapa2" onclick="showStage(2)"
                style="width: 184px; height: 38px; left: 71px; top: 0px; position: absolute; text-align: center; color: black; font-size: 16px; font-family: Inter; font-style: italic; font-weight: 700; word-wrap: break-word">
                Etapa 2</div>
            <div class="Etapa3" id="Etapa3" onclick="showStage(3)"
                style="width: 184px; height: 38px; left: 142px; top: 0px; position: absolute; text-align: center; color: black; font-size: 16px; font-family: Inter; font-style: italic; font-weight: 700; word-wrap: break-word">
                Etapa 3</div>
            <div class="Etapa5" id="Etapa5" onclick="showStage(5)"
                style="width: 184px; height: 38px; left: 284px; top: 0px; position: absolute; text-align: center; color: black; font-size: 16px; font-family: Inter; font-style: italic; font-weight: 700; word-wrap: break-word">
                Etapa 5</div>
            <div class="Etapa4" id="Etapa4" onclick="showStage(4)"
                style="width: 184px; height: 38px; left: 213px; top: 0px; position: absolute; text-align: center; color: black; font-size: 16px; font-family: Inter; font-style: italic; font-weight: 700; word-wrap: break-word">
                Etapa 4</div>
        </div>
        <div class="Rectangle9">
            <table>
                <thead>
                    <tr>
                        <th>Posição</th>
                        <th>Nome do Ciclista</th>
                        <th>Tempo Total Etapas</th>
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

                    $sql = "SELECT Etapa_1.Posição_Etapa_1, Atleta.Nome, Etapa_1.Tempo 
                            FROM Etapa_1
                            JOIN Atleta ON Etapa_1.idAtleta = Atleta.id"; //Fazer o JOIN da tabela Atleta com a tabela Etapa_1 para mostrar o Atleta com o respetivo id na tabela da interface.
                        $result = $conn->query($sql);

                        if (!$result) {
                            die("Invalid query: " . $conn->error);
                        }

                        //Read data of each row
                        while($row = $result->fetch_assoc()){
                            echo "<tr>
                                <td>" . $row["Posição_Etapa_1"] . "</td>
                                <td>" . $row["Nome"] . "</td>
                                <td>" . $row["Tempo"] . "</td>
                            </tr>";
                        }

                        $conn->close();
                        exit();

                    ?>
                    
                </tbody>
            </table>
        </div>

        <a href="Interface Inicial.html" style="text-decoration: none;">
            <div class="ArrowCircle"
                style="width: 34px; height: 34px; left: 11px; top: 10px; position: absolute; background: black; border-radius: 9999px">
            </div>
            <img class="ArrowVector3"
                style="width: 20px; height: 12px; left: 38px; top: 33px; position: absolute; transform: rotate(-180deg); transform-origin: 0 0"
                src="Fotos/Arrow Vector 0.png" />
            </div>
        </a>


</body>
</html>
