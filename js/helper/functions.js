
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

