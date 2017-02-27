<div class="container">
    <h1 class="alignCenter"><?=$task->name ?></h1>

    <div>
        <form action="/tasks/updatetask/<?=$project_id?>/<?=$task_id ?>" method="POST">
            <label>Name</label>
            <input type="text" name="name" value="<?=$task->name?>" required>

            <label>Description</label>
            <input type="text" name="description" value="<?=$task->description?>" required>

            <label>Priority</label>
            <input type="text" name="priority" value="<?=$task->priority?>">

            <input type="submit" name="submit_update_task" value="Update">
        </form>

    </div>
</div>