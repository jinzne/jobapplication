<!-- Giang Nguyen
    Date: 05/06/2023
    File name: summary.html
    Summary page for job application
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Summary</title>
    <?php echo $this->render('views/includes/header.html',NULL,get_defined_vars(),0); ?>
    <link rel="stylesheet" href="https://gnguyen.greenriverdev.com/Sdev328/jobapplication/styles/styles.css">
</head>
<body>
<h1>Summary</h1>
<table>
    <tbody>
    <tr>
        <td>Name</td>
        <td><?= ($fname) ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?= ($email) ?></td>
    </tr>
    <tr>
        <td>State</td>
        <td><?= ($state) ?></td>
    </tr>
    <tr>
        <td>Phone</td>
        <td><?= ($phone) ?></td>
    </tr>
    <tr>
        <td>Github link</td>
        <td><?= ($github) ?></td>
    </tr>
    <tr>
        <td>Experience</td>
        <td><?= ($experience) ?></td>
    </tr>
    <tr>
        <td>Willing To Relocate</td>
        <td><?= ($relocate) ?></td>
    </tr>
    <tr>
        <td>Mailing Lists</td>
        <td><?= ($check_box) ?></td>
    </tr>
    <tr>
        <td>Biography</td>
        <td><?= ($bio) ?></td>
    </tbody>

</table>
</body>
</html>