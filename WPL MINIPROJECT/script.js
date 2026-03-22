function loginMessage() {
  alert("Login successful.");
  return false;
}

function registerMessage() {
  const password = document.getElementById("registerPassword");
  const confirmPassword = document.getElementById("registerConfirmPassword");

  if (password && confirmPassword && password.value !== confirmPassword.value) {
    alert("Passwords do not match. Please enter the same password in both fields.");
    return false;
  }

  alert("Registration successful. Your EcoTrack demo account has been created.");
  return false;
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

  let message = "";

  if (total === 0) {
    message = "Please enter at least one waste value in kilograms to view the result.";
  } else {
    message = `Total waste generated this week: ${total.toFixed(2)} kg.<br>`;

    if (plastic > paper && plastic > organic) {
      message += "Plastic waste is highest. Reduce single-use plastic and prefer reusable bottles, bags, and containers.";
    } else if (paper > plastic && paper > organic) {
      message += "Paper waste is highest. Try using digital notes and send clean paper for recycling.";
    } else if (organic > plastic && organic > paper) {
      message += "Organic waste is highest. Composting kitchen waste can help reduce landfill burden.";
    } else {
      message += "Your waste is fairly balanced. Keep segregating correctly and continue improving your habits.";
    }
  }

  result.innerHTML = message;
}