<body>
<div class="jumbotron">
    <div class="container">

        <h3>Enter Your Email to Unsubscribe</h3>
        <form action="http://localhost:63342/email/templates/unsubscribed.php" method="post">
            <label for="email">Email: </label>
            <input id="email" type="text" name="email" placeholder="yourmail@email.com">
            <input class="btn btn-danger" type="submit" name="submit" value="Unsubscribe">
