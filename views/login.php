<?php require 'views/header.php'; ?>

<div class="container">
    <h1 class="title">Your Personal To Do List!</h1>

    <form class="form-signin" method="POST" action="/login">
        <h2 class="form-signin-heading" id="formHeader">Log In</h2>
        <div class="alert alert-danger" id="loginAlert" style="display:none"></div>
        <input type="hidden" id="loginActive" name="loginActive" value="0">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" autofocus
               required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button type="submit" class="btn btn-lg btn-primary btn-block" id="signInBtn">Log In</button>
    </form>
    <p><a href="/signup" id="toggleLogin">Create an account</a></p>
</div>

<?php require 'views/footer.php'; ?>
