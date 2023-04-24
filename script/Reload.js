window.addEventListener('beforeunload', function () {
   // Lưu vị trí hiện tại của trang trước khi tải lại
   const savedPosition = window.scrollY;
   // Lưu vị trí của trang vào sessionStorage
   sessionStorage.setItem('savedPosition', savedPosition);
});
window.addEventListener('load', function () {
   // Lấy vị trí được lưu từ sessionStorage
   const savedPosition = sessionStorage.getItem('savedPosition');
   // Nếu có vị trí được lưu, đặt vị trí của trang trở lại vị trí được lưu trước đó
   if (savedPosition) {
      window.scrollTo(0, savedPosition);
      // Xóa vị trí đã lưu khỏi sessionStorage
      sessionStorage.removeItem('savedPosition');
   }
});
