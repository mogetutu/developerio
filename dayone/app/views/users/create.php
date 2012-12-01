<html>
<head>
    <title>Users</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Form starts here -->
    <div class="container">
	<div class="row-fluid">
	    <div class="page-header"><h2>Create User</h2></div>
    <form action="<?=site_url('users/add');?>" class="form-horizontal" method="post">
    <label for="name">Name</label>
	<input type="text" class="input-large" name="name">
	<label for="email">Email</label>
	<input type="text" name="email">
	<br><br>
	<input type="submit" class="btn">
    </form>
    <!-- Form ends here -->
</div>
</div>
</body>
</html>
