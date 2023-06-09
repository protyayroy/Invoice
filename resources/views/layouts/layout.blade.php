<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="{{ asset('asset') }}/css/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/css/style.css">



</head>

<body>

    <section>
        <div id="top-header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown {{ $active == 'invoice' ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Invoice
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('create-invoice') }}">Create Invoice</a>
                                <a class="dropdown-item" href="{{ route('invoice-list') }}">Invoice List </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown {{ $active == 'purchase' ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Purchase
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('create-purchase') }}">Create Purchase</a>
                                <a class="dropdown-item" href="{{ route('purchase-list') }}">Purchase List </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown {{ $active == 'daily_entry' ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Daily Entry
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('add-edit-daily_entry') }}"> Create Entry</a>
                                <a class="dropdown-item" href="{{ route('daily_entry-list') }}">Entry List</a>
                            </div>
                        </li>
                        <li class="nav-item {{ $active == 'customer' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('customer-list') }}">Customer <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{ $active == 'supplier' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('supplier-list') }}">Supplier <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{ $active == 'bank' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('bank-list') }}">Bank <span
                                    class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item {{ $active == 'balancesheet' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('download-balance-sheet-pdf') }}">Balance Sheet <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown {{ $active == 'profile' ? 'active' : '' }}"
                            style="margin-left: 200px">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->name }} <i class="fa-solid fa-gear ml-1"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">Change Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                            </div>
                        </li>
                        <div class="clr"></div>
                    </ul>
                </div>
            </nav>

        </div>

        @yield('content')

    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>

    <script src="{{ asset('asset') }}/js/jquery-ui.min.js"></script>

    <script src="{{ asset('asset') }}/js/script.js"></script>


</body>

</html>
