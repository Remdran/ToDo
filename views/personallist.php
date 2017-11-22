<?php require 'views/header.php'; ?>

    <div class="container">
        <h1 class="title">Your Personal To Do List</h1>
        <div class="taskContainer">
            <h1>Tasks</h1>
            <?php foreach ($tasks as $task) : ?>
                <p class="tasks" data-id="<?= $task->id; ?>">
                    <span class="listTitle"><?= $task->title; ?></span>
                    <span class="listCont"> <?= $task->body; ?></span>
                    <button class="editBtn" id="<?= $task->id; ?>">&#8801;</button>
                    <button class="deleteBtn"><a id="delA" href="/d?id=<?= $task->id ?>">&#10060;</a></button>
                </p>

                <form class="form-signin edit editForm<?= $task->id; ?>" method="POST" action="/tasks/edit">
                    <h2 class="form-signin-heading" id="updateFormHeader">Update this task</h2>
                    <input type="text" id="taskId" name="taskId" class="form-control" value="<?= $task->id; ?>"
                           style="display:none">
                    <input type="text" maxlength="20" name="taskTitle" class="form-control taskTitle"
                           value="<?= $task->title; ?>"
                           autofocus>
                    <input type="text" maxlength="40" name="taskBody" class="form-control taskBody"
                           value="<?= $task->body; ?>">
                    <button type="submit" class="btn btn-lg btn-primary btn-block" id="updateBtn">Update</button>
                </form>
            <?php endforeach; ?>
        </div>

        <h2 class="form-newItem-heading" id="formHeader">Add a new task</h2>
        <form class="form-newItem" method="POST" action="/tasks/new">
            <input type="text" maxlength="20" name="taskTitle" class="form-control taskTitle"
                   placeholder="Title of your task">
            <input type="text" maxlength="40" name="taskContent" class="form-control taskBody"
                   placeholder="Task description">

            <button type="submit" class="btn btn-lg btn-primary btn-block" id="addNewItem">Add Item</button>
        </form>
    </div>

<?php require 'views/footer.php'; ?>
