<div class="container">
    <h1 class="alignCenter"><?=$t->_('projects')?></h1>

    <div class="box">
        <form action="<?=URL?>projects/addproject" method="POST">
            <label><?=$t->_('name')?></label>
            <input type="text" name="name" value="" required>

            <label><?=$t->_('description')?></label>
            <input type="text" name="description" value="" required>

            <label><?=$t->_('priority')?></label>
            <input type="number" name="priority" value="">

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
                <?php foreach ($t->projects as $project): ?>
                    <tr>
                        <td><a href="<?=URL . 'tasks/' . $project->id; ?>"><?=$project->name?></a></td>
                        <td><?php if (isset($project->description)) echo $project->description; ?></td>
                        <td><?php if (isset($project->priority)) echo $project->priority; ?></td>
                        <td><a href="<?=URL . 'projects/deleteproject/' . $project->id?>">delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
