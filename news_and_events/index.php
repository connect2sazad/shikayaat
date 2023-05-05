<?php
session_start();
if (!isset($_SESSION['news_and_events_admin']) || !array_key_exists('news_and_events_admin', $_SESSION)) {
	header('location: login.php');
} else {
	// do nothing
}

require_once "db_con.php";

$query = "SELECT * FROM `news` WHERE `news`.`is_deleted` = 0 ORDER BY `news_id` DESC;";
$run_query = mysqli_query($conn, $query);


$ni = isset($_GET['ni']) ? $_GET['ni'] : 'new';
if ($ni == 'new') {
	$title = '';
	$description = '';

	$action_page = "add-news.php";
} else {
	$query_ni = "SELECT * FROM `news` WHERE `news`.`news_id` = " . $ni . " AND `news`.`is_deleted` = 0;";
	$run_query_ni = mysqli_query($conn, $query_ni);
	$fetch_ni = mysqli_fetch_assoc($run_query_ni);
	$title = $fetch_ni['title'];
	$description = $fetch_ni['description'];
	$admin_id = $fetch_ni['admin_id'];
	$created_at = $fetch_ni['created_at'];
	$updated_at = $fetch_ni['updated_at'];

	$action_page = "update-news.php";
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Page Title</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://cdn.tiny.cloud/1/ajtejntm7b6j5pcvcakxixlmbh09wbma7bvicap7n63ns0ad/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<!-- <script src="https://cdn.tiny.cloud/1/your-api-key/tinymce/5/plugins/codesample/plugin.min.js"></script>
	<link rel="stylesheet" href="https://cdn.tiny.cloud/1/your-api-key/tinymce/5/plugins/codesample/plugin.min.css"> -->
	<script>
		tinymce.init({
			selector: '#description',
			plugins: [
				'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
				'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
				'table', 'emoticons', 'template', 'help'
			],
			toolbar1: 'undo redo | styleselect | bold italic underline ' +
				'fontsizeselect fontselect | forecolor backcolor',
			toolbar2: ' spellchecker | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ' +
				'removeformat lineheight | code fullscreen codesample preview | help',
			table_toolbar: 'tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
			table_appearance_options: true,
			spellchecker_dialog: true,
			menubar: 'favs file edit view insert format tools table help',
			content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
			statusbar: false,
			fontsize_formats: '6pt 8pt 10pt 12pt 14pt 18pt 24pt 36pt 72pt',
			// plugins: 'codesample',
			// toolbar: 'codesample',
		});
	</script>
</head>

<body>
	<header>
		<div class="logo">News & Events</div>
		<div class="logo">Logged in as <?= $_SESSION['news_and_events_admin'] ?></div>
		<button class="logout-button" onclick="location.href='.'">++ New ++</button>
		<button class="logout-button" onclick="location.href='logout.php'">Logout</button>
	</header>
	<div class="container">
		<div class="sidebar">
			<ul>
				<li><a href=".">++ New ++</a></li>
				<?php
				if (mysqli_num_rows($run_query) > 0) {
					while ($row = mysqli_fetch_assoc($run_query)) {
						echo '<li><a href="./?ni=' . $row['news_id'] . '">' . $row['title'] . '</a></li>';
					}
				}
				?>
				<li><a href=".">++ New ++</a></li>
			</ul>
		</div>
		<div class="content">
			<form action="<?= $action_page ?>" method="POST">
				<label for="title">Title:</label>
				<input type="text" id="title" name="title" value="<?= $title ?>" required>

				<label for="description">Description:</label>
				<textarea id="description" name="description"><?= $description ?></textarea>

				<?php
				if ($ni != 'new') {
				?>
					<div class="details">
						<div class="text-details">Last Update By: <?= $admin_id ?></div>
						<div class="text-details">Added At: <?= $created_at ?></div>
						<div class="text-details">Last Updated At: <?= $updated_at ?></div>
					</div>
				<?php
				}
				?>

				<div class="action-btns">
					<?php
					if ($ni != 'new') {
					?>
						<input type="hidden" name="ni" value="<?= $ni ?>">
						<button type="submit" class="submit-button">Update</button>
						<button type="button" class="submit-button delete-button" onclick="location.href='./delete-news.php?ni=<?= $ni ?>'">Delete</button>
					<?php
					} else {
					?>
						<button type="submit" class="submit-button">Save</button>
					<?php
					}
					?>
				</div>
			</form>
		</div>
	</div>
</body>

</html>