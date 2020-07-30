<?php
require_once('vendor/autoload.php');
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Project;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'cursophp',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

if(!empty($_POST)) {
	$project = new Project();
	$project->title = $_POST['title'];
	$project->dsc = $_POST['description'];
	$project->save();
}
?>
<html>
<head>
  <metacharset="utf-8">
  <metaname="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <linkrel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css"integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
  <linkrel="stylesheet"href="style.css">	
	<title>Add Project</title>
</head>
<body>
	<h1>Add Project</h1>
	<form action="addProject.php" method="post">
		<label for="title">Title:</label>
		<input type="text" name="title"><br>
		<label for="description">Description:</label>
		<input type="text" name="description"><br>
		<button type="submit">Save</button>
	</form>
</body>
</html>