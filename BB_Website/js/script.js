//Button red/green colour changer
function colorChange(id) {
    var el = document.getElementById(id);
    var currentClass = el.getAttribute("class");
    if(currentClass == 'workoutIncomplete workoutButton') {
      el.setAttribute("class", "workoutComplete workoutButton");
    }
    else {
      el.setAttribute("class", "workoutIncomplete workoutButton");
    }
}




//Stop Wactch function
let stopBtn = document.getElementById('stop');

let minute = 00;
let second = 00;

stopBtn.addEventListener('click', function () {
  timer = false;
});