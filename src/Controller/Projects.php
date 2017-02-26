<?php
namespace Tasks\Controller;

use Prim\Translate;
use Prim\Controller;

use Tasks\Model\Project;

/**
 * Class Projects
 *
 */
class Projects extends Controller
{
    /**
     * PAGE: index
     */
    public function index()
    {
        $project = new Project($this->db);

        $t = new Translate($this->_getTranslation());

        // getting all projects and amount of projects
        $t->projects = $project->getAllProjects();
        $t->amount_of_projects = $project->getAmountOfProjects();

        $this->design('projects/index', $t);
    }

    /**
     * ACTION: addProject
     */
    public function addProject()
    {
        $project = new Project($this->db);

        if (isset($_POST['submit_add_project'])) {

            $project->addProject($_POST['name'], $_POST['description'], $_POST['priority']);
        }

        header('location: ' . URL . 'projects/');
    }

    /**
     * ACTION: deleteProject
     * @param int $project_id Id of the to-delete project
     */
    public function deleteProject($project_id)
    {
        $project = new Project($this->db);

        if (isset($project_id)) {

            $project->deleteProject($project_id);
        }

        header('location: ' . URL . 'projects/');
    }

    /**
     * ACTION: updateProject
     * @param int $project_id Id of the project to update
     */
    public function updateProject($project_id)
    {
        $project = new Project($this->db);

        if (isset($_POST['submit_update_project'])) {
            $project->updateProject($project_id, $_POST['name'], $_POST['description'],  $_POST['priority']);
        }

        header('location: ' . URL . 'tasks/'.$project_id);
    }
}
