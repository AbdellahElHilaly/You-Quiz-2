
function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}

function getDely(index){
    if( questions[index].deficulty == 1) return 8;
    else if( questions[index].deficulty == 2) return 12;
    else if( questions[index].deficulty == 3) return 15;
    else if( questions[index].deficulty == 4) return 20;
    else if( questions[index].deficulty == 5) return 30;
    // return 0.5;
}

function shuffleObjArray(array){
    let helpArray = new Array();
    for(let qstIndex in array){
        helpArray.push(qstIndex);
    }
    let shuffledHepleArray = shuffle(helpArray);
    let shufledArray = new Array();
    for(index in shuffledHepleArray){
        shufledArray.push(array[shuffledHepleArray[index]]);
    }
    return shufledArray;
}

function shuffle(array) {
    return array.sort(() => (Math.random() - 0.5));
}




function getQestions(){
    // Create a new XMLHttpRequest object
    let  xhr = new XMLHttpRequest();
    // Set the endpoint URL
    let  url = "../../php/controller/question.php";
    // Set the HTTP method to POST
    xhr.open("POST", url);
    // Set the content type to application/x-www-form-urlencoded
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    // Send the request with the data
    // maydata = JSON.stringify(questionsJSON);
    xhr.send("get-question");
    xhr.onload = function() {
        if (xhr.status == 200) {
            // Process the response
            let response = xhr.responseText;
            let qst = JSON.parse(response);
            questions = qst;
        }
    };
}

let uniquQuestion;
getQestionWithResponce(71);
function getQestionWithResponce(id){
    let  xhr = new XMLHttpRequest();
    let  url = "../../php/controller/question.php";
    xhr.open("POST", url , false);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if (xhr.status == 200) {
            // Process the response
            let response = xhr.responseText;
            uniquQuestion = JSON.parse(response);
        }
    };
    xhr.send("get-respons=&id=" + id);

    return uniquQuestion;
}


function getCurrentDateTime() {
    let now = new Date();
    return dateTimeString = now.toISOString();
}



function audioPlay(mp3){
    fileMp3 = mp3
    if(!notSound)
        fileMp3.play();

}
function audioPause(){
    fileMp3.pause(); 

}
function audioStop(){
    fileMp3.pause(); 
    fileMp3.currentTime = 0; 
}
function audioResume(){
    fileMp3.play(); 
}
function audioMute(bool){
    fileMp3.muted = bool; 
}
function muteSound() {
    if (isMuted) { 
        fileMp3.muted = false; 
      isMuted = false;
    } else {
        fileMp3.muted = true; 
      isMuted = true;
    }
  }