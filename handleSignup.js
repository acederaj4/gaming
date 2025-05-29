function handleSignup(event) {
    event.preventDefault();
  
    const username = document.getElementById("signup-username").value;
    const email = document.getElementById("signup-email").value;
    const password = document.getElementById("signup-password").value;
    const confirmPassword = document.getElementById("confirm-password").value;
  
    if (password !== confirmPassword) {
      alert("Passwords do not match!");
      return;
    }
  
    const user = { username, email, password };
    localStorage.setItem("user", JSON.stringify(user));
  
    alert("Signup successful! You can now log in.");
    window.location.href = "login.html";
  }
  