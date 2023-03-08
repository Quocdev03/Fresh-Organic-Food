// Menu Toggle
// Lấy giá trị bên html
const menuOpen = document.querySelector(".menu-toggle");
const menuClose = document.querySelector(".menu-close");
const mbNav = document.querySelector(".mb-nav");
const body = document.body;
const activeClass = "is-show";
// click vào menu toggle thì thêm class is-show
menuOpen.addEventListener("click", function () {
   mbNav.classList.add(activeClass);
})
// click vào menu close thì xoá class is-show
menuClose.addEventListener("click", function () {
   mbNav.classList.remove(activeClass);
})

// Heart
let like = document.querySelectorAll(".offer-item-like");
let activeLike = "show-like";
like.forEach((item) => {
   item.addEventListener("click", function () {
      item.classList.toggle(activeLike);
   })
})