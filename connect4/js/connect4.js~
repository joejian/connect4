//Code was taken and revised from:
//http://www.javascriptsource.com/games/connect-4.html

var vals = new Array();
var gameActive = 0;

function rePlay() {
    if (gameActive == 1) {
	clearBoard();
    }
    for (var c1 = 0; c1 <= 6; c1++) {
	vals[c1] = 0;
    }
}

var redSpot = new Image();
var blackSpot = new Image();
var emptySpot = new Image();
var emptyChecker = new Image();
var redChecker = new Image();
var blackChecker = new Image();



var whosTurn = "red";
var whosTurnSpot = new Image();
var whosTurnChecker = new Image();
whosTurnSpot.src = redSpot.src;
whosTurnChecker.src = redChecker.src;

function clearBoard() {
    for (var a = 7; a <= 48; a++) {
	document.images[a].src = emptySpot.src;
    }
}

function placeTop(picToPlace) {
    if (gameActive == 1) {
	document.images[picToPlace].src = whosTurnChecker.src;
    }
}

function unPlaceTop(picToUnplace) {
    if (gameActive == 1) {
	document.images[picToUnplace].src = emptyChecker.src;
    }
}

var placeLoc;
function dropIt(whichRow) {
    if (gameActive == 1) {
	placeLoc = (7 - vals[whichRow]) * 7 -7 + whichRow;
	if (vals[whichRow] < 6) {
	    postRow(whichRow);
	    document.images[placeLoc].src = whosTurnSpot.src;
	    vals[whichRow] = vals[whichRow] + 1;
	    checkForWinner(whosTurn);
	    switchTurns();
	    placeTop(whichRow);
	}
    }
}


function switchTurns() {
    if (gameActive == 1) {
	if (whosTurn == "red") {
	    whosTurn = "black";
	    whosTurnSpot.src = blackSpot.src;
	    whosTurnChecker.src = blackChecker.src;
	    document.formo.texter.value = blackPlayer + "'s turn.";
	} else {
	    whosTurn = "red";
	    whosTurnSpot.src = redSpot.src;
	    whosTurnChecker.src = redChecker.src;
	    document.formo.texter.value = redPlayer + "'s turn.";
	}
    }
}

function askForNames() {
    if (gameActive == 1) {
	if (whosFirst == redPlayer) {
	    document.formo.texter.value = redPlayer + "'s turn.";
	    whosTurn = "black";
	    switchTurns();
	    whosFirst = "red";
	} else {
	    document.formo.texter.value = blackPlayer + "'s turn.";
	    whosTurn = "red";
	    switchTurns();
	    whosFirst = "black";
	}
    }
}

var lookForSrc;
var someOneWon;
var rowsFull = 0;
function checkForWinner(colorToCheck) {
    if (gameActive == 1) {
	someOneWon = 0;
	if (colorToCheck == "red") {
	    lookForSrc = redSpot.src;
	}
	if (colorToCheck == "black") {
	    lookForSrc = blackSpot.src;
	}
	rowsFull = 0;
	for (var counter = 7; counter <= 48; counter++) {
	    if (document.images[counter].src == lookForSrc) {
		if ((counter + 3 <= 48 
		&& counter != 11 && counter != 12 && counter != 13 
		&& counter != 18 && counter != 19 && counter != 20 
		&& counter != 25 && counter != 26 && counter != 27 
		&& counter != 32 && counter != 33 && counter != 34 
		&& counter != 39 && counter != 40 && counter != 41
		&& document.images[counter + 1].src == lookForSrc
		&& document.images[counter + 2].src == lookForSrc
		&& document.images[counter + 3].src == lookForSrc) 
		|| (counter + 3 * 7 <= 48
		&& document.images[counter + 7].src == lookForSrc
		&& document.images[counter + 7*2].src == lookForSrc
		&& document.images[counter + 7*3].src == lookForSrc)
		|| (counter + 3 * 7 <= 48
		&& counter != 11 && counter != 12 && counter != 13 
		&& counter != 18 && counter != 19 && counter != 20 
		&& counter != 25 && counter != 26 && counter != 27 
		&& document.images[counter + 7 + 1].src == lookForSrc
		&& document.images[counter + 7*2 + 2].src == lookForSrc
		&& document.images[counter + 7*3 + 3].src == lookForSrc)
		|| (counter - 3 * 7 >= 7
		&& counter != 32 && counter != 33 && counter != 34 
		&& counter != 39 && counter != 40 && counter != 41
		&& counter != 46 && counter != 47 && counter != 48
		&& document.images[counter - 7 + 1].src == lookForSrc
		&& document.images[counter - 7*2 + 2].src == lookForSrc
		&& document.images[counter - 7*3 + 3].src == lookForSrc)) {
		    for (var c2 = 0; c2<= 6; c2++) {
			unPlaceTop(c2);
		    }
		    if (colorToCheck == "red") {
			alert(redPlayer + " wins.");
		    } else if (colorToCheck == "black") {
			alert(blackPlayer + " wins.");
		    }
		    gameActive = 0;
		    someOneWon = 1;
		    counter = 49;
		}
	    }
	}
	if (someOneWon != 1) {
	    for (var x = 0; x <= 6; x++) {
		if (vals[x] == 6) {
		    rowsFull += 1;
		}
	    }
	    if (rowsFull == 7) {
		for (var c3 = 0; c3<= 6; c3++) {
		    unPlaceTop(c3);
		}
		gameActive = 0;
		alert("This game has reached a draw.");
	    }
	}
    }
}

function newMatchUp() {
    gameActive = 1;
    rePlay();
    askForNames();
}