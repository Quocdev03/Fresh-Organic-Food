window.addEventListener("load", function () {
   menuToggle();
   likeItem();
   quantityCart();
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
const quantityCart = () => {
   function updateCartQuantity(productItem) {
      const productId = productItem.getAttribute('data-product-id');
      const quantity = parseInt(productItem.querySelector('.cart-item-content__counter--number').textContent);

      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'index.php?url=Update_Cart_Quantity');
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function () {
         if (xhr.readyState === 4 && xhr.status === 200) {
            // Lưu vị trí hiện tại của trang trước khi tải lại
            const savedPosition = window.scrollY;
            // Tải lại trang
            window.location.reload(true);
            // Đặt vị trí của trang trở lại vị trí được lưu trước đó
            window.scrollTo(0, savedPosition);
         }
      };
      xhr.send(`productId=${productId}&quantity=${quantity}`);
   }

   const productItems = document.querySelectorAll(".cart-item-content__counter");
   [...productItems].forEach((productItem) => {
      const counterDecrease = productItem.querySelector(".cart-item-content__counter--minus");
      const counterIncrease = productItem.querySelector(".cart-item-content__counter--plus");
      const counterNumber = productItem.querySelector(".cart-item-content__counter--number");
      let counterValue = counterNumber ? parseInt(counterNumber.textContent) : 0;
      counterDecrease.addEventListener("click", function (e) {
         counterValue = counterValue - 1;
         counterNumber.textContent = counterValue;
         updateCartQuantity(productItem);
      });

      counterIncrease.addEventListener("click", function (e) {
         counterValue += 1;
         counterNumber.textContent = counterValue;
         updateCartQuantity(productItem);
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

// Check Payment Status
const checkPaymentStatus = () => {
   const conditionStatus = "Đã Xác Nhận!";
   const conditionNote = "Đơn Hàng Của Bạn Đã Được Xác Nhận Thành Công, Vui Lòng Chờ Trong Vài Giờ!";
   const status = document.querySelector(".paymentComplete-more-item__status");
   const note = document.querySelector(".paymentComplete-more-note");
   const textStatus = status ? status.textContent.trim() : null;

   function colorProcessStatus() {
      if (status) {
         if (textStatus === conditionStatus) {
            status.classList.remove("not-confirm");
            status.classList.add("confirm");
         } else {
            status.classList.add("not-confirm");
            status.classList.remove("confirm");
         }
      }
   }
   colorProcessStatus();

   function colorProcessNote() {
      if (note) {
         if (textStatus === conditionStatus) {
            note.textContent = conditionNote;
            note.classList.remove("not-confirm");
            note.classList.add("confirm");
         } else {
            note.classList.add("not-confirm");
            note.classList.remove("confirm");
         }
      }
   }
   colorProcessNote();
}

checkPaymentStatus();