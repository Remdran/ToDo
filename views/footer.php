<footer class="footer">
    <div class="container">
        <span class="text-muted">Created by <a target = "_blank" href="https://remdran.github.io/karlgeorge/">Karl George</a> &copy;</span>
    </div>
</footer>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script>
        /*
         *  HANDLE CHANGING BETWEEN SHOWING "LOG IN" OR "SIGN UP"
        */
        // $("#toggleLogin").click(function(){
        //     if($("#loginActive").val() == "0") {
        //         $("#loginActive").val("1");
        //         $("#formHeader").html("Please log in");
        //         $("#signInBtn").html("Log In");
        //         $("#toggleLogin").html("Need an account? Sign Up");
        //     } else {
        //         $("#loginActive").val("0");
        //         $("#formHeader").html("Create an account");
        //         $("#signInBtn").html("Sign Up");
        //         $("#toggleLogin").html("Already a member? Log in");
        //     }
        // });
        //
        // /*
        //  *  HANDLE SENDING THE DATA OF THE SIGN UP / LOG IN FORM VIA AJAX
        //  */
        // $("#signInBtn").click(function() {
        //     $.ajax({
        //         method: "POST",
        //         url: "actions.php?action=loginSignup",
        //         data: "email=" + $("#inputEmail").val() + "&password=" + $("#inputPassword").val() + "&loginActive=" + $("#loginActive").val(),
        //         success: function(result) {
        //             if(result == 1) {
        //                 window.location.assign("http://localhost:8000/ToDo?page=personallist");
        //             } else {
        //                 $("#loginAlert").html(result).show();
        //             }
        //         }
        //     })
        // });
        //
        // $("#addNewItem").click(function() {
        //     $.ajax({
        //         method: "POST",
        //         url: "actions.php?action=newTask",
        //         data: "title=" + $("#taskTitle").val() + "&desc=" + $("#taskContent").val(),
        //         success: function(result) {
        //             if(result == 1) {
        //                 $("#taskSuccess").html("Your task has been added").show();
        //                 location.reload();
        //             } else {
        //                 $("#taskErrors").html(result).show();
        //             }
        //         }
        //    })
        // });
        //
        // $(".deleteBtn").click(function() {
        //     $.ajax({
        //         method: "POST",
        //         url: "actions.php?action=deleteTask",
        //         data: "taskId=" + $(this).data("id"),
        //         success: function(result) {
        //             if(result == 1) {
        //                 $("#taskSuccess").html("Your task has been deleted").show();
        //                 location.reload();
        //             } else {
        //                 $("#taskErrors").html(result).show();
        //             }
        //         }
        //     })
        // });
        //
        // /*
        //  * HANDLE A USER EDITING THEIR TASKS
        //  */
        // $(".tasks").bind('input propertychange', function() {
        //     $.ajax({
        //         method: "POST",
        //         url: "actions.php?action=editTask",
        //         data: "taskId=" + $(this).data("id") + "&title=" + $(this).find(".listTitle").html() + "&cont=" + $(this).find(".listCont").html(),
        //         success: function(result) {
        //             if(result == 1) {
        //                 $("#taskSuccess").html("Your task has been edited").show();
        //             } else {
        //                 $("#taskErrors").html(result).show();
        //             }
        //         }
        //     })
        //
        // });

    </script>
  </body>
</html>