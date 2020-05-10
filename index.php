<?php

require "config/init.php";

$user_id = 1;

function hoursandmins($time, $format = '%02d:%02d')
{
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}

if (isset($_POST["btnStart"])) {
    if ($timespent->Start($user_id)) {
        header("location:index.php");
    }
}
if (isset($_POST["btnStop"])) {
    if ($timespent->Stop($user_id)) {
        header("location:index.php");
    }
}

if (isset($_POST["btnReset"])) {
    if ($timespent->Reset($user_id)) {
        header("location:index.php");
    }
}

?>
<?php include "includes/header.php";?>

<div class="container-fluid">
    <div class="col-lg-4 col-md-8 col-sm-10 m-auto">
        <div class="row">
            <div class="card">
                <div class="card-title">
                    Time in the Garden
                </div>
                <div class="card-body">
                    <form action="index.php" method="POST">
                        <?php if (!$timespent->GetTodaysRecord()): ?>
                        <?php if ($timespent->GetTodaysMinutes() !== 0): ?>
                        <div class="alert alert-success" role="alert">
                            <strong><?php echo hoursandmins($timespent->GetTodaysMinutes(), '%02d Hours and %02d Minutes'); ?></strong>
                        </div>
                        <?php endif;?>
                        <button type="submit" class="btn btn-success buttons" name="btnStart">START</button>
                        <?php else: ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo "Start time at: <strong>" . $timespent->GetStartTime() . "</strong>"; ?>
                        </div>
                        <button type="submit" class="btn btn-danger buttons" name="btnStop">STOP</button>
                        <button type="submit" class="btn btn-warning buttons" name="btnReset">RESET</button>
                        <?php endif;?>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php";?>