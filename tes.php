<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
</head>

<body>

<form id="reg-form" autocomplete="off" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="control-label" for="usrnm">Username</label>
        <input type="text" name="usrnm" class="form-control" id="usrnm" placeholder="Masukkan Username" required>
        <span id="result"> </span>
    </div>

    <div class="form-group">
        <label class="control-label" for="pass">Password</label>
        <input type="password" name="pass" class="form-control" id="pass" placeholder="Masukkan Password" required>
    </div>

    <div class="form-group">
        <label class="control-label" for="nmfull">Nama Lengkap</label>
        <input type="text" name="nmfull" class="form-control" id="nmfull" placeholder="Masukkan Nama Lengkap" required>
    </div>

    <div class="form-group">
        <label class="control-label" for="level">Level</label>
        <select class="form-control" name="level" id="level">
            <option value="User">User</option>
            <option value="Admin">Admin</option>
        </select>
    </div>
    </div>

    <div class="modal-footer">
        <button type="reset" class="btn btn-danger">Reset</button>
        <input type="submit" class="btn btn-primary" name="tambah" value="Simpan">
    </div>
</form>

<script src="assets/vendor/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function ()
    {
        $("#usrnm").keyup(function ()
        {
            var usrnm = $(this).val();

            if (usrnm.length > 3)
            {
                $("#result").html('checking...');

                $.post("config/valid_username.php", $("#reg-form").serialize())
                    .done(function (data)
                    {
                        $("#result").html(data);
                    });

                $.ajax({

                    type: 'POST',
                    url: 'config/valid_username.php',
                    data: $(this).serialize(),
                    success: function (data)
                    {
                        $("#result").html(data);
                    }
                });
                return false;

            }
            else
            {
                $("#result").html('');
            }
        });

    });
</script>

</body>
</html>
