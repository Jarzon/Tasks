<?php
namespace Tasks\BasePack\Model;

class Project extends \Prim\Model
{
    public function getAllProjects()
    {
        $query = $this->db->prepare("SELECT id, name, description, priority FROM project ORDER BY priority DESC");
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Add a project to database
     * @param string $name
     * @param string $description
     * @param string $priority
     */
    public function addProject($name, $description, $priority)
    {
        $query = $this->db->prepare("INSERT INTO project (name, description, priority) VALUES (:name, :description, :priority)");
        $parameters = array(':name' => $name, ':description' => $description, ':priority' => $priority);

        $query->execute($parameters);
    }

    /**
     * Delete a project in the database
     * @param int $project_id Id of project
     */
    public function deleteProject($project_id)
    {
        $query = $this->db->prepare("DELETE FROM project WHERE id = :project_id");
        $parameters = array(':project_id' => $project_id);

        $query->execute($parameters);
    }

    /**
     * Get a project from database
     */
    public function getProject($project_id)
    {
        $query = $this->db->prepare("SELECT id, name, description, priority FROM project WHERE id = :project_id LIMIT 1");
        $parameters = array(':project_id' => $project_id);

        $query->execute($parameters);

        return $query->fetch();
    }

    /**
     * Update a project in database
     * @param int $project_id
     * @param string $name
     * @param string $description
     * @param string $priority

     */
    public function updateProject($project_id, $name, $description, $priority)
    {
        $query = $this->db->prepare("UPDATE project SET name = :name, description = :description, priority = :priority WHERE id = :project_id");
        $parameters = array(':name' => $name, ':description' => $description, ':priority' => $priority, ':project_id' => $project_id);

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     */
    public function getAmountOfProjects()
    {
        $query = $this->db->prepare("SELECT COUNT(id) AS amount_of_projects FROM project");
        $query->execute();

        return $query->fetch()->amount_of_projects;
    }
}