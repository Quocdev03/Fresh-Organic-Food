window.addEventListener("load", function () {
   fixedMenu();
});

window.addEventListener("DOMContentLoaded", function () {
   menuToggle();
   likeItem();
   quantityCart();
   detailProductImage();
   checkContact();
   checkPaymentStatus();
   CheckOutvalidate();
});

// Menu Toggle
const menuToggle = () => {
   const menuOpen = document.querySelector(".menu-toggle");
   const menuClose = document.querySelector(".menu-close");
   const mbNav = document.querySelector(".mb-nav");
   menuOpen && menuOpen.addEventListener("click", function (e) {
      e.stopPropagation();
      mbNav.classList.add("is-show");
   });
   menuClose && menuClose.addEventListener("click", function () {
      mbNav.classList.remove("is-show");
   });
   document.addEventListener('click', function (e) {
      if (!mbNav.contains(e.target) && !e.target.matches(".menu-toggle")) {
         mbNav.classList.remove("is-show");
      }
   });
}

// Likes
const likeItem = () => {
   const likes = document.querySelectorAll('.offer-item-like');
   likes.forEach((like, index) => {
      like.addEventListener('click', () => {
         like.classList.toggle('show-like');
         const likesState = JSON.parse(sessionStorage.getItem('likesState')) || [];
         likesState[index] = like.classList.contains('show-like');
         sessionStorage.setItem('likesState', JSON.stringify(likesState));
      });
      const likesState = JSON.parse(sessionStorage.getItem('likesState')) || [];
      if (likesState[index]) {
         like.classList.add('show-like');
      }
   });
};

// Quantity Cart
const quantityCart = () => {
   function updateCartQuantity(productItem) {
      const productId = productItem.getAttribute('data-product-id');
      const quantity = parseInt(productItem.querySelector('.cart-item-content__counter--number').textContent);

      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'index.php?url=Update_Cart_Quantity', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function () {
         if (this.readyState === 4) {
            if (this.status === 200) {
               const savedPosition = window.scrollY;
               window.location.reload();
               window.scrollTo(0, savedPosition);
            }
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
         counterValue -= 1;
         if (counterValue < 1) {
            counterValue = 1;
         }
         counterNumber.textContent = counterValue;
         updateCartQuantity(productItem);
      });

      counterIncrease.addEventListener("click", function (e) {
         counterValue += 1;
         if (counterValue > 30) {
            counterValue = 30;
         }
         counterNumber.textContent = counterValue;
         updateCartQuantity(productItem);
      });

   });
}

// Fixed menu
const fixedMenu = () => {
   const header = document.querySelector(".header-main");
   const headerHeight = header && header.offsetHeight;
   window.addEventListener("scroll", handleFixedMenu);
   function handleFixedMenu() {
      const scrollY = window.pageYOffset;
      if (scrollY >= headerHeight) {
         header && header.classList.add("fixed");
         document.body.style.paddingTop = `${headerHeight}px`;
      } else {
         header && header.classList.remove("fixed");
         document.body.style.paddingTop = 0;
      }
   }
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
   nameInput && nameInput.addEventListener("input", regexValidateName);

   function regexValidateName(event) {
      const value = event.target.value;
      const regexName = /^[\p{L} ]{6,40}$/u;
      if (regexName.test(value)) {
         event.target.classList.add("valid");
         event.target.classList.remove("invalid");
      } else {
         event.target.classList.remove("valid");
         event.target.classList.add("invalid");
      }
      if (!value) {
         event.target.classList.remove("invalid");
      }
   }

   mailInput && mailInput.addEventListener("input", regexValidateEmail);

   function regexValidateEmail(event) {
      const value = event.target.value;
      const regexEmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (regexEmail.test(value.trim(''))) {
         event.target.classList.add("valid");
         event.target.classList.remove("invalid");
      } else {
         event.target.classList.remove("valid");
         event.target.classList.add("invalid");
      }
      if (!value) {
         event.target.classList.remove("invalid");
      }
   }
}

// Check Payment Status
const checkPaymentStatus = () => {
   const conditionStatusConfirm = "Đã Xác Nhận";
   const conditionStatusCancel = "Đã Bị Hủy";
   const conditionNoteConfirm = "Đơn Hàng Của Bạn Đã Được Xác Nhận Thành Công, Vui Lòng Chờ Trong Vài Giờ!";
   const conditionNoteCancel = "Đơn Hàng Của Bạn Đã Được Hủy Thành Công!";
   const cancelOrder = document.querySelector(".paymentComplete-more__button");
   const status = document.querySelector(".paymentComplete-more-item__status");
   const note = document.querySelector(".paymentComplete-more-note");
   const textStatus = status ? status.textContent.trim() : null;

   function colorProcessStatus() {
      if (status) {
         if (textStatus === conditionStatusConfirm) {
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
         if (textStatus === conditionStatusConfirm) {
            cancelOrder.classList.add("is-disable");
            note.textContent = conditionNoteConfirm;
            note.classList.remove("not-confirm");
            note.classList.add("confirm");
         } else if (textStatus === conditionStatusCancel) {
            cancelOrder.classList.add("is-disable");
            note.textContent = conditionNoteCancel;
            note.classList.add("not-confirm");
            note.classList.remove("confirm");
         }
      }
   }
   colorProcessNote();

   cancelOrder && cancelOrder.addEventListener("click", checkButton);
   function checkButton() {
      if (confirm("Bạn có chắc chắn muốn huỷ đơn hàng?")) {
         const MaDH = document.querySelector('input[name="MaDH"]').value;
         const MaKH = document.querySelector('input[name="MaKH"]').value;
         const MaThanhToan = document.querySelector('input[name="MaThanhToan"]').value;
         const xhr = new XMLHttpRequest();
         xhr.open("POST", "index.php?url=Cancel_Order", true);
         xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xhr.onreadystatechange = function () {
            //yêu cầu đã hoàn tất và dữ liệu đã được trả về
            if (this.readyState === 4) {
               if (this.status === 200) {
                  alert("Đơn hàng đã được huỷ thành công!");
                  window.location.reload();
               } else {
                  alert("Có lỗi xảy ra khi huỷ đơn hàng!");
               }
            }
         };
         xhr.send("MaDH=" + MaDH + "&MaKH=" + MaKH + "&MaThanhToan=" + MaThanhToan);
      }
   }
}

// Checkout Regex
function CheckOutvalidate() {
   const personalEmall = document.querySelector(".personal_email");
   const personalPhone = document.querySelector(".personal_phone");
   const personalName = document.querySelector(".personal_name");
   personalName && personalName.addEventListener("input", regexValidateName);
   personalEmall && personalEmall.addEventListener("input", regexValidateEmail);
   personalPhone && personalPhone.addEventListener("input", regexValidatePhone);

   function regexValidateName(event) {
      const value = event.target.value;
      const regexName = /^[\p{L} ]{6,40}$/u;
      if (regexName.test(value)) {
         event.target.classList.add("valid");
         event.target.classList.remove("invalid");
      } else {
         event.target.classList.remove("valid");
         event.target.classList.add("invalid");
      }
      if (!value) {
         event.target.classList.remove("invalid");
      }
   }

   function regexValidateEmail(event) {
      const value = event.target.value;
      const regexEmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (regexEmail.test(value.trim(''))) {
         event.target.classList.add("valid");
         event.target.classList.remove("invalid");
      } else {
         event.target.classList.remove("valid");
         event.target.classList.add("invalid");
      }
      if (!value) {
         event.target.classList.remove("invalid");
      }
   }
   function regexValidatePhone(event) {
      const value = event.target.value;
      const regexEmail = /^(03[2-9]|05[689]|07[0|6-9]|08[1-9]|09[0-9])[0-9]{7}$/;
      if (regexEmail.test(value.trim(''))) {
         event.target.classList.add("valid");
         event.target.classList.remove("invalid");
      } else {
         event.target.classList.remove("valid");
         event.target.classList.add("invalid");
      }
      if (!value) {
         event.target.classList.remove("invalid");
      }
   }
}
