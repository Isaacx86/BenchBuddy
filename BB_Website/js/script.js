document.addEventListener('DOMContentLoaded', function() {
  // Button red/green color changer
  let set1 = document.getElementById('set1');
  let set2 = document.getElementById('set2');
  let set3 = document.getElementById('set3');
  let set4 = document.getElementById('set4');

  let nextBtn = document.getElementById('nextEx');
  let stopBtn = document.getElementById('stop');

  let setCounter = 0;

  let timer;

  set1.addEventListener('click', function(){
    colorChange('set1');
    startTimer(1);
  });

  set2.addEventListener('click', function(){
    colorChange('set2');
    startTimer(2);
  });

  set3.addEventListener('click', function(){
    colorChange('set3');
    startTimer(3);
  });

  set4.addEventListener('click', function(){
    colorChange('set4');
  });

  function colorChange(id) {
    let el = document.getElementById(id);
    let currentClass = el.getAttribute("class");
    if (currentClass === "workoutIncomplete workoutButton") {
      el.setAttribute("class", "workoutComplete workoutButton");
      el.textContent = "Done";
      el.disabled = true;
      setCounter += 1;
    }

    if (setCounter === 4) {
      nextBtn.disabled = false;
    }
  }
  // End Button color changer

  // Stopwatch function
  stopBtn.addEventListener('click', function (e) {  
    
    // Display confirmation dialog when stop button is clicked
    const confirmationMessage = 'Are you sure you want to finish your workout?';
    if (!confirm(confirmationMessage)) {
      e.preventDefault();
    }

  });
    
  window.addEventListener('beforeunload', function (event) {
    if (!stopBtn.clicked) {
      return;
    }
    event.preventDefault();
    event.returnValue = 'Are you sure you want to finish your workout?';
  });

  window.addEventListener('unload', function () {
    window.location.href = 'index.html';
  });
    
  
  
  function startTimer(set) {
    let minute = 0;
    let second = 1;

    timer = setInterval(function () {
      if (second === 0 && minute === 0) {
        clearInterval(timer);

        if(set === 1)
        {
          set2.disabled = false;
        }

        if(set === 2)
        {
          set3.disabled = false;
        }

        if(set === 3)
        {
          set4.disabled = false;
        }

        return;
      }

      if (second === 0) {
        minute--;
        second = 59;
      } else {
        second--;
      }

      let minString = minute.toString().padStart(2, '0');
      let secString = second.toString().padStart(2, '0');

      let minElement = document.getElementById('min');
      let secElement = document.getElementById('sec');

      minElement.textContent = minString;
      secElement.textContent = secString;
    }, 1000);
  }
  // End stopwatch function

});



