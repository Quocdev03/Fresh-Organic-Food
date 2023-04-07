
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
});

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
const counterNumber = document.querySelector(".cart-item-content__counter--number");
let counterValue = counterNumber && parseInt(counterNumber.textContent);
counterDecrease && counterDecrease.addEventListener("click", function (e) {
   e.stopPropagation();
   counterValue -= 1;
   counterNumber.textContent = counterValue;
   counterCheck = counterValue;
   if (counterCheck > 1) {
      counterDecrease.classList.remove("is-disable");
      counterIncrease.classList.remove("is-disable");
   } else {
      counterDecrease.classList.add("is-disable");
   }

});
counterIncrease && counterIncrease.addEventListener("click", function (e) {
   e.stopPropagation();
   counterValue += 1;
   counterNumber.textContent = counterValue;
   counterCheck = counterValue;
   if (counterCheck >= 20) {
      counterIncrease.classList.add("is-disable");
   } else {
      counterDecrease.classList.remove("is-disable");
   }
});

// Fixed menu
function debounceFn(func, wait, immediate) {
   let timeout;
   return function () {
      let context = this,
         args = arguments;
      let later = function () {
         timeout = null;
         if (!immediate) func.apply(context, args);
      };
      let callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
   };
}

const header = document.querySelector(".header-main");
const heroSection = document.querySelector(".hero");
const introSection = document.querySelector(".intro");
const headerHeight = header && header.offsetHeight;
window.addEventListener("scroll", debounceFn(function (e) {
   const scrollY = window.pageYOffset;
   const fixPadding = 0;
   if (scrollY >= headerHeight) {
      header && header.classList.add("fixed");
      document.body.style.paddingTop = `${headerHeight + fixPadding}px`;
      heroSection.style.paddingTop = `${headerHeight + fixPadding}px`;
      introSection.style.paddingTop = `${headerHeight + fixPadding}px`;
   } else {
      header && header.classList.remove("fixed");
      document.body.style.paddingTop = 0;
      heroSection.style.paddingTop = 0;
      introSection.style.paddingTop = 0;
   }
}), 100);

const detailImage = document.querySelectorAll(".detail-image-bottom-item");
const detailImageShow = document.querySelectorAll(".detail-image-item--show");
[...detailImage].forEach((item) => item.addEventListener("click", handleClick));
function handleClick(e) {
   [...detailImage].forEach((item) => item.classList.remove("is-active"));
   e.target.classList.add("is-active");
   const detailTabItem = (e.target.dataset.item);
   [...detailImageShow].forEach((item) => {
      item.classList.remove("is-show");
      if (item.getAttribute("data-item") === detailTabItem) {
         item.classList.add("is-show");
      }
   });
}