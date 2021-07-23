<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title><?= SITENAME ?> - <?= $data['title'] ?></title>
</head>
<body>
    <h1><?= $data['title'] ?></h1>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $data['user']->user_id ?></td>
                <td><?= $data['user']->user_name ?></td>
                <td><?= $data['user']->user_email ?></td>
                <td><?= $data['user']->password ?></td>
                <td><?= $data['user']->created_at ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>