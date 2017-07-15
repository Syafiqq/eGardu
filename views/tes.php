<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="assets/vendor/metisMenu/metisMenu.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">

    <!-- Custom Datepicker -->
    <link href="assets/bootstrap-datepicker/dcalendar.picker.css" rel="stylesheet" type="text/css">
</head>

<body>


<form id="form" class="form-inline">

    <div class="form-group">
        <label for="tglawal">Start Date:</label>
        <input type="text" class="form-control" id="tglawal" name="tglawal">
    </div>
    <div class="form-group">
        <label for="tglakhir">End Date:</label>
        <input type="text" class="form-control" id="tglakhir" name="tglakhir">
    </div>

    <button type="submit" class="btn btn-default">Filter</button>

</form>

</body>
<script src="assets/vendor/jquery/jquery-1.11.3.min.js"></script>
<script src="assets/bootstrap-datepicker/dcalendar.picker.js"></script>
<script type="text/javascript">
    $('#tglawal').dcalendar();
</script>
</html>
