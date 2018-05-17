<?php
$db = new DataBase();
$idt_usuario = $_SESSION["idt_usuario"];
$username = $db->search("select nme_usuario from tb_usuario where idt_usuario = " . $idt_usuario);
?>

<html lang="en" ng-app="chatApp">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.0.1/firebase.js"></script>
    <script>
        // Inicialização do Firebase
        var config = {
            apiKey: "AIzaSyCtNQ8ZgMUY7pj92GEWtc69ac9q9bvHFqk",
            authDomain: "rpg-unnamed.firebaseapp.com",
            databaseURL: "https://rpg-unnamed.firebaseio.com",
            projectId: "rpg-unnamed",
            storageBucket: "rpg-unnamed.appspot.com",
            messagingSenderId: "832448915160"
        };
        firebase.initializeApp(config);
        //Recebe o ID da sala (será utilizado na app.js)
        var tableID = <?php echo json_encode($_GET['idt']); ?>;
        //Recebe o nome do usuário (será utilizado na app.js)
        var userName = <?php echo json_encode($username[0]['nme_usuario']); ?>;
    </script>


    <script src="app.js"></script>
    <script src="https://cdn.firebase.com/libs/angularfire/2.3.0/angularfire.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<!-- O que tiver "nr-" eu creio que não deva ser alterado, pois pode influenciar no funcionamento-->
<div ng-controller="ChatController">
    <div class="container"> <!-- Pode alterar -->
        <div class="panel panel-primary" id="chat-div"> <!-- Pode alterar -->
            <div class="panel-heading">Chat</div> <!-- Pode alterar -->
            <div class="panel-body"> <!-- Pode alterar -->
                <div class="chat-text">
                    <!-- mensagens salvas da sala -->
                    <p ng-repeat="m in messages"><b>{{m.user}}:</b> {{m.message}} - {{m.date | date:'medium'}}</p>
                    <!-- O messageText será substituido pela mensagem que os dados gerarão" -->
                </div>
            </div>
            <div id="btn-list">
                <button id="d4-btn" onclick="D4('D4',4);" class="btn btn-primary">D4</button>
                <button id="d6-btn" onclick="D6('D6',6);" class="btn btn-primary">D6</button>
                <button id="d8-btn" onclick="D8('D8',8);" class="btn btn-primary">D8</button>
                <button id="d10-btn" onclick="D10('D10',10);" class="btn btn-primary">D10</button>
                <button id="d12-btn" onclick="D12('D12',12);" class="btn btn-primary">D12</button>
                <button id="d16-btn" onclick="D16('16',16);" class="btn btn-primary">D16</button>
                <button id="d20-btn" onclick="D20('D20',20);" class="btn btn-primary">D20</button>
                <button id="d100-btn" onclick="D100('D100',100);" class="btn btn-primary">D100</button>
            </div>
            <!-- Essa função send() será inserida em cada dado -->
            <div id="submitBtn">
                <button type="submit" class="btn btn-primary" ng-click="send()">Rolar o dado</button>
            </div>
        </div>
    </div>
</div>
</html>