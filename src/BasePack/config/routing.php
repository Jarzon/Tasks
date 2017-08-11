<?php
$this->get('/', 'BasePack\Home', 'index');

// Projects
$this->addRoute(['GET', 'POST'], '/projects', 'BasePack\Projects', 'index');
$this->get('/projects/deleteproject/{id:\d+}', 'BasePack\Projects', 'deleteProject');
$this->post('/projects/updateproject/{id:\d+}', 'BasePack\Projects', 'updateProject');

// Tasks
$this->get('/tasks/{id:\d+}', 'BasePack\Tasks', 'index');
$this->get('/tasks/updatetask/{id_project:\d+}/{id_task:\d+}', 'BasePack\Tasks', 'showTask');
$this->post('/tasks/updatetask/{id_project:\d+}/{id_task:\d+}', 'BasePack\Tasks', 'updateTask');
$this->post('/tasks/addtask/{id:\d+}', 'BasePack\Tasks', 'addTask');
$this->get('/tasks/deletetask/{id:\d+}', 'BasePack\Tasks', 'deleteTask');
$this->get('/tasks/donetask/{id_project:\d+}/{id_task:\d+}', 'BasePack\Tasks', 'doneTask');