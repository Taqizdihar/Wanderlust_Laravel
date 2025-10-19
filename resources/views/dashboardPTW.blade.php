<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard PTW</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="profile">
                <img src="{{ asset($owner['photo']) }}" alt="Owner Photo">
                <h3>{{ $owner['name'] }}</h3>
                <p>{{ $owner['title'] }}</p>
            </div>
            <hr>
            <nav>
                <a href="{{ route('dashboard.ptw') }}">Dashboard</a>
                <a href="#">Revenue</a>
                <a href="#">Properties</a>
                <a href="#">Tickets</a>
                <a href="#">Help Centre</a>
            </nav>
            <a href="#" class="logout">Log Out</a>
        </aside>

        <!-- Main Content -->
        <main class="content">
            <header class="navbar">
                <h2>Welcome back to dashboard!</h2>
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
