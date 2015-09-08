<div class="container">
    <h1 class="alignCenter"><?= sanitize($t->task->name) ?></h1>

    <div>
        <form action="<?=URL . 'tasks/updatetask/' . sanitize($t->project_id) . '/' . sanitize($t->task_id) ?>" method="POST">
            <label>Name</label>
            <input type="text" name="name" value="<?=sanitize($t->task->name)?>" required>

            <label>Description</label>
            <input type="text" name="description" value="<?=sanitize($t->task->description)?>" required>

            <label>Priority</label>
            <input type="text" name="priority" value="<?=sanitize($t->task->priority)?>">

            <input type="submit" name="submit_update_task" value="Update">
        </form>

    </div>
</div>