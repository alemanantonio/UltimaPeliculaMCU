<?php
 const API_URL = "https://whenisthenextmcufilm.com/api";
 #inicializar curl 
 $ch = curl_init(API_URL);
 #Recibir peticion sin mostrar nada en pantalla 
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 #Guardar resultado
 $res = curl_exec($ch);
 $data = json_decode($res ,true);
 curl_close($ch);

 

?>

<head>
    <title>La proxima pelicula del MCU</title>
    <meta name="description" content="La Proxima Pelicula de Marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
    :root {
        --primary: linear-gradient(90deg, #e62429, #ff4a4a);
        --secondary: #202020;
        --accent: #f7f7f7;
        --text: #333;
        --light: #ffffff;
        --dark: #111;
        --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        --transition: all 0.3s ease;
        --border-radius: 16px;
    }

    @media (prefers-color-scheme: dark) {
        :root {
            --primary: linear-gradient(90deg, #e62429, #ff4a4a);
            --secondary: #f0f0f0;
            --accent: #202020;
            --text: #f0f0f0;
            --light: #111;
            --dark: #fff;
        }
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
        line-height: 1.6;
        color: var(--text);
        background-color: var(--light);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        transition: var(--transition);
    }

    main {
        max-width: 800px;
        width: 100%;
        background: var(--accent);
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: var(--transition);
        border: 1px solid rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .movie-poster-container {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 2rem 0;
    }

    .movie-poster {
        max-width: 80%;
        height: auto;
        border-radius: 12px;
        box-shadow: var(--shadow);
        transition: var(--transition);
        border: 4px solid var(--light);
    }

    .movie-poster:hover {
        transform: scale(1.03);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
    }

    .movie-info {
        padding: 2rem;
        text-align: center;
        width: 100%;
    }

    .movie-title {
        color: var(--primary);
        font-size: 2.4rem;
        margin-bottom: 1rem;
        font-weight: 700;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        transition: var(--transition);
    }

    .movie-title:hover {
        color: #ff4a4a;
        transform: scale(1.03);
    }

    .movie-release {
        font-size: 1.2rem;
        margin-bottom: 1.5rem;
        color: var(--secondary);
        font-style: italic;
    }

    .countdown {
        background: var(--primary);
        color: var(--light);
        padding: 0.8rem 1.5rem;
        border-radius: 50px;
        font-weight: bold;
        display: inline-block;
        margin-top: 1rem;
        font-size: 1.2rem;
        box-shadow: var(--shadow);
        transition: var(--transition);
    }

    .countdown:hover {
        background: #ff4a4a;
        transform: scale(1.05);
    }

    .marvel-logo {
        width: 180px;
        margin-bottom: 2rem;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        transition: var(--transition);
    }

    .marvel-logo:hover {
        transform: scale(1.1);
    }

    footer {
        margin-top: 2rem;
        text-align: center;
        font-size: 0.9rem;
        color: var(--secondary);
    }

    footer a {
        color: var(--primary);
        text-decoration: none;
        font-weight: bold;
        transition: var(--transition);
    }

    footer a:hover {
        color: #ff4a4a;
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .movie-title {
            font-size: 1.8rem;
        }

        .movie-poster {
            max-width: 90%;
        }

        .countdown {
            font-size: 1rem;
            padding: 0.5rem 1rem;
        }
    }
    </style>
</head>

<body>
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/Marvel_Logo.svg/2560px-Marvel_Logo.svg.png" alt="Marvel Logo" class="marvel-logo">
    
    <main>
        <section class="movie-poster-container">
            <img src="<?= $data["poster_url"]; ?>" alt="<?= $data["title"]; ?> Poster" class="movie-poster">
        </section>
        
        <div class="movie-info">
            <h1 class="movie-title"><?= $data["title"]; ?></h1>
            <p class="movie-release">Fecha de Estreno: <?= $data["release_date"]; ?></p>
            <div class="countdown">Se estrena en <?= $data["days_until"]; ?> días</div>
        </div>
    </main>
    
    <footer>
        Próxima película del Universo Cinemático Marvel &copy; <?= date('Y'); ?>
    </footer>
</body>