<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #343a40;
        }
        .btn-primary {
            width: 100%;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }
        .error-message {
            color: #e74c3c;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="login-container">
    <form method="POST" action="{{ route('login') }}">
    @csrf
    <h2 class="text-center">Connexion</h2>
    <div class="mb-3">
        <label for="email" class="form-label">Adresse Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required>
        @error('email')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" name="remember" id="remember" class="form-check-input">
        <label class="form-check-label" for="remember">Se souvenir de moi</label>
    </div>
    <div class="d-flex justify-content-between">
        <a href="{{ route('password.request') }}" class="text-decoration-none">Mot de passe oublié ?</a>
    </div>
    <button type="submit" class="btn btn-primary mt-3 w-100">Se connecter</button>
</form>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
