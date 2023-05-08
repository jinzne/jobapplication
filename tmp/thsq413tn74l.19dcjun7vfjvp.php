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
    <link rel="stylesheet" href="https://gnguyen.greenriverdev.com/Sdev328/jobapplication/styles/styles.css">
    <link rel="stylesheet" href="https://gnguyen.greenriverdev.com/Sdev328/jobapplication/styles/personal-info.css">
    <?php echo $this->render('views/includes/header.html',NULL,get_defined_vars(),0); ?>
</head>

<body>
<div id="svg_wrap"></div>

<h1>Personal Information</h1>
<form action="experience" method="POST">
    <section>
        <input type="text" placeholder="Firstname" name="fname" />
        <input type="text" placeholder="Lastname" name="lname" />
        <input type="text" placeholder="State" name="state" value="Washington" />
    </section>
    <section>
        <p>Contact information</p>
        <input type="text" placeholder="Email address" name="email" />
        <input type="text" placeholder="Phone" name="phone" />
        <input type="text" placeholder="Mobile" name="mobile" />
    </section>
    <button class="button" >NEXT</button>
</form>
</body>

</html>