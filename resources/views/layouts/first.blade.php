<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software-TechSolut</title>

    <style>
      .table {
    margin-top: 20px; 
    min-width: 700px;
}

.table-responsive {
    overflow-x: auto;
}

.table th, .table td {
    text-align: center;
    vertical-align: middle;
}

.btn-primary {
    background-color: #5f249f !important; 
    border: 2px solid #ddd !important; 
    border-radius: 10px !important; 
    transition: background-color 0.3s ease !important; /* Smooth transition for hover effect */
}
.btn-primary:hover {
    background-color:rgb(47, 16, 79) !important; 
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
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
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
            <a href="{{ route('software.alphabetically', $letter) }}" class="text-center" style="color:white; ">{{ $letter }}</a>
        @endforeach
    </div>
    
            </div>
        </div>
        <div class="col py-3">
            
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                  </li>
                  <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                  </li> -->
                </ul>
                <form class="form-inline my-2 my-lg-0">
                  <input id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
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