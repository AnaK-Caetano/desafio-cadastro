document.addEventListener("DOMContentLoaded", function() {
   
    const logoutButton = document.getElementById("logout");

    logoutButton.addEventListener("click", function(sair) {
        sair.preventDefault(); 
        window.location.href = "../../index.html";
    });
  });