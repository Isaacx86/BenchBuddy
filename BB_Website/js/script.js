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

function workoutCounter() {
    
}