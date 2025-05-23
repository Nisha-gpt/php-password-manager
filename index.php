<!DOCTYPE html>
<html>
<head>
    <title>Password Generator</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body 
        {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            height: 100vh;
            background: url('assets/vilnius-university-background.webp') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .overlay 
        {
            background-color: rgba(255, 255, 255, 0.9); /* semi-transparent white */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            text-align: center;
            width: 400px;
        }

        .overlay img 
        {
            width: 160px;
            margin-bottom: 15px;
        }

        button 
        {
            width: 100%;
            padding: 12px;
            margin-top: 12px;
            font-size: 15px;
            font-weight: bold;
            background-color: #70193d;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover { background-color: #5d1533; }
        a  { text-decoration: none;  }
        p { margin: 10px 0; }
    </style>
</head>
<body>
    <div class="overlay">
        <img src="assets/vilnius-university-image.png" alt="Vilnius University Logo">
        <h1>Password Generator</h1>
        <p><strong>Created by Nisha Murali</strong></p>
        <p>This project is made for a college lab work at Vilnius University.</p>
        <p>Requesting not to replicate the files except by faculty for assessment.</p>
        <p>Built using PHP based on Object-Oriented Programming (OOP).</p>
        <a href="signup.php"><button>Get Started</button></a>
        <a href="report.pdf" target="_blank"><button>View Lab Report / Assesment Report (PDF)</button></a>
    </div>
</body>
</html>
