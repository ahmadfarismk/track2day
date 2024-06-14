document.addEventListener("DOMContentLoaded", function() {
  const buttonDelete = document.getElementById("button2");
  const moodForm = document.getElementById("mood-form");

  buttonDelete.addEventListener("click", function() {
    deleteMood();
  });

  function deleteMood() {
    moodForm.action = 'deleteentry.php';
    moodForm.method = 'POST';
    moodForm.submit();
  }
});
