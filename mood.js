document.addEventListener("DOMContentLoaded", function() {
  const weekInput = document.getElementById("week");
  const buttonSubmit = document.getElementById("button1");
  const buttonDelete = document.getElementById("button2");
  const tableList = document.getElementById("table").querySelector("tbody");

  const moodInputs = document.querySelectorAll('input[name="mood"]');

  let infoArray = [];

  readInfo();

  function saveInformation() {
    const infoJson = JSON.stringify(infoArray);
    localStorage.setItem("mood-info-1709150007", infoJson);
  }

  function selectMood() {
    let weekText = weekInput.value;
    let inputValue = "";

    moodInputs.forEach(mood => {
      if (mood.checked) {
        inputValue = mood.value;
      }
    });

    if (weekText && inputValue) {
      createNewLine(weekText, inputValue);

      const moodObject = {
        weekDay: weekText,
        mood: inputValue
      };

      infoArray.push(moodObject);
      saveInformation();
    }
    
    // Clear form inputs
    weekInput.selectedIndex = 0;
    moodInputs.forEach(mood => mood.checked = false);
  }

  function createNewLine(weekday, mood) {
    const weekTd = document.createElement("td");
    weekTd.textContent = weekday;

    const moodTd = document.createElement("td");
    moodTd.classList.add("mood");
    moodTd.textContent = mood;

    const lineTr = document.createElement("tr");
    lineTr.appendChild(weekTd);
    lineTr.appendChild(moodTd);

    tableList.appendChild(lineTr);
  }

  function deleteRows() {
    while (tableList.firstChild) {
      tableList.removeChild(tableList.firstChild);
    }
    localStorage.removeItem("mood-info-1709150007");
    infoArray = [];
  }

  function readInfo() {
    const readJson = localStorage.getItem("mood-info-1709150007");
    infoArray = JSON.parse(readJson) || [];
    infoArray.forEach(info => createNewLine(info.weekDay, info.mood));
  }

  buttonSubmit.addEventListener("click", selectMood);
  buttonDelete.addEventListener("click", deleteRows);
});
