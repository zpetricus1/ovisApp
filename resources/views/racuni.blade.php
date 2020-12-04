<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OVIS d.o.o. | Bills</title>
    <link rel="stylesheet" href="/css/app.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <div class="navigacija">
        
        <a class="links" href="noviracun">Izdaj novi račun</a>
    </div>
    <div class="dodajStavkuContainer">
        <div class="izdaniRacuni">
            
            <table class="table">
        
                <tr style="background: #333; color: white;">
                    <th scope="col">ID Računa</th>
                    <th scope="col">Ime i prezime primatelja</th>
                    <th scope="col">Adresa</th>
                    <th scope="col">OIB</th>
                    <th scope="col">Datum izdavanja</th>
                    <th scope="col">Datum valute</th>
                </tr>
                    
                 @foreach($bills as $bill)
                <tr>
                    <th scope="col">{{$bill['id']}}</th>
                    <th scope="col">{{$bill['fullname']}}</th>
                    <th scope="col">{{$bill['address']}}</th>
                    <th scope="col">{{$bill['oib']}}</th>
                    <th scope="col">{{$bill['bill_date']}}</th>
                    <th scope="col">{{$bill['billing_date']}}</th>
                </tr>
                @endforeach

            </table>
        </div>

        <div class="dodajStavku">
            <form action="{{url('racuni')}}" method="post">
            {{csrf_field()}}
                <div class="form-group">
                    <label for="idracun">ID Računa</label>
                    <input name="idracun" type="text" class="form-control" id="idracun" placeholder="Unesite ID računa!">
                </div>
                <div class="form-group">
                    <label for="description">Opis</label>
                    <input name="description" type="text" class="form-control" id="description" placeholder="Unesite opis stavke!">
                </div>
                <div class="form-group">
                    <label for="unit_price">Jedinična cijena</label>
                    <input name="unit_price" type="text" class="form-control" id="unit_price" placeholder="Unesite jediničnu cijenu!">
                </div>
                <div class="form-group">
                    <label for="amount">Količina</label>
                    <input name="amount" type="number" class="form-control" id="amount" placeholder="Unesite količinu!">
                </div>


                <button type="submit" class="btn btn-success" formtarget="_blank">Dodaj stavku računu!</button>

            </form><br><br>     

        </div>

    </div>

    <div class="glavniRacuni">
        <form action="{{url('racunistavka')}}" method="post">
        {{csrf_field()}}
            <div class="form-group">
                    <label for="billid">Račun id</label>
                    <input name="billid" type="text" class="form-control" id="billid" placeholder="Unesite ID računa!">
                </div>
        </select>
        <button type="submit" class="btn btn-success">Ispiši stavke računa!</button>
        <h1></h1>   
    </form>

</body>
</html>