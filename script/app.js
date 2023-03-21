window.addEventListener("load", function () {
   // Menu Toggle
   const menuOpen = document.querySelector(".menu-toggle");
   const menuClose = document.querySelector(".menu-close");
   const mbNav = document.querySelector(".mb-nav");
   const activeClass = "is-show";
   menuOpen.addEventListener("click", function (e) {
      e.stopPropagation();
      mbNav.classList.add(activeClass);
   });
   menuClose.addEventListener("click", function () {
      mbNav.classList.remove(activeClass);
   });
   document.addEventListener('click', function (e) {
      if (!mbNav.contains(e.target) && !e.target.matches(".menu-toggle")) {
         mbNav.classList.remove("is-show");
      }
   })
   // Like
   let like = document.querySelectorAll(".offer-item-like");
   let activeLike = "show-like";
   like.forEach((item) => {
      item.addEventListener("click", function () {
         item.classList.toggle(activeLike);
      });
   });
   // Quantity product cart
   const counterIncrease = document.querySelector(".cart-item-content__counter--plus");
   const counterDecrease = document.querySelector(".cart-item-content__counter--minus");
   let counterNumber = document.querySelector(".cart-item-content__counter--number");
   let counterValue = parseInt(counterNumber.textContent);
   counterDecrease.addEventListener("click", function (e) {
      counterValue -= 1;
      counterNumber.textContent = counterValue;
      counterCheck = counterValue;
      if (counterCheck <= 1) {
         counterDecrease.classList.add("is-disable");
      }
      else {
         counterIncrease.classList.remove("is-disable");
      }
   });
   counterIncrease.addEventListener("click", function (e) {
      counterValue += 1;
      counterNumber.textContent = counterValue;
      counterCheck = counterValue;
      if (counterCheck >= 20) {
         counterIncrease.classList.add("is-disable");
      } else {
         counterDecrease.classList.remove("is-disable");
      }
   });
});
