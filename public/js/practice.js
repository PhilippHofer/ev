var words = null;
var currWord = null;
var mode = null;   // englisch or german
var wait = true;    // wait for response of check

$(document).ready(function(){
    $("#wordInput").bind("enterKey", function(e){
        submitWord();
    });

    $("#wordInput").keyup(function(e){
        if(e.keyCode == 13)
        {
            $(this).trigger("enterKey");
        }
    });
});

function chooseBox(box) {
    var path = "/json/words/box/" + box;
    console.log(path);
    $.get(path, function( data ) {
        words = shuffle(data);
        nextWord();
    });
}

function nextWord() {
    if(words.length < 1) {
        $("#text").show();
        $("#inputForm").hide();
        $("#text").html("Die ausgewählte Box ist leer.");
        return;
    }
    var r = Math.random()*100;
    currWord = words.shift();
    var question = currWord['english'];
    mode = 'english';
    if(r < percent) {   /* German */
        question = currWord['german'];
        mode = 'german';
    }

    $("#text").hide();
    $("#inputForm").show();
    $("#word").html(getRandomValue(question));
    $("#wordInput").val("");
    wait = false;
}

function submitWord() {
    $("#error").hide();
    $("#success").hide();
    var val = $("#wordInput").val();
    if(wait || currWord == null) {
        return;
    }

    if(val.length <= 0) {   // skip this word
        words.push(currWord);
        nextWord();
        return;
    }


    wait = true;

    $.get("/json/words/check/", {word: currWord['id'], mode: mode, value: val}, function(data){
        data = $.parseJSON(data);
        var result = data['result'];
        var countWords = data['countWords'];
        var boxes = data['boxes'];
        if(result == 'success') {
            $("#success").show();
            $("#successContent").html('Letztes wort war richtig! <ul><li>' + getRandomValue(currWord['german']) + ' =>' + getRandomValue(currWord['english']) + "</li></ul>");
        } else {
            $("#error").show();
            $("#errorContent").html('Letztes wort war falsch! <ul><li>' + getRandomValue(currWord['german']) + ' =>' + getRandomValue(currWord['english']) + '</li><li>du hast eingeben: "' + val + '" </li></ul>');
        }

        // update boxes
        var boxHTML = "";
        for (var k in boxes){
            if (boxes.hasOwnProperty(k)) {
                boxHTML += '<div class="row"><div class="small-12 medium-2 large-2 column">';
                boxHTML += 'Stufe ' + k + ': ' + boxes[k] + '/' + countWords + '</div>';

                boxHTML += '<div class="small-12 medium-6 large-8 column">';
                boxHTML += '<div class="ui blue progress">';
                boxHTML += '<div class="bar" style="width: ' + (boxes[k]/countWords)*100 + '%;"></div></div></div>';

                boxHTML += '<div class="small-12 medium-4 large-2 column">';
                boxHTML += '<a class="ui green submit button" onclick="chooseBox(' + k + ')">Üben</a></div></div>';

            }
        }

        $("#boxes").html(boxHTML);

        nextWord();
    });


}

function shuffle(array) {
    var currentIndex = array.length, temporaryValue, randomIndex ;

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {

        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
}

function getRandomValue(word) {
    var split = word.split("/");

    var ret =  split[Math.floor(Math.random()*split.length)];
    return ret;
}