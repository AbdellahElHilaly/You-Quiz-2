
function remply(index){
    textQuestion.innerText = questions[index].question;
    let i=0;
    for(let cardText of cardTexts){
        cardText.innerText= questions[index].repons[i++];
    }
}
