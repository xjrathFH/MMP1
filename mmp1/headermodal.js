// Studiengang: MultiMediaTechnology / FHS
// Zweck: MultiMediaProjekt 1
// Autor: Xaver Rath
const burgerMenu = document.getElementById("burger-menu");
const mobileMenu = document.getElementById("mobile-menu");
burgerMenu.addEventListener("click", () => {
  mobileMenu.classList.toggle("hidden");
  mobileMenu.classList.toggle("opacity-0");
});
const modal = document.getElementById("headerModal");
const closeModal = document.getElementById("close-modal");
const openModal = document.getElementById("open-modal");

const mobileOpenModal = document.getElementById("mobile-open-modal");

openModal.addEventListener("click", () => {
  modal.classList.remove("hidden");
});
closeModal.addEventListener("click", () => {
  modal.classList.add("hidden");
});
mobileOpenModal.addEventListener("click", () => {
  modal.classList.remove("hidden");
  mobileMenu.classList.add("hidden");
  mobileMenu.classList.add("opacity-0");
});
