const handleScrollNavbar = () => {
  if (window.scrollY > sticky) {
    navbar.classList.add("sticky");
    navbar.style.backgroundColor = "#fff";
  } else {
    navbar.classList.remove("sticky");
  }
};

window.onscroll = function () {
  handleScrollNavbar();
};

const navbar = document.getElementById("navbar");
const sticky = navbar.offsetTop;
