<?php require 'views/header.php'; ?>

    <div class="container">
        <h1 class="title">Your Personal To Do List</h1>
        <div class="taskContainer">
            <h1>Tasks</h1>
            <?php foreach ($tasks as $task) : ?>
                <p class="tasks" contenteditable="true" data-id="<?= $task->id ?>">
                    <span class="listTitle"><?= $task->title; ?></span>
                    <span class="listCont"> <?= $task->body; ?></span>
                    <button class="deleteBtn"><a href="/d?id=<?= $task->id ?>">&#10060;</a></button>
                </p>

                <form class="form-signin edit" method="POST" action="/tasks/edit">
                    <h2 class="form-signin-heading" id="formHeader">Update this entry</h2>
                    <input type="text" id="taskId" name="taskId" class="form-control" value="<?= $task->id ?>"
                           style="display:none">
                    <input type="text" id="taskTitle" name="taskTitle" class="form-control" placeholder="Task Title"
                           autofocus>
                    <input type="text" name="taskBody" id="taskBody" class="form-control"
                           placeholder="Task Description">
                    <button type="submit" class="btn btn-lg btn-primary btn-block" id="updateBtn">Update</button>
                </form>
            <?php endforeach; ?>

        </div>
        <span class="editInfo">To edit a task simply click on the text you wish to change</span>


        <h2 class="form-newItem-heading" id="formHeader">Add a new task</h2>
        <form class="form-newItem" method="POST" action="/tasks/new">
            <input type="text" id="taskTitle" name="taskTitle" class="form-control" placeholder="Title of your task">
            <input type="text" id="taskContent" name="taskContent" class="form-control" placeholder="Task description">

            <button type="submit" class="btn btn-lg btn-primary btn-block" id="addNewItem">Add Item</button>
        </form>
    </div>

<?php require 'views/footer.php'; ?>
