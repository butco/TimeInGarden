<?php include "includes/header.php";?>

<div class="container-fluid">
    <div class="col-lg-6 col-md-8 col-sm-10 m-auto">
        <div class="row">
            <div class="card card-about">
                <div class="card-title">
                    About this web app
                </div>
                <div class="card-body">
                    <div class="text">
                        <p>This web application counts the time spent working in the garden.</p>
                        <p>The <strong><em>START</em></strong> button - inserts into the database the date and time
                            when
                            you start working in the garden. Also it will display the start time on the screen.
                            After
                            pressing the START button it will appear the STOP and RESET buttons.</p>
                        <p>The <strong><em>STOP</em></strong> button - inserts into the database the date and time
                            when
                            you stop working in the garden. The app will automatically calculate how much time
                            you've
                            spent
                            in the garden and it will be displayed on the screen.</p>
                        <p>The <strong><em>RESET</em></strong> button - deletes the last row from the database.
                            Pressing
                            this button is available only after
                            pressing START and that means you've changed your mind about starting to work in the
                            garden.
                            This functionality is used when you want to postpone the start time.</p>
                        <p>At this moment the app is developed to be used only by <strong><em>one user</em></strong>,
                            but it's very easy to <strong><em>extend</em></strong>
                            the functionality to more than one user.</p>
                        <p><strong>TO DO: </strong>display the data from the database as reports (7 Days, 30
                            Days).</p>
                    </div>
                    <div class="used-technologies">
                        <p><strong>Used technologies:</strong></p>
                        <p>PHP (OOP, PDO), MySQL, HTML, CSS, Bootstrap</p>
                    </div>
                    <div class="icons">
                        <a href="http://butcosoft.com/apps/TimeInGarden/" title="See Project">
                            <i class="fas fa-arrow-circle-right fa-3x"></i>
                        </a>
                        <a href="https://github.com/butco/TimeInGarden" title="Github" target="_blank"><i
                                class="fab fa-github fa-3x"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php";?>