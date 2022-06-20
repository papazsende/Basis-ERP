<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


</head>
<body>

<div id="mainframe">
    <div class="logoframe"><img src="img/istech.png" width="100%"/> </div>
    <div style="width: 80%; margin: 0 auto; text-align: center">
    <form action="login.php" class="form-group" style="margin-top: 30px; margin-bottom: 30px" method="POST">
        <div class="form-group form-group-lg">
            <div class="col-sm-12">
                <input type="text" class="form-control" id="kadi" placeholder="Kullanici Adi" name="kadi">
            </div>
        </div>
        <div class="form-group form-group-lg">
            <div class="col-sm-12">
                <input type="password" class="form-control" id="sifre" placeholder="Sifre" name="sifre">
            </div>
        </div>

        <div class="form-group form-group-lg">
            <div class="col-sm-12" style="margin-top: 7px">
                <button class="btn btn-block btn-success btn-lg" type="submit" value="Giris">Giris</button>
            </div>
        </div>
    </form>
    </div>
    <br>
    <div class="creditsframe">
        <img src="img/credit.png" width="50%" />
    </div>
</div>
</body>
</html>