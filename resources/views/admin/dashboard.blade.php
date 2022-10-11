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
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }} {{ auth()->user()->name }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Hi Admin: {{ auth()->user()->name }}
                    </div>
                </div>
            </div>
            @if (Session::has('product_delete'))
                <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3" role="alert">
                    <div>{{ Session::get('product_delete') }} </div>
                </div>
            @endif
            <div class="flex flex-col" id="content">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="card-header text-center text-danger fs-1 alert-info">
                            <a href="/admin/add-product" role="button"
                                class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-md leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out mb-3 ">Add
                                New Whisky</a> 
                                   <a href="{{route('product-pdf', ['download' => 'pdf'])}}" role="button"
                                class="inline-block px-6 py-2.5 bg-yellow-500 text-red font-medium text-md leading-tight uppercase rounded shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-purple-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out mb-3 ">
                            Generate Product PDF    
                            </a>
                            <a href="{{route('barchart')}}" role="button"
                                class="inline-block px-6 py-2.5 bg-cyan-500 text-yellow font-medium text-md leading-tight uppercase rounded shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-purple-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out mb-3 ">
                            Watch BarChart   
                            </a>
                        </div>
                    
                        <div class="overflow-hidden">
                            <table class="min-w-full ">
                                <thead
                                    class="border-b px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out ">
                                    <tr>
                                        <th scope="col"
                                            class="text-sm font-medium text-white-900 px-6 py-4 text-left">
                                            Product Id
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-white-900 px-6 py-4 text-left">
                                            Product Name
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-white-900 px-6 py-4 text-left">
                                            Product Image
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-white-900 px-6 py-4 text-left">
                                            Product Price
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-white-900 px-6 py-4 text-left">
                                            Product Detail
                                        </th>

                                        <th scope="col"
                                            class="text-sm font-medium text-white-900 px-6 py-4 text-left">
                                            Action For Admin
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr class="border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $product->id }}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $product->name }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                                                <img src="{{ asset('images') }}/{{ $product->image }}"
                                                    style="max-width: 150px">
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $product->price }}
                                            </td>

                                            <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                                                <p class="text-ellipsis overflow-hidden"> {{ $product->description }}
                                                </p>
                                            </td>
                                            <td class="text-md text-gray-900  font-light px-6 py-4 whitespace-nowrap">
                                                <a role="button" href="/admin/edit-product/{{ $product->id }}"
                                                    class="inline-block px-6 py-2.5 bg-yellow-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out">Edit</a>

                                                <a role="button" href="/admin/delete-product/{{ $product->id }}"
                                                    class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                                    id="deleteData">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- {{ $messages->links('pagination::bootstrap4') }} --}}
    </x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelector('#content').addEventListener('click', function(e) {

            if (e.target.matches('#deleteData')) {
                Swal.fire({
                    title: 'Do you want to Deleted?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Deleted',
                    denyButtonText: `No`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        Swal.fire('Deleted', '', 'danger')
                    } else if (result.isDenied) {
                        Swal.fire('No', '', 'warning')
                    }
                });
            }
        })
    </script>

</body>

</html>
