
function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}

function getDely(index){
    if( questions[index].deficulty == 1) return 8;
    else if( questions[index].deficulty == 2) return 12;
    else if( questions[index].deficulty == 3) return 15;
    else if( questions[index].deficulty == 4) return 20;
    else if( questions[index].deficulty == 5) return 30;

    // return 1;
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

function audioPlay(path){
    if(audio){
        const audio = new Audio(path);
        audio.play();
    }
    
}



function getQestions(){
    // Create a new XMLHttpRequest object
    let  xhr = new XMLHttpRequest();
    // Set the endpoint URL
    let  url = "../../php/controller/crud.php";
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
            console.log(questions);
        }
    };
}

let uniquQuestion;

function getQestionWithResponce(id){
    
    // Create a new XMLHttpRequest object
    let  xhr = new XMLHttpRequest();

    // Set the endpoint URL
    let  url = "../../php/controller/crud.php";

    // Set the HTTP method to POST
    xhr.open("POST", url , false);

    // Set the content type to application/x-www-form-urlencoded
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Send the request with the data
    maydata = JSON.stringify(questionsJSON);
    const data = {
        "get-respons": "",
        "id": id,
    };
    

    xhr.onload = function() {
        if (xhr.status == 200) {
            // Process the response
            let response = xhr.responseText;
            uniquQuestion = JSON.parse(response);
            
            
        }
    };


    xhr.send(encodeForAjax(data));

    return uniquQuestion;
}

function encodeForAjax(data) {
    return Object.keys(data).map(function(k) {
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

