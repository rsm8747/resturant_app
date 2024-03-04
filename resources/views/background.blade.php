<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Video Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
         crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            font-family: "Poppins";
        }
        .container {
            position: relative;
            width: 100vw; /* Full viewport width */
            height: 100vh; /* Full viewport height */
            overflow: hidden;
        }
        video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            z-index: 1;
        }
        .content h1 {
            font-size: 5vw; /* Responsive font size */
            color: #2c0a0a;
            margin-bottom: 2vw; /* Responsive margin */
        }
        .content a {
            font-size: 1.5vw; /* Responsive font size */
            color: #300b0b;
            text-decoration: none;
            border: 2px solid #300b0b;
            padding: 1.5vw 2.5vw; /* Responsive padding */
            border-radius: 2.5vw; /* Responsive border radius */
            transition: 0.3s;
        }
        .content a:hover {
            background-color: #690505;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="container">
        <video autoplay loop muted playsinline class="background-clip">
            <source src="{{ asset('images/video.mp4') }}" type="video/mp4">
        </video>
        
        <div class="content">
            <h1>Explore More</h1>
            <a href="about">Start Learn More</a>
        </div>
    </div>
</body>
</html>
