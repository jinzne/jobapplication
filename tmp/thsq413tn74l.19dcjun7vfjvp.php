<!-- Giang Nguyen
    Date: 05/06/2023
    File name: personal-info.html
    Personal information page for job application
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Online Application</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/personal-info.css">
    <?php echo $this->render('views/includes/header.html',NULL,get_defined_vars(),0); ?>
</head>

<body>
    <?php if ($SESSION['Errors']): ?>
        <div class="error-box">
            <pre><?= ($SESSION['Errors']) ?></pre>
        </div>
    <?php endif; ?>
<div id="svg_wrap"></div>
    <h1>Personal Information </h1>
<form action="personal-info" method="POST">
    <section>
        <input type="text" placeholder="Firstname" name="fname" value="<?= ($SESSION['fname']) ?>" required/>
        <input type="text" placeholder="Lastname" name="lname" value="<?= ($SESSION['lname']) ?>" required/>
        <input type="text" placeholder="State" name="state" value="<?= ($SESSION['state']) ?>" />
    </section>
    <section>
        <p>Contact information</p>
        <input type="text" placeholder="Email address" name="email" value="<?= ($SESSION['email']) ?>" required/>
        <input type="text" placeholder="Phone: 0123456789" name="phone" value="<?= ($SESSION['phone']) ?>" required/>
        <input type="text" placeholder="Mobile: 0123456789" name="mobile" value="<?= ($SESSION['mobile']) ?>" />
    </section>
    <button class="button" >NEXT</button>
</form>
</body>

</html>