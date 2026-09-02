<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <title>Login - {{ config('app.name', 'Sistema BI') }}</title>
    
    <!-- Tabler CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css">
</head>
<body class="d-flex flex-column bg-slate-900">
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="#" class="navbar-brand navbar-brand-autodark">
                    <span class="h1 font-weight-bold text-primary">Sistema BI</span>
                </a>
            </div>

            <!-- Status de Sessão -->
            @if (session('status'))
                <div class="alert alert-success mb-3" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form class="card card-md" action="{{ route('login') }}" method="POST" autocomplete="off">
                @csrf
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Acesse sua conta</h2>
                    
                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Endereço de E-mail</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="seu@email.com" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Senha -->
                    <div class="mb-2">
                        <label class="form-label">
                            Senha
                            @if (Route::has('password.request'))
                                <span class="form-label-description">
                                    <a href="{{ route('password.request') }}">Esqueci minha senha</a>
                                </span>
                            @endif
                        </label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Sua senha" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Lembrar-me -->
                    <div class="mb-2">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" name="remember" />
                            <span class="form-check-label">Lembrar neste navegador</span>
                        </label>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabler JS -->
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>
</body>
</html>