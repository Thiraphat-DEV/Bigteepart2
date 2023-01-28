<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
</head>

<body>
  

    <x-app-layout>

   
        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-6">
                    <label for="name" class="form-label inline-block mb-2 text-gray-700">Product Name</label>
                    <input type="text"
                        class="form-control
          block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your food"
                        name="name" required>
                    <small id="emailHelp" class="block mt-1 text-xs text-gray-600">Please Enter Your food
                        Product.</small>
                </div>
                <div class="form-group mb-6">
                    <label for="price" class="form-label inline-block mb-2 text-gray-700">Price</label>
                    <input type="number"
                        class="form-control block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleInputPassword1" placeholder="Enter Price of food" name="price" required>
                </div>
                <div class="form-group mb-6">
                    <label for="image" class="form-label inline-block mb-2 text-gray-700">Image</label>
                    <input type="file"
                        class="form-control block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleInputPassword1" placeholder="Enter Image of food" name="image" required>
                </div>

                <div class="form-group mb-6">
                    <label for="descript" class="form-label inline-block mb-2 text-gray-700">Product Detail</label>
                    <input type="text"
                        class="form-control block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleInputPassword1" placeholder="Enter Description for food" name="descript" required>
                </div>

                <div class="form-group mb-6">
                    <button type="submit"
                        class="
        px-6
        py-2.5
        bg-blue-600
        text-green-900
        font-medium
        text-xs
        leading-tight
        uppercase
        rounded
        shadow-md
        hover:bg-yellow-700 hover:shadow-lg
        focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
        active:bg-blue-800 active:shadow-lg
        transition
        duration-150
        ease-in-out">Save
                        food</button>
                </div>
                <a role="button" href="{{ url('/admin/dashboard') }}"
                    class="
        px-6
        py-2.5
        bg-blue-600
        text-white
        font-medium
        text-xs
        leading-tight
        uppercase
        rounded
        shadow-md
        hover:bg-blue-700 hover:shadow-lg
        focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
        active:bg-blue-800 active:shadow-lg
        transition
        duration-150
        ease-in-out">Back
                    To Dashboard Admin</a>
            </form>
        </div>
    </x-app-layout>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if(Session::has('product_add'))
    <script>
        toastr.success("{!! Session::get('product_add') !!}");
    </script>
    @endif


    @if(Session::has('product_add'))
    <script>
        swal("Success For Added", "{!! Session::get('product_add') !!}", "success", {
            button: "OK",
        });
    </script>
    @endif
    <script src="https://cdn.tailwindcss.com"></script>

</body>

</html>
