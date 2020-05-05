button = document.querySelector(".button");
toggle = false;

function showPara(){
    if(toggle == true)
        document.getElementById("content").innerHTML = "Hello, my name is hammad";
}

button.onmouseover = showPara;

