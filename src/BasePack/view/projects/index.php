<div class="container">
    <h1 class="alignCenter">Projects</h1>

    <div class="box">
        <form method="POST">
            <?php foreach ($forms as $form):?>
                <?php if($form['type'] == 'radio'): ?>
                    <?php foreach ($form['html'] as $radio):?>
                        <label class="listLabel"><?=$radio['input']?> <?=$radio['label']?></label>
                    <?php endforeach;?>
                <?php else: ?>
                    <label class="listLabel"><?=$form['label']?><br> <?=$form['html']?></label>
                <?php endif; ?>
            <?php endforeach;?>

            <input type="submit" name="submit_add_project" value="Create">
        </form>
    </div>

    <div class="box">
        <h3 class="alignCenter">List of projects</h3>
        <table class="table">
            <thead>
                <tr class="grey">
                    <th>Name</th>
                    <th>Desciption</th>
                    <th>Priority</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project): ?>
                    <tr>
                        <td><a href="/tasks/<?=$project->id;?>"><?=$project->name?></a></td>
                        <td><?php if (isset($project->description)) echo $project->description; ?></td>
                        <td><?php if (isset($project->priority)) echo $project->priority; ?></td>
                        <td><a href="/projects/deleteproject/<?=$project->id?>">delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
