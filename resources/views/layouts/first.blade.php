<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software-TechSolut</title>

    <style>
          
      .container-fluid {
    display: flex;
    flex-wrap: nowrap;
}

.container-fluid .row {
    flex: 1; 
    margin-left: 100;
    min-height: 100vh;
}

.form-group{
  min-width: 600px;
  overflow-x: auto;
}
        
      .table {
    margin-top: 20px; 
    min-width: 700px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
}
.table thead {
    background-color: #5f249f;
    color: white;
}

.table-responsive {
    overflow-x: auto;
}

.table th, .table td {
    text-align: center;
    vertical-align: middle;
    padding: 12px;
}

.table tbody tr:nth-child(even) {
    background-color: #f9f9f9; 
}

.table tbody tr:hover {
    background-color: #ececec; /* Row highlight on hover */
}
.alert {
    margin-top: 20px;
    border-radius: 10px;
}
.btn-primary {
    background-color: #5f249f !important; 
    border: 2px solid #ddd !important; 
    border-radius: 10px !important; 
    padding: 8px 12px;
    font-size: 14px;
    font-weight: bold;
    transition: background-color 0.3s ease, transform 0.2s ease !important; 
}
.btn-primary:hover {
    background-color:rgb(47, 16, 79) !important;
    transform: translateY(-2px); 
}

.btn-danger {
    background-color: #dc3545;
    border: none !important;
    border-radius: 8px !important;
    padding: 8px 12px;
    font-size: 14px;
    font-weight: bold;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-danger:hover {
    background-color: #c82333;
    transform: translateY(-2px);
}
.view-all-btn {
    background-color: #5f249f;
    color: white;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    padding: 10px 20px;
    font-size: 16px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.view-all-btn:hover {
    background-color: rgb(47, 16, 79);
    color:white;
    transform: translateY(-2px);
}

.sansserif {
  font-family: Verdana, Arial, Helvetica, sans-serif;
}

.monospace {
  font-family: "Lucida Console", Courier, monospace;
}

.cursive {
  font-family: cursive;
}
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  </head>
<body>
    @yield('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <strong class="fs-5 d-none d-sm-inline">{{ \Carbon\Carbon::now()->format('l, F j, Y') }}
</strong>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="/" class="nav-link align-middle px-0">
                            <i class="fas fa-home"></i>  
                            <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('software.index') }}" class="nav-link align-middle px-0">
                            <i class="fas fa-laptop-code"></i> 
                            <span class="badge badge-primary ml-2">{{ $softwareCount }}</span>
                            <span class="ms-1 d-none d-sm-inline">Software</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tech.index') }}" class="nav-link align-middle px-0">
                            <i class="fas fa-cogs"></i> 
                            <span class="badge badge-success ml-2">{{ $techSolCount }}</span>
                            <span class="ms-1 d-none d-sm-inline">Tech Solutions</span>
                        </a>
                    </li>
                   
                </ul>
                
                  <!-- Alphabet Links -->
    <div style="display: grid; grid-template-columns: repeat(10, auto); gap: 5px; max-width: 100%; ">
        @foreach (range('A', 'Z') as $letter)
            <a href="{{ route('alphabet.search', $letter) }}" class="text-center" style="color:white; ">{{ $letter }}</a>
        @endforeach
    </div>
    
            </div>
        </div>
        <div class="col py-3">
            
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#e6e6e6; margin-bottom:25px;">
            <strong class="navbar-brand" style=" color: #5f249f; font-size:230%">End User Computing Process</strong>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                
                </ul>
                <form action="{{ route('software.search') }}" method="GET" class="form-inline my-2 my-lg-0">
                  <input id="search" name="keyword" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
              </div>
            </nav>
            @yield('contenu')
            @yield('cont')
    </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>