const showPasswordEl = document.querySelector("#show-password");
const passengerPasswordEl = document.querySelector("#password");

showPasswordEl.addEventListener("change", (e) => {
  if (e.target.checked) {
    passengerPasswordEl.type = "text";
  } else {
    passengerPasswordEl.type = "password";
  }
});
