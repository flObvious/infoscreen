<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Activity</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/infoscreen.css">
</head>
<body>
    <form method="post" name="textfield" action="activity.php" >
        <div class="col-lg-12" id="activity-title-div">
            <input type="text" name="title" id="activity-title" maxlength="33">
        </div>

        <div class="col-lg-12" id="activity-upload">
            <input type="file" name="img" id="imgInp">
        </div>

        <div class="col-lg-12" id="activity-text-div">
            <textarea type="text" name="text" id="activity-text" maxlength="500" ></textarea>
            <div class="result">0 chars</div>
        </div>
        <div class="col-lg-12" id="activity-submit">
            <!--<button type="button" class="btn btn-primary btn-lg">Submit</button>-->
            <input type="submit" name="Submit" value="Submit" />
        </div>
    </form>

<script src="../js/jquery-3.1.1.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/page.js"></script>
</body>
</html>