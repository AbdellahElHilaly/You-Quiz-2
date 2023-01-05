function validation(value){
    if(userNameValidate(value)) {
        btnStartQuiz.disabled = false;
        textMesgValidation.style.display = "none";
        
    }
    else {
        textMesgValidation.style.display = "block";
        btnStartQuiz.disabled = true;
    }

}
function userNameValidate(value){
    // Only allow letters, numbers, and underscores
    if (/^[a-zA-Z0-9_]+$/.test(value) === false) {
        textMesgValidation.innerText = "Only allow letters, numbers, and underscores";
        return false;
    }

    if (value.length < 4) {
        textMesgValidation.innerText = "little user name";
        return false;
    }
    
    

    
    return true;
}