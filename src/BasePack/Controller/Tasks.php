<?php
namespace Tasks\BasePack\Controller;

use Jarzon\Forms;
use Prim\Controller;

use Tasks\BasePack\Model\Project;
use Tasks\BasePack\Model\Task;

class Tasks extends Controller
{
    public function getForms() {
        $forms = new Forms($_POST);

        return $forms
            ->text('name')->label('Name')->required()
            ->text('description')->label('Description')->required()
            ->number('priority')->label('Priority')->required();
    }

    public function index($project_id)
    {
        /**
         * @var Project $project
         * @var Task $task
         */
        $project = $this->getModel('Project');
        $task = $this->getModel('Task');

        $taskForms = $this->getForms();

        $projectForms = $this->container->getController('Tasks\BasePack\Controller\Projects')->getForms();

        if (!isset($project_id) || !is_numeric($project_id)) {
            $this->redirect('/tasks/');
        }

        // in a real application we would also check if this db entry exists and therefore show the result or
        // redirect the user to an error page or similar

        // load views. within the views we can echo out $project easily
        $this->design('tasks/index', 'BasePack', [
            'project' => $project->get($project_id),
            'projectForms' => $projectForms->getForms(),
            'tasks' => $task->getAllProjectTasks($project_id),
            'taskForms' => $taskForms->getForms(),
            'project_id' => $project_id
        ]);
    }

    public function addTask($project_id)
    {
        /** @var Task $task */
        $task = $this->getModel('Task');

        $forms = $this->getForms();

        if (isset($_POST['submit_add_task'])) {
            try {
                $values = $forms->verification();
            }
            catch (\Exception $e) {
                $this->addVar('message', ['alert', $e->getMessage()]);
            }

            if(isset($values)) {
                $values['project_id'] = $project_id;

                $task->add($values);

                $this->addVar('message', ['ok', 'The task have been added']);
            }
        }

        $this->redirect("/tasks/$project_id");
    }

    public function showTask($project_id, $task_id)
    {
        /** @var Task $task */
        $task = $this->getModel('Task');

        if(!is_numeric($project_id)) {
            $this->redirect('/projects/');
        }
        else if (!is_numeric($task_id)) {
            $this->redirect("/projects/$project_id");
        }

        // in a real application we would also check if this db entry exists and therefore show the result or
        // redirect the user to an error page or similar

        if($task = $task->get($task_id)) {
            // load views. within the views we can echo out $project easily
            $this->design('tasks/task', 'BasePack', [
                'task' => $task,
                'project_id' => $project_id,
                'task_id' => $task_id,
            ]);
        } else {
            $this->redirect('/error/404');
        }
    }

    /**
     * ACTION: updateTask
     */
    public function updateTask($project_id, $task_id)
    {
        /** @var Task $task */
        $task = $this->getModel('Task');

        $forms = $this->getForms();

        if (isset($_POST['submit_update_task'])) {
            try {
                $values = $forms->verification();
            }
            catch (\Exception $e) {
                $this->addVar('message', ['alert', $e->getMessage()]);
            }

            if(isset($values)) {
                $task->change($values, $project_id, $task_id);

                $this->addVar('message', ['ok', 'The task have been added']);
            }
        }

        // if we have POST data to create a new task entry
        if (isset($_POST["submit_update_task"])) {
            // do updateTask() from model/model.php
            $task->change($values);
            $task->updateTask($_POST['name'], $_POST['description'],  $_POST['priority'], $project_id, $task_id);
        }

        // where to go after task has been added
        $this->redirect("/tasks/$project_id");
    }

    /**
     * ACTION: deleteTask
     * @param int $task_id Id of the to-delete task
     */
    public function deleteTask($task_id)
    {
        /** @var Task $task */
        $task = $this->getModel('Task');

        // if we have an id of a task that should be deleted
        if (isset($task_id)) {
            // do deleteTask() in model/model.php
            $task->deleteTask($task_id);
        }

        $this->redirect("/tasks/");
    }

    /**
     * ACTION: deleteTask
     * @param int $task_id Id of the to-delete task
     */
    public function doneTask($project_id, $task_id)
    {
        /** @var Task $task */
        $task = $this->getModel('Task');

        // if we have an id of a task that should be deleted
        if (isset($task_id)) {
            // do deleteTask() in model/model.php
            $task->doneTask($project_id, $task_id);
        }

        $this->redirect("/tasks/$project_id");
    }
}
