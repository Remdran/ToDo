<div class="container">
    <h1 class="title">Your Personal To Do List</h1>

    <?php
        displayList();
    ?>        

    <form class="form-newItem">
        <h2 class="form-signin-heading" id="formHeader">Add a new task</h2>
        <input type="text" id="taskTitle" class="form-control" placeholder="Title of your task">
        <input type="text" id="taskContent" class="form-control" placeholder="Task description">
    </form>
    <div class="addItem">
         <button class="btn btn-lg btn-primary btn-block" id="addNewItem">Add Item</button>
    </div> 
</div>