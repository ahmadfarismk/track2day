document.addEventListener("DOMContentLoaded", function() {
  const buttonDelete = document.getElementById("button2");
  const tableList = document.getElementById("table").querySelector("tbody");

  buttonDelete.addEventListener("click", function() {
      tableList.innerHTML = ""; // Clear table rows on delete button click
      localStorage.removeItem("mood-info-1709150007");
  });
});
