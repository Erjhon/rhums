<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/animations.css">  
    <link rel="stylesheet" href="assets/css/main.css">  
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Rural Health Unit II</title>
    <style>
        table{
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>

</head>
<body>
    <div class="full-height mySlides bg-success py-2" style="background: linear-gradient(
        to left,rgba(23, 173, 106, 0.9),rgba(23, 173, 160, 0.9)),url(./assets/assets/img/brand/bg.webp);">
        <nav class="navbar navbar-horizontal navbar-expand-lg navbar-dark">
            <div class="container">
                <h1 class="edoc-logo" style="text-shadow: 2px 2px 5px black;">Medical Clinic</h1>
                <small class="edoc-logo-sub"> | Rural Health Unit II</small>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-default">
                    <div class="navbar-collapse-header">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <font class="edoc-logo" style="text-shadow: 2px 2px 5px black;">Medical Clinic </font>
                                <font class=" text-dark"> | Rural Health Unit II</font>
                            </div>
<!--   <div class="col-6 collapse-close">
<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
<span></span>
<span></span>
</button>
</div> -->
</div>
</div>

<ul class="navbar-nav ml-lg-auto">
    <div>  
        <li class="nav-item">
            <a href="admin/login.php" class="non-style-link"><h2 class="nav-item"><b>LOGIN</h2></a>
            </li>
        </div>
        <div>
            <li class="nav-item">
                <a href="patient/register.php" class="non-style-link"><h2 class="nav-item" ><b>REGISTER</h2></a>
                </li>
            </div>
        </ul>
    </div>
</nav>
<div class="container-fluid bg-light ps-5 pe-0 d-none d-lg-block fixed-top">
    <div class="row gx-0">
        <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center">
                <marquee> <small class="py-2"><i class="far fa-clock text-primary me-4"></i>Clinic Hours: Mon - Fri : 8:00 AM - 12:00 PM & 1:00 PM - 5:00 PM </small></marquee>
            </div>
        </div>
    </div>
</div>
<div>
    <p class="heading-text mt-8" style="text-shadow: 5px 5px 10px black;">ONLINE MEDICAL APPOINTMENT</p>
    <p class="sub-text2">Avoid Hassles & Delays.<br> 
    A passion for putting patients first.</p> <br>

    <center>
        <a href="admin/login.php" onClick="return confirm('You need to log in first before setting an appointment')" title="Set an Appointment" tooltip-placement="top" tooltip="Login" >
            <input type="button" value="Set an Appointment" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
        </a>
    </div>


</body>
</html>