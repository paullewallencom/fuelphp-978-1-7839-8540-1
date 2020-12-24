<?php

// Fuel initialization (inspired from index.php)
define('DOCROOT', __DIR__.DIRECTORY_SEPARATOR);
define('APPPATH', realpath(__DIR__.'/../fuel/app/').DIRECTORY_SEPARATOR);
define('PKGPATH', realpath(__DIR__.'/../fuel/packages/').DIRECTORY_SEPARATOR);
define('COREPATH', realpath(__DIR__.'/../fuel/core/').DIRECTORY_SEPARATOR);
defined('FUEL_START_TIME') or define('FUEL_START_TIME', microtime(true));
defined('FUEL_START_MEM') or define('FUEL_START_MEM', memory_get_usage());
require COREPATH.'classes'.DIRECTORY_SEPARATOR.'autoloader.php';
class_alias('Fuel\\Core\\Autoloader', 'Autoloader');
require APPPATH.'bootstrap.php';

echo 'FuelPHP is initialized...';


// --- Executing queries without the ORM
\DB::query('TRUNCATE TABLE `projects`;')->execute();
\DB::query('TRUNCATE TABLE `tasks`;')->execute();
// \DBUtil::truncate_table('projects'); is also possible

// --- Creating new objects
$project = Model_Project::forge(); // = new Model_Project()
$project->name = 'First project';
$project->save();

// You can also set properties when calling the forge method
$project = Model_Project::forge(
    array('name' => 'Second project')
);
$project->save();

// --- Finding specific objects
$project = Model_Project::find('first');
\Debug::dump('first', $project);

$project = Model_Project::find('last');
\Debug::dump('last', $project);

$project = Model_Project::find(1);
\Debug::dump('with id = 1', $project);

// --- Updating an object
$project = Model_Project::find(1); // Load project with id = 1
$project->name = 'First one';
$project->save();

// --- Deleting an object.
$project = Model_Project::find(1); // Load project with id = 1
$project->delete();

// --- Loading several objects
// First creating an additional project for a more interesting
// result
$project = Model_Project::forge();
$project->name = 'Third project';
$project->save();

// Finding all projects
$projects = Model_Project::find('all');
\Debug::dump('all', $projects);

$projects = Model_Project::query()->get();
\Debug::dump('all (using query)', $projects);

// Creating sample tasks
Model_Task::forge(array('name' => 'Marketing plan',
    'status' => 0, 'rank' => 0, 'project_id' => 2))->save();

Model_Task::forge(array('name' => 'Update website',
    'status' => 1, 'rank' => 1, 'project_id' => 2))->save();

Model_Task::forge(array('name' => 'Improve website template',
    'status' => 1, 'rank' => 2, 'project_id' => 2))->save();

Model_Task::forge(array('name' => 'Contact director',
    'status' => 0, 'rank' => 0, 'project_id' => 3))->save();

Model_Task::forge(array('name' => 'Buy a new computer',
    'status' => 1, 'rank' => 1, 'project_id' => 3))->save();


$task = Model_Task::find('first',
    array(
        'where' => array(
            array('project_id' => 2)
        )
    )
);
\Debug::dump('first with project_id = 2', $task);

$task = Model_Task::query()
    ->where('project_id', 2)
    ->order_by('id', 'asc') // Will be introduced shortly
    ->get_one();
\Debug::dump('first with project_id = 2 (using query)', $task);




$tasks = Model_Task::find('all',
    array(
        'where' => array(
            array('project_id' => 2)
        )
    )
);
\Debug::dump('project_id = 2', $tasks);

$tasks = Model_Task::query()
    ->where('project_id', 2)
    ->get();
\Debug::dump('project_id = 2 (using query)', $tasks);



$tasks = Model_Task::find('all',
    array(
        'where' => array(
            array('project_id' => 2),
            array('status' => 1)
        )
    )
);
\Debug::dump('project_id = 2 & status = 1', $tasks);

$tasks = Model_Task::query()
    ->where('project_id', 2)
    ->where('status', 1)
    ->get();
\Debug::dump('project_id = 2 & status = 1 (using query)', $tasks);


$tasks = Model_Task::find('all',
    array(
        'where' => array(
            array('project_id', '>', 2),
            array('status' => 1)
        )
    )
);
\Debug::dump('project_id > 2 & status = 1', $tasks);

$tasks = Model_Task::query()
    ->where('project_id', '>', 2)
    ->where('status', 1)
    ->get();
\Debug::dump('project_id > 2 & status = 1 (using query)', $tasks);


$tasks = Model_Task::find('all',
    array(
        'where' => array(
            array('project_id' => 2),
            'or' => array('status' => 1)
        )
    )
);
\Debug::dump('project_id = 2 or status = 1', $tasks);

$tasks = Model_Task::query()
    ->where('project_id', '=', 2)
    ->or_where('status', 1)
    ->get();
\Debug::dump('project_id = 2 or status = 1 (using query)', $tasks);


$tasks = Model_Task::find('all',
    array(
        'where' => array(
            array(
                'name',
                'LIKE',
                '%website%'
            ),
        )
    )
);
\Debug::dump('name contains "website"', $tasks);

$tasks = Model_Task::query()
    ->where('name', 'LIKE', '%website%')
    ->get();
\Debug::dump('name contains "website" (using query)', $tasks);



$tasks = Model_Task::find('all',
    array(
        'where' => array(
            array(
                'name',
                'LIKE',
                '%website%'
            ),
        ),
        'order_by' => array(
            'rank' => 'ASC'
        ),
    )
);
\Debug::dump(
    'name contains "website" ordered by the rank column',
    $tasks
);


$tasks = Model_Task::query()
    ->where('name', 'LIKE', '%website%')
    ->order_by('rank', 'ASC')
    ->get();
\Debug::dump(
    'name contains "website" ordered by the rank column (query)',
    $tasks
);

$task = Model_Task::find(1, array('from_cache' => false));
$project = $task->project;
\Debug::dump('Project of task with id = 1', $project);

$project = Model_Project::find(
    2,
    array('from_cache' => false)
);
$tasks = $project->tasks;
\Debug::dump('Tasks of project with id = 2', $tasks);


$projects = Model_Project::find(
    'all',
    array('from_cache' => false)
);
foreach ($projects as $project) {
    \Debug::dump(
        'LOOP 1: Tasks of project with id = '.$project->id,
        $project->tasks
    );
}

$projects = Model_Project::find(
    'all',
    array(
        'related' => 'tasks'
    )
);
foreach ($projects as $project) {
    \Debug::dump(
        'LOOP 2: Tasks of project with id = '.$project->id,
        $project->tasks
    );
}

/*
$task = Model_Task::find(1, array('from_cache' => false));
$task->project_id = 3;
$task->save();
*/

$task = Model_Task::find(1, array('from_cache' => false));
$task->project = Model_Project::find(
    3,
    array('from_cache' => false)
);
$task->save();


$task = Model_Task::find(1, array('from_cache' => false));
$task->project = Model_Project::forge();
$task->project->name = 'Fourth project';
$task->save();


$project = Model_Project::find(
    2,
    array('from_cache' => false)
);
$task = Model_Task::forge();
$task->name         = 'Buy a new mouse';
$task->status       = 0;
$task->rank        = 2;
$project->tasks[] = $task;
$project->save();


$project = Model_Project::find(
    2,
    array('from_cache' => false)
);
$project->tasks[6]->name = 'Buy an optical mouse';
$project->save();


$project = Model_Project::find(
    3,
    array('from_cache' => false)
);
unset($project->tasks[4]);
$project->save();

