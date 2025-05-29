document.addEventListener("DOMContentLoaded", function () {
    const isLoggedIn = localStorage.getItem("loggedIn");
  
    if (isLoggedIn === "true") {
      document.getElementById("loginLink").style.display = "none";
      document.getElementById("registerLink").style.display = "none";
      document.getElementById("logoutLink").style.display = "inline-block";
    } else {
      document.getElementById("loginLink").style.display = "inline-block";
      document.getElementById("registerLink").style.display = "inline-block";
      document.getElementById("logoutLink").style.display = "none";
    }
  });
  