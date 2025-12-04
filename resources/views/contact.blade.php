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

.nav-icon{
  font-size:1.05rem;
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

/* CARDS */
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

/* FOOTER */
footer{
  width:100%;
  text-align:center;
  background:#111;
  color:white;
  padding:35px;
  margin-top:40px;
  font-size:.95rem;
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
    <style>
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
        .form-group input, .form-group select, .form-group textarea {
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
    </style>
</head>

<body class="contact">

    <header class="main-header">
        <h1>Tech4FourU – Contact Us</h1>
    </header>

    <main>
        <section class="contact">
            <h1>Get In Touch With Us</h1>

            <div class="contact-info">
                <h3>Our Contact Details</h3>
                <p><strong>Company:</strong> Tech4FourU</p>
                <p><strong>Email:</strong> Tech4FourU@gmail.com</p>
                <p><strong>Phone:</strong> 07123 456789</p>
                <p><strong>Address:</strong> TBD</p>
            </div>

            <p>Got questions? Need support? Want to collaborate? Drop us a message below.</p>

            <form id="contactForm" onsubmit="return handleFormSubmit(event)">

                <div class="form-group">
                    <label for="fullName">Your Full Name:</label>
                    <input type="text" id="fullName" name="fullName" required>
                    <div id="nameError" class="error-message" style="display:none;"></div>
                </div>

                <div class="form-group">
                    <label for="email">Your Email:</label>
                    <input type="email" id="email" name="email" required placeholder="example@email.com">
                    <div id="emailError" class="error-message" style="display:none;"></div>
                </div>

                <div class="form-group">
                    <label for="confirmEmail">Confirm Email Address:</label>
                    <input type="email" id="confirmEmail" name="confirmEmail" required placeholder="Re-enter your email">
                    <div id="confirmEmailError" class="error-message" style="display:none;"></div>
                </div>

                <div class="form-group">
                    <label for="userMessage">Your Message:</label>
                    <textarea id="userMessage" name="userMessage" rows="6" required placeholder="Your message here..."></textarea>
                    <div id="messageError" class="error-message" style="display:none;"></div>
                </div>

                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </section>
    </main>

    <footer></footer>

    <script>
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        const minDate = tomorrow.toISOString().split("T")[0];
        document.getElementById("appointmentDate").setAttribute("min", minDate);

        const contactMethodSelect = document.getElementById("contactMethod");
        const phoneGroup = document.getElementById("phoneGroup");
        const phoneInput = document.getElementById("phoneNumber");

        contactMethodSelect.addEventListener("change", function () {
            if (this.value === "phone") {
                phoneGroup.style.display = "block";
                phoneInput.required = true;
            } else {
                phoneGroup.style.display = "none";
                phoneInput.required = false;
                phoneInput.value = "";
            }
        });

        document.getElementById("email").addEventListener("blur", function () {
            validateEmailField(this.value);
        });

        document.getElementById("confirmEmail").addEventListener("blur", function () {
            checkEmailMatch();
        });

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

        function handleFormSubmit(event) {
            event.preventDefault();

            const errorDivs = document.querySelectorAll(".error-message");
            errorDivs.forEach(div => div.style.display = "none");

            let isValid = true;
            let firstError = null;

            const name = document.getElementById("fullName").value.trim();
            if (name.length < 2) {
                const err = document.getElementById("nameError");
                err.textContent = "Please enter your full name.";
                err.style.display = "block";
                isValid = false;
                firstError = firstError || document.getElementById("fullName");
            }

            const email = document.getElementById("email").value;
            if (!validateEmailField(email)) {
                isValid = false;
                firstError = firstError || document.getElementById("email");
            }

            if (!checkEmailMatch()) {
                isValid = false;
                firstError = firstError || document.getElementById("confirmEmail");
            }

            const contactMethod = document.getElementById("contactMethod").value;
            const phone = document.getElementById("phoneNumber").value;

            if (contactMethod === "phone") {
                const phonePattern = /^(\+44|0)7\d{9}$/;
                if (!phonePattern.test(phone)) {
                    const err = document.getElementById("phoneError");
                    err.textContent = "Please enter a valid UK mobile number.";
                    err.style.display = "block";
                    isValid = false;
                    firstError = firstError || document.getElementById("phoneNumber");
                }
            }

            const message = document.getElementById("userMessage").value.trim();
            if (message.length < 10) {
                const err = document.getElementById("messageError");
                err.textContent = "Please provide a message of at least 10 characters.";
                err.style.display = "block";
                isValid = false;
                firstError = firstError || document.getElementById("userMessage");
            }

            if (!isValid) {
                if (firstError) firstError.focus();
                return false;
            }

            alert("Your message has been sent.");
            document.getElementById("contactForm").reset();
            phoneGroup.style.display = "none";
            return false;
        }
    </script>

</body>
</html>
