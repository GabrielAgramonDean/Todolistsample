<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>To Do List</title>
</head>
<body>
	<h2>To do List App</h2>
	<form>
		<input type="text" name="name" id="new-task">
		<button id="addTaskBtn">Add Task</button>
	</form>

	<script
  	src="https://code.jquery.com/jquery-3.3.1.min.js"
  	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  	crossorigin="anonymous"></script>


	<script>  //using AJAX
		$("#addTaskBtn").click(() => {
			const newTask = $('#new-task').val();

			$.ajax ({
				method : 'GET',
				url : 'controllers/add_task.php',
				data : {name : newTask},
			}).done(
			     console.log('added task')
			     );
		});

	</script> 


		<!-- Display Task -->

		<h2> Task List</h2>
		<ul id="taskList">

		<?php 

	 	require_once 'connection.php';

	 	$sql = "SELECT * FROM task";
	 	$result = mysqli_query ($conn, $sql);

	 	while($row = mysqli_fetch_assoc($result)){ ?>
	 		<li data-id="<?php echo $row['id'] ; ?>">
	 			<?php echo $row['name'] . " is task number " . $row['id'] ; ?>
	 			<button class="deleteBtn">Delete</button>
	 		</li>

	 	
	 	<?php } ?>
		</ul>

	<script> //delete task
		$('#taskList').on('click', '.deleteBtn', function(){
			const task_id = $(this).parent().attr('data-id');
			//console.log(task_id);
			$.ajax({
				method : 'post',
				url : 'controllers/remove_task.php',
				data : { task_id : task_id }
			}).done( data => {
				$(this).parent().fadeOut();
			});
		});

	</script>

</body>
</html>