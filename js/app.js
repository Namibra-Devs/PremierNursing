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

// const admiAction = document.querySelector(".fa-list-dots"); 
// const actionDetails = document.querySelector(".action-details"); 

// admiAction.addEventListener("click", () => {
// actionDetails.classList.toggle("action-details-display")
// })

const toggleBars = document.querySelector(".toggle-bars .fa-bars"),
      personalInfoMenuLinks = document.querySelector(".personalInfoMenuLinks"); 
    
toggleBars.addEventListener("click", () => {
        personalInfoMenuLinks.classList.toggle("openInfoLinks");
        if(personalInfoMenuLinks.classList.contains("openInfoLinks")) {
          toggleBars.classList.replace("fa-bars", "fa-times");
         } else {
          toggleBars.classList.replace("fa-times", "fa-bars");
         }
        })