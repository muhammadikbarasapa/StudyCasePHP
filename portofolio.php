<!DOCTYPE html>
<html>

<head>
    <title>Portofolio Saya</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
            background-color: #444;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            display: inline-block;
        }

        nav ul li a:hover {
            background-color: #555;
        }

        section {
            margin: 20px 0;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
        }

        .project {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px 0;
            background-color: #fff;
        }

        .project img {
            max-width: 100px;
            height: auto;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
        }

        div {
            margin-bottom: 10px;
        }

        button {
            padding: 10px 15px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>

<body>

    <header>
        <h1>Portofolio Saya</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#about">Tentang Saya</a></li>
            <li><a href="#projects">Proyek</a></li>
            <li><a href="#contact">Kontak</a></li>
        </ul>
    </nav>
    <section id="about">
        <h2>Tentang Saya</h2>
        <img src="{{ asset('images/profile.jpg') }}" alt="Profile">
        <p>Saya menyukai badminton sejak kecil. Selain itu, saya bisa memasukkan foto-foto dari turnamen, pelatihan,
            atau momen berkesan lainnya.</p>
    </section>
    <section id="projects">
    <h2>Proyek</h2>
    @foreach($projects as $project)
    <div class="project">
        <h3>{{ $project->title }}</h3>
        <p>{{ $project->description }}</p>
        <img src="{{ asset('storage/images/' . $project->image) }}" alt="{{ $project->title }}">
    </div>
    @endforeach
    <a href="/projects/create">Tambah Proyek Baru</a>
</section>

    <section id="contact">
        <h2>Kontak</h2>
        <a href="https://www.instagram.com/muhammadikbarasapa/">Instagram</a> <br>
        <a href="https://wa.me/6281517031754">081517031754</a> <br>
        <a href="https://www.tiktok.com/ikbarasapa">Tiktok</a> <br>
    </section>
    
    <footer>
        <p>&copy; 2024 Portofolio Saya</p>
    </footer>

</body>

</html>
