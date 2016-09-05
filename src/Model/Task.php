<?php
namespace Tasks\Model;

class Task extends \Prim\Core\Model
{
    public function getAllProjectTasks($project_id)
    {
        $sql = "SELECT id, name, description, priority FROM task WHERE project_id = :project_id";
        $query = $this->db->prepare($sql);

        $parameters = array(':project_id' => $project_id);

        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function getTask($task_id)
    {
        $sql = "SELECT name, description, priority FROM task WHERE id = :task_id";
        $query = $this->db->prepare($sql);

        $parameters = array(':task_id' => $task_id);

        $query->execute($parameters);

        return $query->fetch();
    }

    /**
     * Update a task in database
     * @param string $name
     * @param string $description
     * @param string $priority
     * @param int $project_id
     */
    public function updateTask($name, $description, $priority, $project_id, $task_id)
    {
        $sql = "UPDATE task SET name = :name, description = :description, priority = :priority WHERE id = :task_id AND project_id = :project_id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':description' => $description, ':priority' => $priority, ':project_id' => $project_id, ':task_id' => $task_id);

        $query->execute($parameters);
    }

    /**
     * Get a project from database
     */
    public function getProject($task_id)
    {
        $sql = "SELECT id, name, description, priority FROM task WHERE id = :task_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':task_id' => $task_id);

        $query->execute($parameters);

        return $query->fetch();
    }

    /**
     * Add a project to database
     * @param string $name
     * @param string $description
     * @param string $priority
     * @param int $project_id
     */
    public function addTask($name, $description, $priority, $project_id)
    {
        $sql = "INSERT INTO task (project_id, name, description, priority) VALUES (:project_id, :name, :description, :priority)";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id, ':name' => $name, ':description' => $description, ':priority' => $priority);

        $query->execute($parameters);
    }

    /**
     * Delete a task in the database
     * @param int $task_id Id of task
     */
    public function deleteTask($task_id)
    {
        $sql = "DELETE FROM task WHERE id = :task_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':task_id' => $task_id);

        $query->execute($parameters);
    }
}