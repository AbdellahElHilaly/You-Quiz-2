function gameOver(){


    sleepCards();
    chancheContent(3); //container-page/progres-title.js
    showResult();
    showCorection();
    
    // btnStartQuiz.style.display = "block";
    // quizPage.style.display = "none";
    // intialaze();

    console.log(quizDateTimeStart);
    console.log(quizUserScore);

    sendQuizResult(function(response) {
        console.log(response);
    });
}

