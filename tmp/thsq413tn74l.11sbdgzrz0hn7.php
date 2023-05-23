<!-- Giang Nguyen
    Date: 05/06/2023
    File name: job-mailling.html
    Job openings and mailing lists page for job application
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Job Openings Mailling Lists</title>
    <link rel="stylesheet" href="https://gnguyen.greenriverdev.com/Sdev328/jobapplication/styles/styles.css">
    <link rel="stylesheet" href="https://gnguyen.greenriverdev.com/Sdev328/jobapplication/styles/mailling lists.css">
    <?php echo $this->render('views/includes/header.html',NULL,get_defined_vars(),0); ?>
</head>

<body>
<h1>Job Openings Mailling Lists</h1>
<form action="summary" method="post">
    <ul>
        <li>
            <p>Sofware Development Jobs</p>
        </li>
        <li>
            <input type="checkbox" name="check-box[]" value="JavaScript" /> <span>JavaScript</span>
        </li>
        <li>
            <input type="checkbox" name="check-box[]" value="HTML"/> <span>HTML</span>
        </li>
        <li>
            <input type="checkbox" name="check-box[]" value="PHP"/> <span>PHP</span>
        </li>
        <li>
            <input type="checkbox" name="check-box[]" value="CSS"/> <span>CSS</span>
        </li>
        <li>
            <input type="checkbox" name="check-box[]" value="Java"/> <span>Java</span>
        </li>
        <li>
            <input type="checkbox" name="check-box[]" value="ReactJS"/> <span>ReactJS</span>
        </li>
        <li>
            <input type="checkbox" name="check-box[]" value="Python"/> <span>Python</span>
        </li>
        <li>
            <input type="checkbox" name="check-box[]" value="NodeJs"/> <span>NodeJs</span>
        </li>
    </ul>
    <ul>
        <li>
            <p>Industry Verticals</p>
        </li>
        <li>
            <input type="checkbox" name="check-box[]" value="SaaS"/> <span>SaaS</span>
        </li>
        <li>
            <input type="checkbox" name="check-box[]" value="Industrial tech"/> <span>Industrial tech</span>
        </li>
        <li>
            <input type="checkbox" name="check-box[]" value="Health Tech"/> <span>Health Tech</span>
        </li>
        <li>
            <input type="checkbox" name="check-box[]" value="Cybersecurity"/> <span>Cybersecurity</span>
        </li>
        <li>
            <input type="checkbox" name="check-box[]" value="Ag tech"/> <span>Ag tech</span>
        </li>
        <li>
            <input type="checkbox" name="check-box[]" value="HR tech"/> <span>HR tech</span>
        </li>
    </ul>
    </div>
    <button class="button" >NEXT</button>
</form>
</body>

</html>