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
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/mailling lists.css">
    <link rel="stylesheet" href="./styles/experience.css">
    <?php echo $this->render('views/includes/header.html',NULL,get_defined_vars(),0); ?>

</head>

<body>
    <?php if ($SESSION['Errors']): ?>
        <div class="error-box">
            <pre><?= ($SESSION['Errors']) ?></pre>
        </div>
    <?php endif; ?>
    <h1>Experience</h1>
    <form id="userinput" class="form" action="experience" method="POST">
        <ul>
            <li style="list-style-type: none;">Biography: <br> <textarea style="overflow:auto;resize:none" rows="13"
                    cols="50" name="bio"><?= ($SESSION['bio']) ?>"</textarea>
            </li>
            <li style="list-style-type: none;">
                <p>Year of experience</p>
                <?php if ($SESSION['experience'] == '0-2'): ?>
                    
                        <input type="radio" name="experience" value="0-2" required checked> 0-2<br>
                    
                    <?php else: ?>
                        <input type="radio" name="experience" value="0-2" required> 0-2<br>
                    
                <?php endif; ?>
                <?php if ($SESSION['experience'] == '2-4'): ?>
                    
                        <input type="radio" name="experience" value="2-4" required checked> 2-4<br>
                    
                    <?php else: ?>
                        <input type="radio" name="experience" value="2-4" required> 2-4<br>
                    
                <?php endif; ?>
                <?php if ($SESSION['experience'] == '4+'): ?>
                    
                        <input type="radio" name="experience" value="4+" required checked> 4+<br>
                    
                    <?php else: ?>
                        <input type="radio" name="experience" value="4+" required> 4+<br>
                    
                <?php endif; ?>
            </li>
            <li style="list-style-type: none;">
                <p>Willing to relocate</p>
                <?php if ($SESSION['relocate'] == 'yes'): ?>
                    
                        <input type="radio" name="relocate" value="yes" checked> Yes<br>
                    
                    <?php else: ?>
                        <input type="radio" name="relocate" value="yes"> Yes<br>
                    
                <?php endif; ?>
                <?php if ($SESSION['relocate'] == 'no'): ?>
                    
                        <input type="radio" name="relocate" value="no" checked> No<br>
                    
                    <?php else: ?>
                        <input type="radio" name="relocate" value="no"> No<br>
                    
                <?php endif; ?>
                <?php if ($SESSION['relocate'] == 'maybe'): ?>
                    
                        <input type="radio" name="relocate" value="maybe" checked> Maybe<br>
                    
                    <?php else: ?>
                        <input type="radio" name="relocate" value="maybe"> Maybe<br>
                    
                <?php endif; ?>
            </li>
            <li style="list-style-type: none;">Github link: <input type="text" name="github"
                    value="<?= ($SESSION['github']) ?>">
            </li>
        </ul>
        <button class="button" role="button">NEXT</button>
    </form>

</body>

</html>