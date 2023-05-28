document.addEventListener('DOMContentLoaded', function() {
  // Button red/green color changer
  let set1 = document.getElementById('set1');
  let set2 = document.getElementById('set2');
  let set3 = document.getElementById('set3');
  let set4 = document.getElementById('set4');
  
  let nextBtn = document.getElementById('nextEx');
  let stopBtn = document.getElementById('stop');

  let setSelector = 0;
  let setCounter = 0;

  let watchStart = 1;
  let timer = false;

  set1.addEventListener('click', function(){
    colorChange('set1')
    setSelector = 1;
    timer = true;
    disableButtons();
    stopWatch();
    watchStart = 1;
  });

  set2.addEventListener('click', function(){
    colorChange('set2')
    setSelector = 2;
    timer = true;
    disableButtons();
    stopWatch();
    watchStart = 1;
  });

  set3.addEventListener('click', function(){
    colorChange('set3')
    setSelector = 3;
    timer = true;
    disableButtons();
    stopWatch();
    watchStart = 1;
  });

  set4.addEventListener('click', function(){
    colorChange('set4')
    setSelector = 4;
    watchStart = 1;
  });
  
  function colorChange(id) {
    let el = document.getElementById(id);
    let currentClass = el.getAttribute("class");
    if (currentClass === "workoutIncomplete workoutButton") {
      el.setAttribute("class", "workoutComplete workoutButton");
      el.textContent="Done";
      el.disabled = true;
      setCounter += 1;
    }

    if (setCounter === 4) {
      nextBtn.disabled = false;
    }
  }
  //End Button colour chaanger

  // Stopwatch function
  stopBtn.addEventListener('click', function () {
    timer = false;
  });

  function stopWatch() {
    if (timer) {

      if (watchStart === 1) {
        var minute = 1;
        var second = 30;
        var count = 0;
        watchStart = 0;
      }

      
      count++;

      if (count === 100) {
        second--;
        count = 0;
      }
  
      if (second === 0) {
        if (minute > 0){
          minute--;
          second = 59;
        }
        else{
          timer = false;
          enableButtons();
        }
      }

      let minString = minute.toString().padStart(2, '0');
      let secString = second.toString().padStart(2, '0');
  
      let minElement = document.getElementById('min');
      let secElement = document.getElementById('sec');
  
      minElement.textContent = minString;
      secElement.textContent = secString;
  
      setTimeout(stopWatch, 10);
    }
  }
  //End stopwatch function 

  function enableButtons() {
    if (setSelector === 1){
      set2.disabled = false;
      set3.disabled = false;
      set4.disabled = false;
    }
  
    if (setSelector === 2){
      set3.disabled = false;
      set4.disabled = false;
    }
  
    if (setSelector === 3){
      set4.disabled = false;
    }

    return;
  }

  function disableButtons() {
    if (setSelector === 1){
      set2.disabled = true;
      set3.disabled = true;
      set4.disabled = true;
    }
  
    if (setSelector === 2){
      set3.disabled = true;
      set4.disabled = true;
    }
  
    if (setSelector === 3){
      set4.disabled = true;
    }

    return;
  }
  
});
