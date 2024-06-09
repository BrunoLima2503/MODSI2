<?php
  /*session_start(); // Inicia a sessão

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if (isset($_COOKIE['username'])) {
        //echo "Welcome, " . htmlspecialchars($_COOKIE['username']) . "!";
        echo "<script>alert('Acesso negado. Faça login para continuar.')</script>";
    } else {
        echo "Cookie not set.";
    }
  }
  */
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interface Inicial</title>
  <link rel="stylesheet" href="styles.css">
</head>

  <body>
    <div class="Section8" style="width: 360px; height: 800px; background: white">
        <div class="Rectangle5"
          style="width: 360px; height: 526px; left: 0px; top: 274px; position: absolute; background: #FFFF01"></div>
        <div class="Rectangle1"
          style="width: 137px; height: 148px; left: 198px; top: 349px; position: absolute; background: black; border-radius: 25px">
        </div>
        <div class="Rectangle4"
          style="width: 137px; height: 148px; left: 198px; top: 559px; position: absolute; background: black; border-radius: 25px">
        </div>
        <div class="Rectangle3"
          style="width: 137px; height: 148px; left: 23px; top: 349px; position: absolute; background: black; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 25px; border: 1px black solid">
        </div>
        <div class="Rectangle2"
          style="width: 137px; height: 148px; left: 23px; top: 559px; position: absolute; background: black; border-radius: 25px">
        </div>
        <a href="Fantasy.php" style="text-decoration: none;">
          <div class="Fantasy"
            style="width: 97px; height: 32px; left: 218px; top: 407px; position: absolute; text-align: center; color: white; font-size: 16px;  font-style: italic; font-weight: 700; word-wrap: break-word">
            Fantasy</div>
        </a>
        <a href="Perfil da Etapa.html" style="text-decoration: none;">
          <div class="PerfilDaEtapa"
            style="width: 137px; height: 31px; left: 23px; top: 618px; position: absolute; text-align: center; color: white; font-size: 16px;  font-style: italic; font-weight: 700; word-wrap: break-word">
            Perfil da etapa</div>
        </a>
        <a href="Lista de Saida.php" style="text-decoration: none;">
          <div class="ListaDeSaDa"
            style="width: 137px; height: 31px; left: 199px; top: 618px; position: absolute; text-align: center; color: white; font-size: 16px;  font-style: italic; font-weight: 700; word-wrap: break-word">
            Lista de saída</div>
        </a>
      
        <a href="Classificacoes.php" style="text-decoration: none;">
          <div class="ClassicaEs"
            style="width: 97px; height: 32px; left: 43px; top: 407px; position: absolute; text-align: center; color: white; font-size: 16px;  font-style: italic; font-weight: 700; word-wrap: break-word">
            Classicações</div>
        </a>
      
        <img class="Letour1" style="width: 360px; height: 274px; left: 0px; top: 0px; position: absolute"
          src="Fotos/Tour de France.png" />
      
          <a href="Login.html" style="text-decoration: none;">
            <div class="Group7" style="width: 40px; height: 40px; left: 19px; top: 14px; position: absolute">
              <div class="Ellipse1"
                style="width: 40px; height: 40px; left: 0px; top: 0px; position: absolute; background: white; border-radius: 9999px; border: 2px black solid">
              </div>
              <img class="Image1" style="width: 16px; height: 16px; left: 14px; top: 12px; position: absolute"
                src="Fotos/icone login 16x16.png" />
            </div>
          </a>
          <a href="Logout.php" style="text-decoration: none;">
            <img class="Image1" style="width: 16px; height: 16px; left: 75px; top: 25px; position: absolute"
            src="Fotos/logout.png" />
          </a>

          <a href="role_decision.php" style="text-decoration: none;"> 
          <img class="EditButton" style="width: 16px; height: 20px; left: 315px; top: 25px; position: absolute"
          src="Fotos/edit_button.png" />
          </a>

          <!--<form id="myForm" method="post">
          <img class="EditButton" style="width: 16px; height: 20px; left: 315px; top: 25px; position: absolute" src="Fotos/edit_button.png" alt="Edit Button" onclick="handleClick(event)" />        <
          </form>-->
            
      </div>
</body>

    <script>
    function handleClick(event) {
        event.preventDefault(); //Previne a submissão por defeito do Form
        /*let username = getCookie("username");
        if(){

        }*/
        
        

    }
    function getCookie(name) {
            let cookieArr = document.cookie.split(";");
            for(let i = 0; i < cookieArr.length; i++) {
                let cookiePair = cookieArr[i].split("=");
                if(name == cookiePair[0].trim()) {
                    return decodeURIComponent(cookiePair[1]);
                }
            }
            return null;
        }

    //let role = getCookie("Role");
    //alert(role);
    // Retrieve the cookie
    /*window.onload = function() {
        let username = getCookie("username");
        if (username) {
            document.getElementById("username").innerText = "Username: " + username;
            alert(username);
        } else {
            document.getElementById("username").innerText = "Cookie 'username' is not set!";
        } 
        };*/
</script>
</html>

