<html>
<head>
    <title>Users</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Form starts here -->
    <div class="container">
<<<<<<< HEAD
	<div class="row-fluid">
	    <div class="page-header"><h2>Update User</h2></div>
    <form action='<?=site_url("users/update/{$user->id}");?>' class="form-horizontal" method="post">
    <label for="name">Name</label>
	<input type="text" class="input-large" name="name" value="<?=$user->name?>">
	<label for="email">Email</label>
	<input type="text" name="email" value="<?=$user->email?>">
	<br><br>
	<input type="submit" class="btn">
=======
        <div class="row-fluid">
            <div class="page-header"><h2>Update User</h2></div>
    <form action='<?=site_url("users/update/{$user->id}");?>' class="form-horizontal" method="post">
    <label for="name">Name</label>
        <input type="text" class="input-large" name="name" value="<?=$user->name?>">
        <label for="email">Email</label>
        <input type="text" name="email" value="<?=$user->email?>">
        <br><br>
        <input type="submit" class="btn">
>>>>>>> develop
    </form>
    <!-- Form ends here -->
</div>
</div>
</body>
</html>