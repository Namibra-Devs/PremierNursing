window.addEventListener("load", () => {
  const sidebar = document.querySelector(".sidebar"),
  closeBtn = document.querySelector(".sidebar_toggle .fa-bars");

closeBtn.addEventListener("click", () => {
sidebar.classList.toggle("open");
btnChange();
  
})
btnChange = () => {
  if(sidebar.classList.contains("open")) {
   closeBtn.classList.replace("fa-bars", "fa-bars-staggered");
  } else {
    closeBtn.classList.replace("fa-bars-staggered", "fa-bars");
  }
}
})

const openNavMenu = document.querySelector(".open-nav-menu"),
      closeNavMenu = document.querySelector(".close-nav-menu"),
      navMenu = document.querySelector(".navbar_List"), 
      menuOverLay = document.querySelector(".menu-overlay"),
      mediaSize = 768; 
      
      openNavMenu.addEventListener("click", () => {
        menuOverLay.classList.toggle("active");
        navMenu.classList.toggle("open"); 
        document.body.classList.toggle("hidden-scrolling");
      })

      closeNavMenu.addEventListener("click", () => {
        menuOverLay.classList.toggle("active");
        navMenu.classList.toggle("open"); 
        document.body.classList.toggle("hidden-scrolling");
      })
      menuOverLay.addEventListener("click", () => {
        menuOverLay.classList.toggle("active");
        navMenu.classList.toggle("open"); 
        document.body.classList.toggle("hidden-scrolling");
      })
       
      navMenu.addEventListener("click", (e) => {
       if(e.target.hasAttribute("data-toggle") && window.innerWidth <= mediaSize) {
        const menuItemHasChildren = e.target.parentElement; 
        if(menuItemHasChildren.classList.contains("active")) {
          collapseSubMenu();
        } else {
          if(navMenu.querySelector(".dropdown.active")) {
            collapseSubMenu();
          }
       
        menuItemHasChildren.classList.add("active");
        const subMenu = menuItemHasChildren.querySelector(".sub_menu");
        subMenu.style.maxHeight = subMenu.scrollHeight + "px";
       }
      }
      }); 
      collapseSubMenu = () => {
          navMenu.querySelector(".dropdown.active .sub_menu").removeAttribute("style");
          navMenu.querySelector(".dropdown.active").classList.remove("active");

      }
      // *****************FIXED NAV***************

     const navbar = document.querySelector(".navbar_2");
     const menuBar = document.querySelector(".menu-bar");
    //  const navbarColor = document.querySelector(".navbar_List .list_item  a");

      window.addEventListener("scroll", () => {
    const scrollHeight = window.pageYOffset;
    // const navHeight = navbar.getBoundingClientRect().height;

    if(scrollHeight > 100 ) {
        navbar.classList.add("fixed-nav");
        menuBar.classList.add("fixed-nav");
     
    } else {
        navbar.classList.remove("fixed-nav");
        menuBar.classList.remove("fixed-nav");
    }
})

