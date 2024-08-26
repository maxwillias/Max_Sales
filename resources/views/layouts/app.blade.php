<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="">Max Sales</a>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="{{ route('products.index') }}">Produtos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('categories.index') }}">Categorias</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('sales.index') }}">Vendas</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

        <div class="container mt-4">
            @yield('content')
        </div>
    </div>
</body>
</html>
