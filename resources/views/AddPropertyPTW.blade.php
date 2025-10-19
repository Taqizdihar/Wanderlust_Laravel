<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Property</title>
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
            <a href="{{ route('properties.ptw') }}" class="active">Properties</a>
            <a href="#">Tickets</a>
            <a href="#">Help Centre</a>
        </nav>
        <a href="#" class="logout">Log Out</a>
    </aside>

    <!-- Main Content -->
    <main class="content">
        <header class="navbar">
            <h2>Welcome back to dashboard!</h2>
            <div class="logo-right">
                <img src="{{ asset('images/logo-wanderlust.png') }}" alt="Logo" height="40">
                <img src="{{ asset('images/logo-ministry.png') }}" alt="Logo" height="40">
            </div>
        </header>

        <!-- Form Section -->
        <section class="form-section">
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
                            <input type="time" name="open_time" required>
                        </div>
                        <div class="input-group">
                            <label>Close Time</label>
                            <input type="time" name="close_time" required>
                        </div>
                    </div>

                    <div class="input-group full">
                        <label>Property Description</label>
                        <textarea name="description" rows="4" placeholder="Your Property Description" required></textarea>
                    </div>

                    <div class="input-group full">
                        <label>Upload Image</label>
                        <input type="file" name="image" required>
                    </div>

                    <button type="submit" class="save-btn">Save</button>
                </div>
            </form>
        </section>
    </main>
</div>

<style>
/* Form Section */
.form-section {
    padding: 40px;
}
.form-title {
    text-align: center;
    color: #006F80;
    margin-bottom: 25px;
}
.property-form {
    background-color: #4DB5C3;
    padding: 25px 30px;
    border-radius: 10px;
    color: white;
    width: 80%;
    margin: 0 auto;
}
.form-group {
    display: flex;
    flex-direction: column;
    gap: 20px;
}
.form-row {
    display: flex;
    justify-content: space-between;
    gap: 15px;
}
.input-group {
    display: flex;
    flex-direction: column;
    flex: 1;
}
.input-group.full {
    width: 100%;
}
.input-group label {
    font-weight: bold;
    margin-bottom: 5px;
}
.input-group input,
.input-group select,
.input-group textarea {
    padding: 10px;
    border-radius: 6px;
    border: none;
    outline: none;
    font-size: 14px;
}
.save-btn {
    background-color: #3183FF;
    color: white;
    font-weight: bold;
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    display: block;
    margin: 20px auto 0;
}
.save-btn:hover {
    background-color: #2568D0;
}
</style>
</body>
</html>
