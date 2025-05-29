function handleLogin(event) {
    event.preventDefault();
  
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const savedUser = JSON.parse(localStorage.getItem("user"));
  
    if (savedUser && username === savedUser.username && password === savedUser.password) {
      localStorage.setItem("loggedIn", "true");
      alert("Login successful!");
      window.location.href = "index.html";
    } else {
      alert("Invalid credentials. Please try again.");
    }
  }
  