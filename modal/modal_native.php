<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Delete Confirmation</title>
		<style>
			body {
				position: relative;
				padding-top: 20px;
			}

			.container {
				margin: 0 auto;
				max-width: 600px;
				border: 1px solid tan;
				padding: 10px;
			}

			.button {
				background-color: #EA4C89;
				border-radius: 8px;
				border-style: none;
				box-sizing: border-box;
				color: #FFFFFF;
				cursor: pointer;
				display: inline-block;
				font-family: "Haas Grot Text R Web", "Helvetica Neue", Helvetica, Arial, sans-serif;
				font-size: 14px;
				font-weight: 500;
				height: 40px;
				line-height: 20px;
				list-style: none;
				margin: 0;
				outline: none;
				padding: 10px 16px;
				position: relative;
				text-align: center;
				text-decoration: none;
				transition: color 100ms;
				vertical-align: baseline;
				user-select: none;
				-webkit-user-select: none;
				touch-action: manipulation;
			}

			.button:hover,
			.button:focus {
				background-color: #F082AC;
			}

			/* Your button styles */
			#deleteButton {
				/* position: fixed; */
				/* bottom: 20px;
				right: 20px;
				z-index: 1; */
				/* Ensure the button stays on top of other content */
			}
		</style>
	</head>

	<body>

		<!-- Your content -->

		<div class="container">
			<button id="deleteButton" class="button" onclick="confirmDelete()">Delete</button>
		</div>

		<script>
			function confirmDelete() {
				var result = window.confirm("Are you sure you want to delete?");
				if (result) {
					// If user clicks "OK" in the confirmation dialog
					// Replace 'YOUR_DELETE_URL' with the actual URL you want to redirect to after deletion
					window.location.href = 'YOUR_DELETE_URL';
				}
				// If user clicks "Cancel," no action is taken
			}
		</script>

	</body>

</html>