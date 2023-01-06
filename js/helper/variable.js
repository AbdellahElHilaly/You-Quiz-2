let textQuestion = document.getElementById('text-question-id');
let cards = document.getElementsByTagName('card');
let cardTexts = document.getElementsByClassName('card-text');
let buttonCards = document.getElementsByClassName('card-button');
let btnStartQuiz = document.getElementById('btn-start-quiz');
let quizPage = document.getElementById('quiz-page');
let timer = document.getElementById('timer-id');
let soundOn = document.getElementById('sound-on-id');
let soundOff = document.getElementById('sound-off-id');
let userNameInput = document.getElementById('username-input-id');
let componentsStartQuiz = document.getElementById('valiadation-container-id');
let textMesgValidation = document.getElementById('message-validation-id');
let quizDateTimeStart;
let quizUserScore = 0 ;



soundOff.style.display = "none";
timer.style.display = "none";
let questionIndex = 0;
quizPage.style.display = "none";

let questions = new Array();
let notSound = false;
let audioStart = new Audio('../../assets/MP3/audio.mp3'); 
let audioWrongAnswer = new Audio('../../assets/MP3/audio-false.mp3'); 
let audioRirghtAnswer = new Audio('../../assets/MP3/aoudio-true.wav'); 
let audioResult = new Audio('../../assets/MP3/number_randome.mp3'); 
let fileMp3 =new Audio();

let isMuted = false; // flag to track if the sound is currently muted