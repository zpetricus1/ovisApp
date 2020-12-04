<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OVIS d.o.o. | Novi račun</title>
    <link rel="stylesheet" href="/css/app.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <div class="noviRacunForma">
        <form action="{{url('noviracun')}}" method="post">
        {{csrf_field()}}
            <div class="form-group">
                <label for="fullname">Ime i prezime primatelja</label>
                <input name="fullname" type="text" class="form-control" id="fullname" placeholder="Unesite ime i prezime primatelja!">
            </div>
            <div class="form-group">
                <label for="address">Adresa primatelja</label>
                <input name="address" type="text" class="form-control" id="address" placeholder="Unesite adresu primatelja!">
            </div>
            <div class="form-group">
                <label for="oib">OIB primatelja</label>
                <input name="oib" type="text" class="form-control" id="oib" placeholder="Unesite OIB primatelja!">
            </div>
            <div class="form-group">
                <label for="billing_date">Unesite datum valute</label>
                <input name="billing_date" type="date" class="form-control" id="billing_date" placeholder="Unesite datum valute!">
            </div>


            <button type="submit" class="btn btn-primary">Izdaj!</button>
            <a href="racuni"><button type="button" class="btn btn-success">Vidi izdane račune</button></a>
        </form><br><br>     
    </div>

</div>
    
</body>
</html>