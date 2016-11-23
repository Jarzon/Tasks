<div class="container">
    <h1 class="alignCenter"><?=$t->task->name ?></h1>

    <div>
        <form action="<?=URL . 'tasks/updatetask/' . $t->project_id . '/' . $t->task_id ?>" method="POST">
            <label>Name</label>
            <input type="text" name="name" value="<?=$t->task->name?>" required>

            <label>Description</label>
            <input type="text" name="description" value="<?=$t->task->description?>" required>

            <label>Priority</label>
            <input type="text" name="priority" value="<?=$t->task->priority?>">

            <input type="submit" name="submit_update_task" value="Update">
        </form>

    </div>
</div>