soundOff.addEventListener('click', async () => {
    soundOff.style.display = "none";
    soundOn.style.display = "block";
    audioMute(false);
    audioResume();
    notSound = false;
});


soundOn.addEventListener('click', async () => {
    soundOn.style.display = "none";
    soundOff.style.display = "block";
    // audioPause();
    audioMute(true);
    notSound = true;

});




btnStartQuiz.addEventListener('click', async () => {
    // Use the function with a callback
    checkIsExist(function(response) {
        if(response){
            textMesgValidation.style.display = "block";
            textMesgValidation.innerText = 'this user name is alredy exist';
        }
        else{
            quizDateTimeStart = getCurrentDateTime();
            componentsStartQuiz.style.display = "none";
            timer.style.display = "block";
            audioPlay(audioStart);
            intialaze();
            sleep(3800).then(() => {
                timer.style.display = "none";
                quizPage.style.display = "block";
                play();
            });
        }
    });
});





function intialaze(){
    questionIndex = 0;
    arrayWrongResponsIndexs.length = "";
    getQestions();
    questions = shuffleObjArray(questions);
    console.log(questions);

}    


function play(){

    nextQuestion();
    for(let i=0 ; i<buttonCards.length ; i++){
        buttonCards[i].addEventListener('click', async () => {
            clearInterval(idAnimaion);
            reponsAnimation(i , questionIndex);
            sleep(1000).then(() => {
                nextQuestion();
            });
            
        });
    }
}


function reponsAnimation(i , index){
    index--;
    questions[index] = getQestionWithResponce(questions[index].id);
    console.log(questions);
    if(i == questions[index].R_C_Indis){
        audioStop();
        audioPlay(audioRirghtAnswer);
        animationCard(i , true);
        calculeResult();
    }
    else {
        audioStop();
        audioPlay(audioWrongAnswer);
        wrongRespons(index);
        animationCard(questions[index].R_C_Indis);
        showFalseRepons(i);
    }
}


function nextQuestion(){
    if(questionIndex < questions.length ) {
        remply(questionIndex);
        moveBarTime(getDely(questionIndex) , questionIndex);
        activeCards();
        questionIndex++;
    }
    else{
        gameOver();
    }
}
function activeCards(){
    for(btn of buttonCards) btn.disabled = false;
    for(let j=0 ; j<4 ; j++) cards[j].setAttribute("class", 'card carde-'+(j+1));
}
