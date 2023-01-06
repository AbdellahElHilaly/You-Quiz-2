let textResult = document.getElementById('text-result-id');
let resultContainer = document.getElementById('result-container');
let btnTryAgain = document.getElementById('btn-again-quiz');

btnTryAgain.addEventListener('click', async () => {
    location.reload();
});

let myresult = 0;
function calculeResult(){
    return myresult++;
}

function showResult(){
    let right = calculeResult();
    quizUserScore = right;
    let wrong = questions.length - right;
    let percentage =  (right*100)/questions.length;
    let result = Array(right , wrong , percentage );
    animationNumber(result);
}

let arrayWrongResponsIndexs =  new Array();

function wrongRespons(index){
    arrayWrongResponsIndexs.push(index);
}

function showCorection(){
    resultContainer.innerHTML = '';
    
    for(index in questions){
        
        if(arrayWrongResponsIndexs.includes(Number(index))){
            
            resultContainer.innerHTML += 
                `
                <div class="card bg-danger">
                <div class="card-body">
                    <h5 class="card-title "><span class="fw-bold fs-4">${Number(index)+1}- </span>${questions[index].question}</h5>
                    <div class="card-text ">${questions[index].corectRepons}.</div>
                </div>
            </div>
            `;
        }
        else {
            resultContainer.innerHTML += 
                `
                <div class="card bg-success">
                <div class="card-body">
                    <h5 class="card-title "><span class="fw-bold fs-4">${Number(index)+1}- </span>${questions[index].question}</h5>
                    <div class="card-text ">${questions[index].corectRepons}.</div>
                </div>
            </div>
            `;
        }
        
    }
}
const ps = document.getElementsByClassName('p-result');



function animationNumber(result){
        audioStop();
        audioPlay(audioResult);
    let i=0;
    for (const p of ps) {
        let intervalId = setInterval(() => updateNumber(p), 100);
        setTimeout(() => {
            audioPause();
            clearInterval(intervalId);
            p.textContent = result[i++];
        }, 2500);
    }
}
function updateNumber(p) {
  p.textContent = Math.floor(Math.random() * 100);
}
    



