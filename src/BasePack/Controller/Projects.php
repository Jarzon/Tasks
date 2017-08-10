<?php
namespace Tasks\BasePack\Controller;

use Prim\Controller;

use Tasks\BasePack\Model\Project;

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

        if(isset($_POST['submit_add_project'])) {

            $project->addProject($_POST['name'], $_POST['description'], $_POST['priority']);
        }

        // getting all projects and amount of projects
        $this->addVar('projects', $project->getAllProjects());
        $this->addVar('amount_of_projects', $project->getAmountOfProjects());

        $this->design('projects/index');
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

        header('location: /projects/');
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

        header('location: /tasks/'.$project_id);
    }
}
