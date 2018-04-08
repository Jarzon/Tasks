<?php
    $status = [
        'open',
        'done'
    ];
?>
<div class="container">
    <h1 class="alignCenter"><?=$project->name ?> tasks list</h1>

    <div>
        <form action="/projects/updateproject/<?=$project_id ?>" method="POST">
            <?php foreach ($projectForms as $form):?>
                <?php if($form['type'] == 'radio'): ?>
                    <?php foreach ($form['html'] as $radio):?>
                        <label class="listLabel"><?=$radio['input']?> <?=$radio['label']?></label>
                    <?php endforeach;?>
                <?php else: ?>
                    <label class="listLabel"><?=$form['label']?><br> <?=$form['html']?></label>
                <?php endif; ?>
            <?php endforeach;?>

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
                <?php foreach ($taskForms as $form):?>
                    <?php if($form['type'] == 'radio'): ?>
                        <?php foreach ($form['html'] as $radio):?>
                            <label class="listLabel"><?=$radio['input']?> <?=$radio['label']?></label>
                        <?php endforeach;?>
                    <?php else: ?>
                        <label class="listLabel"><?=$form['label']?><br> <?=$form['html']?></label>
                    <?php endif; ?>
                <?php endforeach;?>

                <input type="submit" name="submit_add_task" value="Create">
            </form>
        </div>

    </div>
</div>

