document.addEventListener('DOMContentLoaded', function() {
  
    let submitReview = document.getElementById('submitReview');
  
    submitReview.addEventListener('click', function(e){
      e.preventDefault(); // Prevent form submission
      validateForm();
    });
  
    function validateForm() {
      var exercises = document.getElementsByClassName("exercise");
      var isValid = true;
  
      for (var i = 0; i < exercises.length; i++) {
        var difficulty = document.forms["reviewForm"]["difficulty" + (i + 1)].value;
        var weightLifted = document.forms["reviewForm"]["weightLifted" + (i + 1)].value;
  
        if (difficulty === "" || weightLifted === "") {
          isValid = false;
          break;
        }
      }
  
      if (isValid) {
        window.location.href = 'index.html';
      }
      else {
        alert("Please fill in all the fields.");
      }
    }
  });
  