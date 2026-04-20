function loginMessage() {
  alert("Login successful. This is a frontend demo for the EcoTrack project.");
  return false;
}

function validateRegisterForm() {
  const password = document.getElementById("registerPassword");
  const confirmPassword = document.getElementById("registerConfirmPassword");

  if (!password || !confirmPassword) {
    return true;
  }

  if (password.value !== confirmPassword.value) {
    alert("Passwords do not match.");
    return false;
  }

  return true;
}

function feedbackMessage() {
  alert("Thank you for your feedback. Your message has been recorded for the project demo.");
  return false;
}

function searchCatalogue() {
  const input = document.getElementById("searchInput");
  if (!input) {
    return;
  }

  const filter = input.value.toLowerCase();
  const cards = document.getElementsByClassName("search-card");

  for (let i = 0; i < cards.length; i++) {
    const text = cards[i].innerText.toLowerCase();
    if (text.includes(filter)) {
      cards[i].style.display = "block";
    } else {
      cards[i].style.display = "none";
    }
  }
}

const historyData = [];

function calculateWaste() {
  const plasticField = document.getElementById("plastic");
  const paperField = document.getElementById("paper");
  const organicField = document.getElementById("organic");
  const result = document.getElementById("result");

  if (!plasticField || !paperField || !organicField || !result) {
    return;
  }

  const plastic = parseFloat(plasticField.value) || 0;
  const paper = parseFloat(paperField.value) || 0;
  const organic = parseFloat(organicField.value) || 0;
  const total = plastic + paper + organic;

  let highestType = "Balanced";
  let suggestion = "Your waste is fairly balanced. Keep segregating correctly and continue improving your habits.";

  if (total === 0) {
    result.innerHTML = "Please enter at least one waste value in kilograms to view the result.";
    return;
  }

  if (plastic > paper && plastic > organic) {
    highestType = "Plastic";
    suggestion = "Plastic waste is highest. Reduce single-use plastic and prefer reusable bottles, bags, and containers.";
  } else if (paper > plastic && paper > organic) {
    highestType = "Paper";
    suggestion = "Paper waste is highest. Try using digital notes and send clean paper for recycling.";
  } else if (organic > plastic && organic > paper) {
    highestType = "Organic";
    suggestion = "Organic waste is highest. Composting kitchen waste can help reduce landfill burden.";
  }

  let ecoScore = 100;

  ecoScore -= total * 2;
  ecoScore -= plastic * 5;

  const maxWaste = Math.max(plastic, paper, organic);
  const minWaste = Math.min(plastic, paper, organic);

  if (maxWaste - minWaste < 2) {
    ecoScore += 10;
  }

  if (ecoScore > 100) {
    ecoScore = 100;
  }

  if (ecoScore < 0) {
    ecoScore = 0;
  }

  ecoScore = Math.round(ecoScore);

  let rating = "";
  if (ecoScore >= 90) {
    rating = "Excellent";
  } else if (ecoScore >= 75) {
    rating = "Good";
  } else if (ecoScore >= 50) {
    rating = "Average";
  } else {
    rating = "Needs Improvement";
  }

  result.innerHTML = `
    <strong>Total waste generated this week:</strong> ${total.toFixed(2)} kg<br>
    <strong>Highest waste type:</strong> ${highestType}<br>
    <strong>Eco Score:</strong> ${ecoScore}/100 (${rating})<br>
    <strong>Suggestion:</strong> ${suggestion}
  `;

  const entry = {
    date: new Date().toLocaleDateString(),
    plastic: plastic.toFixed(2),
    paper: paper.toFixed(2),
    organic: organic.toFixed(2),
    total: total.toFixed(2),
    highestType,
    ecoScore
  };

  historyData.push(entry);
  updateHistoryTable();
}

function updateHistoryTable() {
  const tableBody = document.querySelector("#historyTable tbody");

  if (!tableBody) {
    return;
  }

  if (historyData.length === 0) {
    tableBody.innerHTML = `
      <tr>
        <td colspan="7" class="empty-row">No entries yet. Start by calculating your first waste record.</td>
      </tr>
    `;
    return;
  }

  tableBody.innerHTML = "";

  historyData.forEach((entry) => {
    const row = `
      <tr>
        <td>${entry.date}</td>
        <td>${entry.plastic}</td>
        <td>${entry.paper}</td>
        <td>${entry.organic}</td>
        <td>${entry.total}</td>
        <td>${entry.highestType}</td>
        <td>${entry.ecoScore}</td>
      </tr>
    `;
    tableBody.innerHTML += row;
  });
}