var leftcover = document.getElementById("left-cover");
var leftform = document.getElementById("left-form");

var rightcover = document.getElementById("right-cover");
var rightform = document.getElementById("right-form");

function switch_Signup(){
    
    rightform.classList.add("fade-in-element");
    leftcover.classList.add("fade-in-element");

    leftform.classList.add("hide-form");
    leftcover.classList.remove("hide-cover");

    rightform.classList.remove("hide-form");
    rightcover.classList.add("hide-cover");

}