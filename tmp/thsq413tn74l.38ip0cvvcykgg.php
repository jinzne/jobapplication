<!-- Giang Nguyen
    Date: 05/06/2023
    File name: experience.html
    Experience page for job application
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Experience</title>
    <link rel="stylesheet" href="https://gnguyen.greenriverdev.com/Sdev328/jobapplication/styles/styles.css">
    <link rel="stylesheet" href="https://gnguyen.greenriverdev.com/Sdev328/jobapplication/styles/mailling lists.css">
    <link rel="stylesheet" href="https://gnguyen.greenriverdev.com/Sdev328/jobapplication/styles/experience.css">
    <?php echo $this->render('views/includes/header.html',NULL,get_defined_vars(),0); ?>

</head>

<body>
<h1>Experience</h1>
<form id="userinput" class="form" action="job-mailling-lists" method="POST">
    <ul>
        <li style="list-style-type: none;">Biography: <br> <textarea style="overflow:auto;resize:none" rows="13"
                                                                     cols="50" required name="bio"></textarea>

        <li style="list-style-type: none;"> Year of experience <br> <input type="radio"
                                                                           name="experience" value="0-2"> 0-2<br>
            <input type="radio" name="experience" value="2-4"> 2-4<br>
            <input type="radio" name="experience" value="4+"> 4+<br>

        <li style="list-style-type: none;"> Willing to relocate <br>
            <input type="radio" name="relocate" value="yes"> Yes<br>
            <input type="radio" name="relocate" value="no"> No<br>
            <input type="radio" name="relocate" value="maybe"> Maybe<br>

        <li style="list-style-type: none;">Github link: <input type="text" name="github" required>
        </li>
    </ul>
    <button class="button" role="button">NEXT</button>

</form>

</body>

</html>