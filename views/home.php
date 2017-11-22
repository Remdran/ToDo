<?php require 'views/header.php'; ?>

    <div class="container">
        <!--            should use if is not set-->
        <?php if ($_SESSION['id'] == null) : ?>
            <h1 class="title">Your Personal To Do List!</h1>

            <h4 class="titleInfo">This is a website where you can keep track of any tasks you have to complete</h4>

            <p class="signupP"><a href="/signup">Sign up</a> if you don't already have an account</p>
            <p class="loginP"><a href="/login">Log In</a> here if you already have an account</p>
        <?php else : ?>
            <?php header('Location:/tasks'); ?>
        <?php endif; ?>
    </div>

<?php require 'views/footer.php'; ?>