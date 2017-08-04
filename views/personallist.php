<div class="container">
    <h1 class="title">Your Personal To Do List</h1>
    <div class="alert alert-danger" id="taskErrors" style="display:none"></div>    
    <div class="alert alert-success" id="taskSuccess" style="display:none"></div>    
    <div class="taskContainer">
        <?php
            displayList();
        ?>
    </div>
    <span class="editInfo">To edit a task simply click on the text you wish to change</span>


    <h2 class="form-newItem-heading" id="formHeader">Add a new task</h2>
    <form class="form-newItem">
        <input type="text" id="taskTitle" class="form-control" placeholder="Title of your task">
        <input type="text" id="taskContent" class="form-control" placeholder="Task description">
    </form>
    <div class="addItem">
         <button class="btn btn-lg btn-primary btn-block" id="addNewItem">Add Item</button>
    </div> 
</div>