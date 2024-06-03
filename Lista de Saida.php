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


<div class="Section20" style="width: 360px; height: 800px; background: #032383; position: relative;">
    <img class="Z3snnqskliwpnwjflqrqmsql2"
        style="width: 360px; height: 143px; left: 0px; top: 0px; position: absolute; opacity: 0.80"
        src="Fotos/Banner.png" />
    <div class="ListaDeSaDa"
        style="width: 361px; height: 17px; left: 0px; top: 111px; position: absolute; text-align: center; color: white; font-size: 24px; font-family: Inter; font-style: italic; font-weight: 700; word-wrap: break-word">
        Lista de Saída</div>

        <form method="GET" action="" class="Group11" style="width: 333px; height: 31.46px; left: 12px; top: 171px; position: absolute">
        <div class="Rectangle7"
            style="width: 333px; height: 31.46px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 23px">
        </div>
        <img class="Lupa1" style="width: 22.20px; height: 19.54px; left: 12.95px; top: 5.47px; position: absolute"
            src="Fotos/lupa 1.png" />
        <input type="text" name="search" placeholder="Search" style="width: 250px; height: 15.63px; left: 35.15px; top: 7.82px; position: absolute; border: none; background: transparent;" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        </form>

    <div class="Rectangle9" style="width: 330px; height: 548px; left: 15px; top: 231px; position: absolute; background: #D9D9D9">
        <table>
            <thead>
                <tr>
                    <th>Nome do Ciclista</th>
                    <th>Equipa</th>
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
                
                // Parte Adicionada: Captura e Sanitização da Entrada de Pesquisa
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $search = $conn->real_escape_string($search);


                $sql = "SELECT * FROM Lista_de_Saída"; //INSERT INTO `Lista_de_Saída` (Posição, Atleta, Equipa) VALUES ('1', 'Xavi', 'Nome da equipa');
                
                if (!empty($search)) {
                    $sql .= " WHERE `Atleta` LIKE '%$search%'";
                }

                $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    //Read data of each row
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                            <td>" . $row["Atleta"] . "</td>
                            <td>" . $row["Equipa"] . "</td>
                        </tr>";
                    }
                ?>         
            </tbody>
        </table>

        
    </div>
        
    <a href="Interface Inicial.html" style="text-decoration: none;">
        <div class="ArrowCircle"
            style="width: 34px; height: 34px; left: 13px; top: 11px; position: absolute; background: black; border-radius: 9999px">
        </div>
        <img class="ArrowVector2"
            style="width: 20px; height: 12px; left: 40px; top: 34px; position: absolute; transform: rotate(-180deg); transform-origin: 0 0"
            src="Fotos/Arrow Vector 0.png" />
        </div>
    </a>

