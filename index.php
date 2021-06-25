<?php include "templates/header.php" ?>
<body>
    <h2>Welcome</h1>
    <br>
    <ul>
    <p>Enter you email address to get Comies every five minutes</p>
        <li>First you need to register</li>
    </ul>
<form action="https://projectcomics.herokuapp.com/login.php" method="GET" >
    <label for="user">Enter Your Email:</label>
    <input type="email" name="username" placeholder="Username">
    <input type="submit" name="submit" value="Log In">
</form>
</body>
</html>

