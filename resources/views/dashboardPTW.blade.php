<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard PTW - Wanderlust</title>
    <link rel="stylesheet" href="{{ asset('css/dashboardPTW.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div> <div class="profile">
                    <img src="{{ asset($owner['photo']) }}" alt="Owner Photo">
                    <h3>{{ $owner['name'] }}</h3>
                    <p>{{ $owner['title'] }}</p>
                </div>
                <nav>
                    <a href="{{ route('dashboard.ptw') }}" class="active">Dashboard</a>
                    <a href="#">Revenue</a>
                    <a href="{{ route('properties.ptw') }}">Properties</a>
                    <a href="#">Tickets</a>
                    <a href="#">Help Centre</a>
                </nav>
            </div>
            <a href="#" class="logout">Log Out</a>
        </aside>

        <main class="content">
            <header class="navbar">
                <h2>Welcome back to dashboard!</h2>
                <div class="navbar-logos">
                    <img src="{{ asset('images/logo-wanderlust-white.png') }}" alt="Wanderlust Logo">
                    <img src="{{ asset('images/logo-kemenpar.png') }}" alt="Logo Partner">
                </div>
            </header>

            <section class="main-section">
                <div class="cards">
                    <div class="card">
                        <h4>Properties</h4>
                        <p class="number">{{ $summary['properties'] }}</p>
                    </div>

                    <div class="card">
                        <h4>Total Tickets Sold</h4>
                        <p class="number">{{ $summary['tickets_sold'] }}</p>
                    </div>

                    <div class="card">
                        <h4>Revenue</h4>
                        <p class="number">Rp. {{ $summary['revenue'] == 0 ? '-' : number_format($summary['revenue']) }}</p>
                    </div>

                    <div class="card">
                        <h4>Visitors</h4>
                        <p class="number">{{ $summary['visitors'] }} visitors</p>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>