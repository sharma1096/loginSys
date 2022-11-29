<?php
// session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) {
    $status = 'hidden';
} else {
    $status = '';
}

echo "<nav class='navbar navbar-expand-lg navbar-light bg-light'>
<a class='navbar-brand' href='#'>iSecure</a>
<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent'
    aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
</button>

<div class='collapse navbar-collapse' id='navbarSupportedContent'>
    <ul class='navbar-nav mr-auto'>
        <li class='nav-item active'>
            <a class='nav-link' href='/PHPtutorial/loginSys/welcome.php'>Home <span class='sr-only'>(current)</span>
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='/PHPtutorial/loginSys/login.php'>LogIn</a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='/PHPtutorial/loginSys/signUp.php'>SignUp</a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' style='visibility:" .
    $status .
    "' href='/PHPtutorial/loginSys/logout.php'>logout</a>
        </li>
    </ul>
    <form class='form-inline my-2 my-lg-0'>
        <input class='form-control mr-sm-2' type='search' placeholder='Search' aria-label='Search'>
        <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>
    </form>
</div>
</nav>";
?>