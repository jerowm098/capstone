<!DOCTYPE html>
<html>
<head>
<title>School Clinic Kiosk</title>

<style>

body{
margin:0;
font-family:Arial;
background:#0f172a;
color:white;
text-align:center;
}

.container{
display:flex;
flex-direction:column;
justify-content:center;
align-items:center;
height:100vh;
}

button{
padding:15px 25px;
margin:10px;
font-size:16px;
border:none;
border-radius:8px;
background:#22c55e;
color:white;
cursor:pointer;
}

button:hover{
background:#16a34a;
}

input{
padding:10px;
margin:5px;
width:200px;
border-radius:5px;
border:none;
}

.hidden{
display:none;
}

</style>
</head>

<body>

<!-- HOME SCREEN -->
<div id="home" class="container">

<h1>School Clinic Self-Service Kiosk</h1>
<p>Select a service</p>

<button onclick="showPage('qr')">Scan Student QR</button>
<button onclick="showPage('login')">Student Login</button>
<button onclick="showPage('register')">Register Student</button>

</div>


<!-- QR SCAN PAGE -->
<div id="qr" class="container hidden">

<h2>Scan Student QR</h2>
<p>Place your Student ID on the scanner</p>

<button onclick="checkIn()">Simulate QR Scan</button>

<button onclick="showPage('home')">Back</button>

</div>


<!-- LOGIN PAGE -->
<div id="login" class="container hidden">

<h2>Student Login</h2>

<input placeholder="Student ID">
<br>
<input type="password" placeholder="Password">

<br>
<button onclick="login()">Login</button>

<button onclick="showPage('home')">Back</button>

</div>


<!-- REGISTER PAGE -->
<div id="register" class="container hidden">

<h2>Student Register</h2>

<input placeholder="Student ID">
<br>
<input placeholder="Full Name">
<br>
<input type="password" placeholder="Password">

<br>
<button onclick="register()">Register</button>

<button onclick="showPage('home')">Back</button>

</div>


<!-- DASHBOARD -->
<div id="dashboard" class="container hidden">

<h2>Student Dashboard</h2>

<button onclick="showPage('appointment')">Book Appointment</button>

<button onclick="queue()">Check Queue</button>

<button onclick="showPage('home')">Logout</button>

</div>


<!-- APPOINTMENT -->
<div id="appointment" class="container hidden">

<h2>Book Clinic Appointment</h2>

<input placeholder="Reason (fever, headache)">
<br>
<input type="date">

<br>
<button onclick="bookAppointment()">Confirm Appointment</button>

<button onclick="showPage('dashboard')">Back</button>

</div>


<!-- QUEUE -->
<div id="queue" class="container hidden">

<h2>Your Queue Number</h2>

<h1 id="queueNumber"></h1>

<button onclick="showPage('dashboard')">Back</button>

</div>


<script>


/* PAGE SWITCHING */

function showPage(page){

let pages = ["home","qr","login","register","dashboard","appointment","queue"]

pages.forEach(p=>{
document.getElementById(p).classList.add("hidden")
})

document.getElementById(page).classList.remove("hidden")

}



/* LOGIN */

function login(){

alert("Login successful")
showPage("dashboard")

}



/* REGISTER */

function register(){

alert("Registration successful")
showPage("dashboard")

}



/* QR CHECK IN */

function checkIn(){

alert("QR Scan Success")
showPage("dashboard")

}



/* BOOK APPOINTMENT */

function bookAppointment(){

alert("Appointment Booked")

let q = Math.floor(Math.random()*100)

document.getElementById("queueNumber").innerText = "Q-"+q

showPage("queue")

}



/* CHECK QUEUE */

function queue(){

let q = Math.floor(Math.random()*100)

document.getElementById("queueNumber").innerText = "Q-"+q

showPage("queue")

}



/* KIOSK FULLSCREEN MODE */

function openFullscreen() {

var elem = document.documentElement;

if (elem.requestFullscreen) {
elem.requestFullscreen();
}

}

openFullscreen()


</script>

</body>
</html>