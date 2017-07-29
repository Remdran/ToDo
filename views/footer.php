<footer class="footer">
    <div class="container">
        <span class="text-muted">Created by Karl George &copy;</span>
    </div>
</footer>


<!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script>
        $("#toggleLogin").click(function(){
            if($("#loginActive").val() == "0") {
                $("#loginActive").val("1");
                $("#formHeader").html("Please log in");
                $("#signInBtn").html("Log In");
                $("#toggleLogin").html("Need an account? Sign Up");
            } else {
                $("#loginActive").val("0");
                $("#formHeader").html("Create an account");
                $("#signInBtn").html("Sign In");
                $("#toggleLogin").html("Already a member? Log in");
            }
        });
    </script>
  </body>
</html>