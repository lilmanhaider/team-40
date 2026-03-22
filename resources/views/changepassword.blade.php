<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Your Password</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Poppins",sans-serif;
}

body{
    background:#f7f7f7;
}

/* NAVBAR (same as other pages) */
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

nav .logo img{
    height:55px;
    width:auto;
}

nav ul{
    margin-left:auto;
    display:flex;
    gap:30px;
    list-style:none;
}

nav ul li a{
    text-decoration:none;
    color:#444;
}

nav ul li a:hover{
    color:#0077ff;
}

/* MAIN BOX */
.password-container{
    width:360px;
    margin:80px auto;
    padding:25px;
    background:white;
    border:1px solid #eee;
    border-radius:10px;
    box-shadow:0 2px 8px rgba(0,0,0,0.05);
}

/* TITLE */
.password-container h1{
    text-align:center;
    margin-bottom:20px;
    color:#333;
}

/* INPUTS */
.password-container label{
    display:block;
    margin-top:12px;
    margin-bottom:6px;
    font-weight:600;
    color:#333;
}

.password-container input{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:6px;
    font-size:1rem;
}

/* BUTTON (DIFFERENT COLOR 🔥) */
.password-container button{
    width:100%;
    padding:12px;
    margin-top:20px;
    background:#ff9800; /* DIFFERENT from login/register */
    color:white;
    border:none;
    border-radius:6px;
    font-size:1rem;
    cursor:pointer;
    transition:0.2s;
}

.password-container button:hover{
    background:#e68900;
}

/* SUCCESS + ERROR */
.success{
    background:#e6ffed;
    border:1px solid #a8e6b7;
    color:#256029;
    padding:10px;
    border-radius:6px;
    margin-bottom:15px;
    text-align:center;
}

.error{
    background:#ffe5e5;
    border:1px solid #ff9c9c;
    color:#b30000;
    padding:10px;
    border-radius:6px;
    margin-bottom:15px;
}

.error ul{
    margin-left:15px;
}
</style>
</head>

<body>

@include('nav')

<div class="password-container">
     
    <h1>Change Your Password</h1>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <div>
            <label for="current_password">Current Password:</label>
            <input type="password" name="current_password" id="current_password" required>
        </div>

        <div>
            <label for="password">New Password:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <label for="password_confirmation">Confirm New Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>

        <button type="submit">
            Update Your Password?
        </button>
    </form>

</div>

</body>
</html>