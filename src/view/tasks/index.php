<div class="container">
    <h1 class="alignCenter"><?=$t->project->name ?></h1>

    <div>
        <form action="<?=URL?>projects/updateproject/<?=$t->project_id ?>" method="POST">
            <label>Name</label>
            <input type="text" name="name" value="<?=$t->project->name ?>" required>

            <label>Description</label>
            <input type="text" name="description" value="<?=$t->project->description ?>" required>

            <label>Priority</label>
            <input type="text" name="priority" value="<?=$t->project->priority ?>">

            <input type="submit" name="submit_update_task" value="Update">
        </form>

        <h3>List of tasks</h3>
        <table class="table">
            <thead>
            <tr class="grey">
                <td>Name</td>
                <td>Desciption</td>
                <td>Priority</td>
                <td>DELETE</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($t->tasks as $task) { ?>
                <tr>
                    <td><a href="<?=URL . 'tasks/updatetask/' . $t->project_id . '/' . $task->id ?>"><?=$task->name ?></a></td>
                    <td><?php if (isset($task->description)) echo $task->description; ?></td>
                    <td><?php if (isset($task->priority)) echo $task->priority; ?></td>
                    <td><a href="<?=URL . 'tasks/deletetask/' . $task->id ?>">delete</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <div class="box">
            <form action="<?=URL ?>tasks/addtask/<?=$t->project_id ?>" method="POST">
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

