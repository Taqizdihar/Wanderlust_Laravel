<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties - Wanderlust</title>
    <link rel="stylesheet" href="{{ asset('css/propertyListPTW.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
    <aside class="sidebar">
        <div> 
            <div class="profile">
                <img src="{{ asset('images/profiles/' . $user['pp']) }}" alt="Owner Photo">
                <h3>{{ $user['name'] }}</h3>
                <p>Property Manager</p>
            </div>
            <nav>
                <a href="{{ route('dashboard.ptw') }}">Dashboard</a>
                <a href="#">Revenue</a>
                <a href="{{ route('properties.ptw') }}" class="active">Properties</a>
                <a href="#">Tickets</a>
                <a href="#">Help Centre</a>
            </nav>
        </div>
        <a href="{{ route('logout') }}" class="logout">Log Out</a>
    </aside>

    <main class="content">
        <header class="navbar">
            <h2>Welcome back to dashboard!</h2>
            <div class="navbar-logos"> 
                <img src="{{ asset('images/logo-wanderlust.png') }}" alt="Logo" height="40">
                <img src="{{ asset('images/logo-ministry.png') }}" alt="Logo" height="40">
            </div>
        </header>

        <section class="property-list">
            <div class="top-bar">
                <a href="{{ route('add.property.ptw') }}">
                    <button class="add-btn">+ Add New Property</button>
                </a>
                <input type="text" class="search-box" placeholder="Search Property...">
                <select class="category-filter">
                    <option value="">Category</option>
                    <option value="Nature">Nature</option>
                    <option value="Historical">Historical</option>
                    <option value="Adventure">Adventure</option>
                </select>
            </div>

            <div class="property-cards">
                @foreach ($properties as $property)
                    <div class="property-card">
                        <img src="{{ asset('images/Properties/' . $property['image']) }}" alt="{{ $property['name'] }}">
                        <div class="property-info">
                            <h3>{{ $property['name'] }}</h3>
                            <p>{{ $property['start_hour'] }} - {{ $property['end_hour'] }} | {{ $property['category'] }}</p>
                        </div>
                        <a href="{{ route('edit.property.ptw', $property['id']) }}">
                            <button class="action-btn">Actions</button>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
</div>

</body>
</html>