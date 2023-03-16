// Menu Toggle
// Lấy giá trị bên html
const menuOpen = document.querySelector(".menu-toggle");
const menuClose = document.querySelector(".menu-close");
const mbNav = document.querySelector(".mb-nav");
const activeClass = "is-show";
// click vào menu toggle thì thêm class is-show
menuOpen.addEventListener("click", function (e) {
   e.stopPropagation();
   mbNav.classList.add(activeClass);
})
// click vào menu close thì xoá class is-show
menuClose.addEventListener("click", function (e) {
   mbNav.classList.remove(activeClass);
})
// click ra ngoài menu thì xoá class is-show
document.addEventListener('click', function (e) {
   if (!mbNav.contains(e.target) && !e.target.matches(".menu-toggle")) {
      mbNav.classList.remove("is-show");
   }
})
// like
let like = document.querySelectorAll(".offer-item-like");
let activeLike = "show-like";
like.forEach((item) => {
   item.addEventListener("click", function () {
      item.classList.toggle(activeLike);
   })
})