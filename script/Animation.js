window.addEventListener("load", function () {
   const wrapper = document.querySelector(".wrapper");
   const loader = document.querySelector(".page-loader");
   wrapper.classList.remove("hidden");
   setTimeout(() => {
      loader.classList.add("fade-out");
   }, 40);
});