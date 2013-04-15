<html>
<head>
    <title>Users</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row-fluid">
        <div class="page-header"><h2>Day One</h2></div>
        <?php if ($this->session->flashdata('message')): ?>
            <div class="alert">
              <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>Hey there!</strong> <?=$this->session->flashdata('message')?>
            </div>
        <?php endif ?>

        <table class='table'>
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user):?>
                <tr>
                    <td><?=$user->id;?></td>
                    <td><?=$user->name;?></td>
                    <td><?=$user->email;?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
