<?php
    $status = [
        'open',
        'done'
    ];
?>
<div class="container">
    <h1 class="alignCenter"><?=$project->name ?><?= $_(' tasks list')?></h1>

    <div>
        <form action="/projects/updateproject/<?=$project_id ?>" method="POST">
            <label>Name</label>
            <input type="text" name="name" value="<?=$project->name ?>" required>

            <label>Description</label>
            <input type="text" name="description" value="<?=$project->description ?>" required>

            <label>Priority</label>
            <input type="number" name="priority" value="<?=$project->priority ?>">

            <input type="submit" name="submit_update_project" value="Update">
        </form>

        <table class="table">
            <thead>
            <tr class="grey">
                <td>Name</td>
                <td>Desciption</td>
                <td>Priority</td>
                <td>Done</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tasks as $task) { ?>
                <tr class="<?=$status[$task->status]?>">
                    <td><a href="/tasks/updatetask/<?=$project_id?>/<?=$task->id ?>"><?=$task->name ?></a></td>
                    <td><?php if (isset($task->description)) echo $task->description; ?></td>
                    <td><?php if (isset($task->priority)) echo $task->priority; ?></td>
                    <td><a href="/tasks/donetask/<?=$project_id?>/<?=$task->id ?>">✓</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <div class="box">
            <form action="/tasks/addtask/<?=$project_id?>" method="POST">
                <label>Name</label>
                <input type="text" name="name" value="" required>

                <label>Description</label>
                <input type="text" name="description" value="" required>

                <label>Priority</label>
                <input type="number" name="priority" value="">

                <input type="submit" name="submit_add_task" value="Create">
            </form>
        </div>

    </div>
</div>

