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