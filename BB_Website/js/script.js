document.addEventListener('DOMContentLoaded', function() {
  // Button red/green color changer
  function colorChange(id) {
    var el = document.getElementById(id);
    var currentClass = el.getAttribute("class");
    if (currentClass === "workoutIncomplete workoutButton") {
      el.setAttribute("class", "workoutComplete workoutButton");
    } else {
      el.setAttribute("class", "workoutIncomplete workoutButton");
    }
  }

  // Stopwatch function
  let stopBtn = document.getElementById('stop');
  let startBtn = document.getElementById('start');

  let minute = 0;
  let second = 0;
  let hour = 0;
  let count = 0;
  let timer = false;

  stopBtn.addEventListener('click', function () {
    timer = false;
  });

  startBtn.addEventListener('click', function () {
    timer = true;
    stopWatch();
  });

  function stopWatch() {
    if (timer) {
      count++;

      if (count === 100) {
        second++;
        count = 0;
      }

      if (second === 60) {
        minute++;
        second = 0;
      }

      if (minute === 60) {
        hour++;
        minute = 0;
        second = 0;
      }

      let hrString = hour.toString().padStart(2, '0');
      let minString = minute.toString().padStart(2, '0');
      let secString = second.toString().padStart(2, '0');
      let countString = count.toString().padStart(2, '0');

      document.getElementById('min').innerHTML = minString;
      document.getElementById('sec').innerHTML = secString;

      setTimeout(stopWatch, 10);
    }
  }
});
