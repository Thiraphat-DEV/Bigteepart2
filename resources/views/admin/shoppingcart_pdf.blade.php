<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<title>PDF ShoppingCart Page </title>
</head>

<body>
    <div class="container">
      <h1 class="text-center">Pdf Order ShoppingCart</h1>
        <table class="table bordered">
            <thead style="border: 2px solid #000; font-size:30px;">
                <tr style="margin: 1rem">
                                    
                    <th scope="col">UserId</th>
                    <th scope="col">ProductId</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Checkout</th>
                </tr>
            </thead>
            <tbody style="border: 2px solid #40ad; font-size:30px;text-align:center">
              @foreach ($products as $product)

                <tr style="margin: 1rem">
                    <th scope="row"> {{ $product->user_id }}</th>
                    <td scope="row"> {{ $product->product_id }}</td>
                    <td scope="row">{{ $product->quantity }}</td>
                    <td scope="row" style="text-align: right">{{ $product->updated_at }}</td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
