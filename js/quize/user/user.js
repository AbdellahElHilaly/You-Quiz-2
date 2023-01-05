function checkIsExist(callback) {
    let username = userNameInput.value;
    let xhr = new XMLHttpRequest();
    let url = "../../php/controller/user.php";
    xhr.open("POST", url);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("chek-user-isexist=" + username);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let response = xhr.responseText;
            response = JSON.parse(response);
            callback(response);
        }
    };
}

function sendQuizResult(callback) {
    let username = userNameInput.value;
    let xhr = new XMLHttpRequest();
    let url = "../../php/controller/user.php";
    xhr.open("POST", url);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("save=&" + "name=" + username +"&result=" + quizUserScore + "&date=" + quizDateTimeStart);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let response = xhr.responseText;
            response = JSON.parse(response);
            callback(response);
        }
    };
}




