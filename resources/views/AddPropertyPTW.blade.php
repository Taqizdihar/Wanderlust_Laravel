<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Property</title>
    <link rel="stylesheet" href="{{ asset('css/addPropertyPTW.css') }}">
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
        <a href="{{ route('logout') }}" class="logout" onclick="return confirm('Are you sure you want to log out?')">Log Out</a>
    </aside>

    <main class="content">
        <header class="navbar">
            <h2>Welcome back to dashboard!</h2>
            <div class="navbar-logos">
                <img src="{{ asset('images/Logos/Wanderlust Logo Circle.png') }}" alt="Wanderlust Logo">
                <img src="{{ asset('images/Logos/kemenpar.png') }}" alt="Logo Partner">
            </div>
        </header>

        <section class="form-section">
            <a href="javascript:history.back()" class="back-btn">&larr; Go Back</a>
            <h2 class="form-title">Add New Property</h2>

            <form action="{{ route('store.property.ptw') }}" method="POST" enctype="multipart/form-data" class="property-form">
                @csrf
                <div class="form-group">
                    <div class="form-row">
                        <div class="input-group">
                            <label>Property Name</label>
                            <input type="text" name="name" placeholder="Your Property Name" required>
                        </div>
                        <div class="input-group">
                            <label>Category</label>
                            <select name="category" required>
                                <option value="">Category</option>
                                <option value="Nature">Nature</option>
                                <option value="Historical">Historical</option>
                                <option value="Adventure">Adventure</option>
                            </select>
                        </div>
                    </div>

                    <div class="input-group full">
                        <label>Property Address</label>
                        <input type="text" name="address" placeholder="Your Property Address" required>
                    </div>

                    <div class="form-row">
                        <div class="input-group">
                            <label>Open Time</label>
                            <input type="time" name="start_hour" required>
                        </div>
                        <div class="input-group">
                            <label>Close Time</label>
                            <input type="time" name="end_hour" required>
                        </div>
                    </div>

                    <div class="input-group full">
                        <label>Property Description</label>
                        <textarea name="description" rows="4" placeholder="Your Property Description" required></textarea>
                    </div>

                    <div class="input-group full">
                        <label>Upload Image</label>
                        <input type="file" name="image">
                    </div>

                    <button type="submit" class="save-btn">Save</button>
                </div>
            </form>
        </section>
    </main>
</div>

</body>
</html>