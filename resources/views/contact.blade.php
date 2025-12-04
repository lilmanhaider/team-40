<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Tech4FourU</title>

<style>
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:"Poppins",sans-serif;
}
h1{text-align: center;
}
p{text-align: center;
}
body{
  background:#f5f6fa;
}

nav{
  width:100%;
  padding:16px 8%;
  display:flex;
  align-items:center;
  justify-content:space-between;
  background:white;
  border-bottom:1px solid #eee;
  position:sticky;
  top:0;
  z-index:999;
}

nav .logo{
  display:flex;
  align-items:center;
  gap:10px;
}

nav .logo img{
  height:55px;
  width:auto;
}

nav ul{
  margin-left:auto;
  display:flex;
  gap:30px;
  list-style:none;
  align-items:center;
}

nav ul li a{
  text-decoration:none;
  color:#444;
  font-size:1rem;
  transition:0.3s;
  display:flex;
  align-items:center;
  gap:4px;
}

nav ul li a:hover{
  color:#0077ff;
}

.hero{
  width:100%;
  padding:110px 8%;
  background: url("images/index/Logo.jpg") right/contain no-repeat;  
  background-color:#eef9b3; 
  display:flex;
  flex-direction:column;
  gap:15px;
  min-height:350px;
}

.hero h1{
  font-size:2.9rem;
  max-width:600px;
}

.hero p{
  font-size:1.1rem;
  max-width:520px;
  color:#444;
}

.hero button{
  margin-top:45px;
  padding:15px 250px;
  background:#50ce29;
  border:none;
  border-radius:8px;
  color:white;
  font-size:1rem;
  cursor:pointer;
  transition:.3s;
}

.hero button:hover{
  background:#45cc7f;
}

.section-title{
  text-align:center;
  font-size:1.9rem;
  margin-top:70px;
  margin-bottom:15px;
}

.card-container{
  width:100%;
  padding:0 8% 70px;
  display:grid;
  gap:30px;
  grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
}

.card{
  padding:25px;
  border-radius:12px;
  background:white;
  border:1px solid #eee;
  transition:.3s;
}

.card:hover{
  transform:translateY(-4px);
  box-shadow:0 12px 32px rgba(0,0,0,0.06);
}

.card h3{
  margin-bottom:6px;
}

.card p{
  font-size:.95rem;
  color:#555;
  line-height:1.5;
}

footer{
  width:100%;
  text-align:center;
  background:#111;
  color:white;
  padding:35px;
  margin-top:40px;
  font-size:.95rem;
}

.contact-info {
    background: #f5f5f5;
    padding: 15px;
    border-radius: 5px;
    margin: 20px 0;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input, .form-group textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}

.submit-btn {
    background: #007bff;
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.submit-btn:hover {
    background: #0056b3;
}

.error-message {
    color: #dc3545;
    font-size: 14px;
    margin-top: 5px;
}

.success-message {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    padding: 12px 16px;
    border-radius: 4px;
    margin: 15px 0;
    font-size: 14px;
    display: none;
}
</style>

</head>
<body>

<nav>
  <div class="logo">
    <img src="images/index/Logo.jpg" alt="Tech4ForU Logo">
  </div>

  <ul>
    <li><a href="{{ route('homepage') }}">Home</a></li>
    <li><a href="{{ route('product') }}">Product Page</a></li>
    <li><a href="{{ route('about') }}">About Us</a></li>
    <li><a href="{{ route('contact') }}">Contact Us</a></li>
    <li><a href="{{ route('login') }}">Login</a></li>
    <li><a href="{{ route('cart') }}">Cart</a></li>
  </ul>
</nav>

<body class="contact">


<main>
<section class="contact">
    <h1>Get In Touch With Us</h1>

    <div class="contact-info">
        <h3>Our Contact Details:</h3>
        <p><strong>Company:</strong> Tech4FourU</p>
        <p><strong>Email:</strong> Tech4FourU@gmail.com</p>
        <p><strong>Phone:</strong> 07123 456789</p>
        <p><strong>Address:</strong> Aston40, birmingham, B6 7AU</p>
    </div>

    <p>Got questions? Need support? Want to collaborate? Drop us a message below.</p>
    <li></li>
    <div id="successMessage" class="success-message"></div>

    <form id="contactForm" onsubmit="return handleFormSubmit(event)">
        <div class="form-group">
            <label for="fullName">Your Full Name:</label>
            <input type="text" id="fullName" name="fullName" required>
            <div id="nameError" class="error-message" style="display:none;"></div>
        </div>

        <div class="form-group">
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>
            <div id="emailError" class="error-message" style="display:none;"></div>
        </div>

        <div class="form-group">
            <label for="confirmEmail">Confirm Email Address:</label>
            <input type="email" id="confirmEmail" name="confirmEmail" required>
            <div id="confirmEmailError" class="error-message" style="display:none;"></div>
        </div>

        <div class="form-group">
            <label for="userMessage">Your Message:</label>
            <textarea id="userMessage" name="userMessage" rows="6" required></textarea>
            <div id="messageError" class="error-message" style="display:none;"></div>
        </div>

        <button type="submit" class="submit-btn">Send Message</button>
    </form>
</section>
</main>

<footer></footer>

<script>
function validateEmailField(emailValue) {
    const emailError = document.getElementById("emailError");
    const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!pattern.test(emailValue)) {
        emailError.textContent = "Please enter a valid email address.";
        emailError.style.display = "block";
        return false;
    } else {
        emailError.style.display = "none";
        return true;
    }
}

function checkEmailMatch() {
    const email = document.getElementById("email").value;
    const confirmEmail = document.getElementById("confirmEmail").value;
    const confirmError = document.getElementById("confirmEmailError");

    if (email !== confirmEmail) {
        confirmError.textContent = "Emails do not match.";
        confirmError.style.display = "block";
        return false;
    } else {
        confirmError.style.display = "none";
        return true;
    }
}

document.getElementById("email").addEventListener("blur", function () {
    validateEmailField(this.value);
});

document.getElementById("confirmEmail").addEventListener("blur", function () {
    checkEmailMatch();
});

function handleFormSubmit(event) {
    event.preventDefault();

    const errors = document.querySelectorAll(".error-message");
    errors.forEach(e => e.style.display = "none");

    const successBox = document.getElementById("successMessage");
    successBox.style.display = "none";
    successBox.textContent = "";

    let valid = true;

    const name = document.getElementById("fullName").value.trim();
    if (name.length < 2) {
        document.getElementById("nameError").textContent = "Please enter your full name.";
        document.getElementById("nameError").style.display = "block";
        valid = false;
    }

    if (!validateEmailField(document.getElementById("email").value)) valid = false;

    if (!checkEmailMatch()) valid = false;

    const message = document.getElementById("userMessage").value.trim();
    if (message.length < 10) {
        document.getElementById("messageError").textContent = "Please provide a message of at least 10 characters.";
        document.getElementById("messageError").style.display = "block";
        valid = false;
    }

    if (!valid) return false;

    successBox.textContent = "Your message has been sent.";
    successBox.style.display = "block";

    document.getElementById("contactForm").reset();

    return false;
}
</script>

</body>
</html>
