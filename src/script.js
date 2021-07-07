const menuIcon = document.getElementById("menuIcon");
const navLinks = document.getElementById("links");

let showState = false;

menuIcon.addEventListener("click", () => {
  showState = !showState;

  if (showState) {
    navLinks.classList.add("block");
    navLinks.classList.remove("hidden");
  } else {
    navLinks.classList.add("hidden");
    navLinks.classList.remove("block");
  }
});
