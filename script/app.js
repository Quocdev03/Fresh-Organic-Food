window.addEventListener("load", function () {
   menuToggle();
   likeItem();
   QuantityCart();
   fixedMenu();
   detailProductImage();
   checkContact();
});

// Menu Toggle
const menuToggle = () => {
   const menuOpen = document.querySelector(".menu-toggle");
   const menuClose = document.querySelector(".menu-close");
   const mbNav = document.querySelector(".mb-nav");
   const activeClass = "is-show";
   menuOpen && menuOpen.addEventListener("click", function (e) {
      e.stopPropagation();
      mbNav.classList.add(activeClass);
   });
   menuClose && menuClose.addEventListener("click", function () {
      mbNav.classList.remove(activeClass);
   });
   document.addEventListener('click', function (e) {
      if (!mbNav.contains(e.target) && !e.target.matches(".menu-toggle")) {
         mbNav.classList.remove("is-show");
      }
   });
}

// Like
const likeItem = () => {
   let like = document.querySelectorAll(".offer-item-like");
   let activeLike = "show-like";
   like.forEach((item) => {
      item.addEventListener("click", function (e) {
         e.stopPropagation();
         item.classList.toggle(activeLike);
      });
   });
}

// Quantity Cart
const QuantityCart = () => {
   const productItem = document.querySelectorAll(".cart-item-content__counter");
   [...productItem].forEach((item) => {
      const counterDecrease = item.querySelector(".cart-item-content__counter--minus");
      const counterIncrease = item.querySelector(".cart-item-content__counter--plus");
      const counterNumber = item.querySelector(".cart-item-content__counter--number");
      let counterValue = counterNumber ? parseInt(counterNumber.textContent) : 0;
      let counterLock = false;
      const productId = item.getAttribute('data-product-id');

      function checkCounterLock(boolean) {
         if (!boolean === "true" || !boolean === "false") return
         counterLock = boolean;
      }

      function delayClick(miliSecond) {
         setTimeout(() => {
            checkCounterLock(false)
         }, miliSecond);
      }

      counterDecrease.addEventListener("click", function (e) {
         if (!counterLock) {
            checkCounterLock(true);
            counterValue = counterValue - 1;
            counterNumber.textContent = counterValue;
            if (counterValue > 1) {
               counterDecrease.classList.remove("is-disable");
               counterIncrease.classList.remove("is-disable");
            } else {
               counterDecrease.classList.add("is-disable");
            }
            delayClick(100);
            sendCartData(productId, counterValue);
         }
      });

      counterIncrease.addEventListener("click", function (e) {
         if (!counterLock) {
            checkCounterLock(true);
            counterValue += 1;
            counterNumber.textContent = counterValue;
            if (counterValue >= 20) {
               counterIncrease.classList.add("is-disable");
            } else {
               counterDecrease.classList.remove("is-disable");
            }
            delayClick(100);
            sendCartData(productId, counterValue);
         }
      });
   });
}

// Fixed menu
const fixedMenu = () => {
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
   const headerHeight = header && header.offsetHeight;
   window.addEventListener("scroll", debounceFn(function (e) {
      const scrollY = window.pageYOffset;
      if (scrollY >= headerHeight) {
         header && header.classList.add("fixed");
         document.body.style.paddingTop = `${headerHeight}px`;
      } else {
         header && header.classList.remove("fixed");
         document.body.style.paddingTop = 0;
      }
   }), 300);
}

// Detail product image
const detailProductImage = () => {
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
}

// Check contact
const checkContact = () => {
   const nameInput = document.querySelector(".contact-input-name");
   const mailInput = document.querySelector(".contact-input-mail");
   nameInput && nameInput.addEventListener("input", function (e) {
      //    ^ là anchor bắt đầu chuỗi
      // [] là character set, đây là character set Unicode (được xác định bởi flag /u), có nghĩa là chỉ chấp nhận các kí tự trong tập hợp nằm trong dấu ngoặc này
      // \p{L} đại diện cho kí tự Unicode, có chức năng phân biệt chữ cái với các kí tự khác (bao gồm cả dấu chấm, dấu phẩy,...)
      // ` là khoảng trắng, cho phép nhập khoảng trắng trong tên
      // {6,30} là quantifier, yêu cầu số lượng kí tự từ 6 đến 30
      // $ là anchor kết thúc chuỗi
      const value = e.target.value;
      const regexName = /^[\p{L} ]{6,40}$/u;
      if (regexName.test(value)) {
         e.target.classList.add("valid");
         e.target.classList.remove("invalid");
      } else {
         e.target.classList.remove("valid");
         e.target.classList.add("invalid");
      }
      if (!value) {
         e.target.classList.remove("invalid");
      }
   });
   mailInput && mailInput.addEventListener("input", function (e) {
      //    ^: Bắt đầu của chuỗi.
      // (?!.*\d{3}): Negative lookahead, đảm bảo rằng không có chuỗi con nào trong chuỗi email chứa 3 chữ số liên tiếp.
      // .*: Bất kỳ ký tự nào (trừ ký tự xuống dòng) xuất hiện bất kỳ số lần nào.
      // \d{3}: Ba chữ số liên tiếp.
      // [a-zA-Z0-9._%+-]+: Một hoặc nhiều ký tự chữ cái hoặc số hoặc một số ký tự đặc biệt như . (dấu chấm), _ (gạch dưới), %, +, hoặc - xuất hiện liên tiếp. Đây là phần local-part của địa chỉ email.
      // @: Ký tự @.
      // [a-zA-Z0-9.-]+: Một hoặc nhiều ký tự chữ cái hoặc số hoặc dấu gạch ngang xuất hiện liên tiếp. Đây là phần domain của địa chỉ email.
      // \.: Dấu chấm.
      // [a-zA-Z]{2,}: Hai hoặc nhiều ký tự chữ cái xuất hiện liên tiếp. Đây là phần tên miền của địa chỉ email.
      // $: Kết thúc của chuỗi.
      const value = e.target.value;
      const regexEmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (regexEmail.test(value.trim(''))) {
         e.target.classList.add("valid");
         e.target.classList.remove("invalid");
      } else {
         e.target.classList.remove("valid");
         e.target.classList.add("invalid");
      }
      if (!value) {
         e.target.classList.remove("invalid");
      }
   });
}