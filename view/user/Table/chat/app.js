var diceResult = "";
var diceType = "";
var diceNumber = 0;

function restartDice(dice, diceValue) {
    diceResult = dice + " (";
    diceResult += Math.floor((Math.random() * diceNumber) + 1);
    diceResult += ")";
}

function D4(dice, diceValue) {
    diceType = dice;
    diceNumber = diceValue;

    document.getElementById("d4-btn").setAttribute("class", "btn btn-primary selected");
    document.getElementById("d6-btn").classList.remove("selected");
    document.getElementById("d8-btn").classList.remove("selected");
    document.getElementById("d10-btn").classList.remove("selected");
    document.getElementById("d12-btn").classList.remove("selected");
    document.getElementById("d16-btn").classList.remove("selected");
    document.getElementById("d20-btn").classList.remove("selected");
    document.getElementById("d100-btn").classList.remove("selected");

    diceResult = "D4 (";
    diceResult += Math.floor((Math.random() * 4) + 1);
    diceResult += ")";

}
function D6(dice, diceValue) {
    diceType = dice;
    diceNumber = diceValue;

    document.getElementById("d6-btn").setAttribute("class", "btn btn-primary selected");
    document.getElementById("d4-btn").classList.remove("selected");
    document.getElementById("d8-btn").classList.remove("selected");
    document.getElementById("d10-btn").classList.remove("selected");
    document.getElementById("d12-btn").classList.remove("selected");
    document.getElementById("d16-btn").classList.remove("selected");
    document.getElementById("d20-btn").classList.remove("selected");
    document.getElementById("d100-btn").classList.remove("selected");

    diceResult = "D6 (";
    diceResult += Math.floor((Math.random() * 6) + 1);
    diceResult += ")";
}
function D8(dice, diceValue) {
    diceType = dice;
    diceNumber = diceValue;

    document.getElementById("d8-btn").setAttribute("class", "btn btn-primary selected");
    document.getElementById("d6-btn").classList.remove("selected");
    document.getElementById("d4-btn").classList.remove("selected");
    document.getElementById("d10-btn").classList.remove("selected");
    document.getElementById("d12-btn").classList.remove("selected");
    document.getElementById("d16-btn").classList.remove("selected");
    document.getElementById("d20-btn").classList.remove("selected");
    document.getElementById("d100-btn").classList.remove("selected");

    diceResult = "D8 (";
    diceResult += Math.floor((Math.random() * 8) + 1);
    diceResult += ")";
}
function D10(dice, diceValue) {
    diceType = dice;
    diceNumber = diceValue;


    document.getElementById("d10-btn").setAttribute("class", "btn btn-primary selected");
    document.getElementById("d6-btn").classList.remove("selected");
    document.getElementById("d8-btn").classList.remove("selected");
    document.getElementById("d4-btn").classList.remove("selected");
    document.getElementById("d12-btn").classList.remove("selected");
    document.getElementById("d16-btn").classList.remove("selected");
    document.getElementById("d20-btn").classList.remove("selected");
    document.getElementById("d100-btn").classList.remove("selected");

    diceResult = "D10 (";
    diceResult += Math.floor((Math.random() * 10) + 1);
    diceResult += ")";
}
function D12(dice, diceValue) {
    diceType = dice;
    diceNumber = diceValue;


    document.getElementById("d12-btn").setAttribute("class", "btn btn-primary selected");
    document.getElementById("d6-btn").classList.remove("selected");
    document.getElementById("d8-btn").classList.remove("selected");
    document.getElementById("d10-btn").classList.remove("selected");
    document.getElementById("d4-btn").classList.remove("selected");
    document.getElementById("d16-btn").classList.remove("selected");
    document.getElementById("d20-btn").classList.remove("selected");
    document.getElementById("d100-btn").classList.remove("selected");

    diceResult = "D12 (";
    diceResult += Math.floor((Math.random() * 12) + 1);
    diceResult += ")";
}
function D16(dice, diceValue) {
    diceType = dice;
    diceNumber = diceValue;


    document.getElementById("d16-btn").setAttribute("class", "btn btn-primary selected");
    document.getElementById("d6-btn").classList.remove("selected");
    document.getElementById("d8-btn").classList.remove("selected");
    document.getElementById("d10-btn").classList.remove("selected");
    document.getElementById("d12-btn").classList.remove("selected");
    document.getElementById("d4-btn").classList.remove("selected");
    document.getElementById("d20-btn").classList.remove("selected");
    document.getElementById("d100-btn").classList.remove("selected");

    diceResult = "D16 (";
    diceResult += Math.floor((Math.random() * 16) + 1);
    diceResult += ")";
}
function D20(dice, diceValue) {
    diceType = dice;
    diceNumber = diceValue;


    document.getElementById("d20-btn").setAttribute("class", "btn btn-primary selected");
    document.getElementById("d6-btn").classList.remove("selected");
    document.getElementById("d8-btn").classList.remove("selected");
    document.getElementById("d10-btn").classList.remove("selected");
    document.getElementById("d12-btn").classList.remove("selected");
    document.getElementById("d16-btn").classList.remove("selected");
    document.getElementById("d4-btn").classList.remove("selected");
    document.getElementById("d100-btn").classList.remove("selected");

    diceResult = "D20 (";
    diceResult += Math.floor((Math.random() * 20) + 1);
    diceResult += ")";
}
function D100(dice, diceValue) {
    diceType = dice;
    diceNumber = diceValue;


    document.getElementById("d100-btn").setAttribute("class", "btn btn-primary selected");
    document.getElementById("d6-btn").classList.remove("selected");
    document.getElementById("d8-btn").classList.remove("selected");
    document.getElementById("d10-btn").classList.remove("selected");
    document.getElementById("d12-btn").classList.remove("selected");
    document.getElementById("d16-btn").classList.remove("selected");
    document.getElementById("d20-btn").classList.remove("selected");
    document.getElementById("d4-btn").classList.remove("selected");

    diceResult = "D100 (";
    diceResult += Math.floor((Math.random() * 100) + 1);
    diceResult += ")";
}

var app = angular.module('chatApp', ['firebase']);
var id = parseInt(tableID);
app.controller('ChatController', function ($scope, $firebaseArray) {
    //Referencia as mensagens e filtra de acordo com o ID da sala
    var ref = firebase.database().ref("/messages").orderByChild("table").equalTo(id);
    ;
    //Monta o array
    $scope.messages = $firebaseArray(ref);

    //Função que adiciona mensagens ao banco
    $scope.send = function () {
        $scope.messages.$add({
            message: diceResult,
            user: userName,
            table: id,
            date: Date.now()
        })
        restartDice(diceType, diceNumber);
    }
})

