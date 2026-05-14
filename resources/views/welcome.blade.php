<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loja Virtual</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:       #F7F5F2;
            --surface:  #FFFFFF;
            --dark:     #1A1A1A;
            --muted:    #6B6560;
            --accent:   #C8502A;
            --accent2:  #E8D5C4;
            --border:   #E2DDD8;
            --radius:   12px;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--dark);
            min-height: 100vh;
        }

        /* ── HEADER ── */
        header {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            flex-shrink: 0;
        }

        .logo-icon {
            width: 38px;
            height: 38px;
            background: var(--dark);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-icon svg { fill: var(--bg); }

        .logo-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            color: var(--dark);
            line-height: 1;
        }

        .logo-name span { color: var(--accent); }

        /* busca no header */
        .search-bar {
            flex: 1;
            max-width: 380px;
            position: relative;
        }

        .search-bar input {
            width: 100%;
            padding: 10px 16px 10px 40px;
            border: 1.5px solid var(--border);
            border-radius: 24px;
            background: var(--bg);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.875rem;
            color: var(--dark);
            outline: none;
            transition: border-color .2s;
        }

        .search-bar input:focus { border-color: var(--dark); }

        .search-bar svg {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            pointer-events: none;
        }

        .header-actions { display: flex; gap: 10px; flex-shrink: 0; }

        .btn {
            display: inline-flex;
            align-items: center;
            padding: 9px 20px;
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: all .2s;
            border: none;
        }

        .btn-outline {
            background: transparent;
            border: 1.5px solid var(--border);
            color: var(--dark);
        }
        .btn-outline:hover { border-color: var(--dark); background: var(--bg); }

        .btn-solid {
            background: var(--dark);
            color: var(--surface);
        }
        .btn-solid:hover { background: #333; }

        /* ── HERO ── */
        .hero {
            background: linear-gradient(135deg, var(--dark) 0%, #2E2A26 100%);
            color: var(--surface);
            padding: 56px 24px;
            text-align: center;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 5vw, 3.25rem);
            line-height: 1.15;
            margin-bottom: 14px;
        }

        .hero h1 em {
            font-style: normal;
            color: var(--accent2);
        }

        .hero p {
            color: rgba(255,255,255,.65);
            font-size: 1rem;
            max-width: 480px;
            margin: 0 auto;
        }

        /* ── FILTROS ── */
        .filters-wrap {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
        }

        .filters-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 14px 24px;
            display: flex;
            align-items: center;
            gap: 10px;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .filters-inner::-webkit-scrollbar { display: none; }

        .filter-label {
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--muted);
            white-space: nowrap;
            margin-right: 4px;
            flex-shrink: 0;
        }

        .filter-btn {
            display: inline-block;
            padding: 7px 18px;
            border-radius: 20px;
            border: 1.5px solid var(--border);
            background: var(--bg);
            color: var(--dark);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
            white-space: nowrap;
            transition: all .2s;
            flex-shrink: 0;
            cursor: pointer;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--dark);
            color: var(--surface);
            border-color: var(--dark);
        }

        /* ── MAIN CONTENT ── */
        .main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 36px 24px 60px;
        }

        .section-header {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--dark);
        }

        .product-count {
            font-size: 0.85rem;
            color: var(--muted);
        }

        /* ── GRID DE PRODUTOS ── */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
        }

        .product-card {
            background: var(--surface);
            border-radius: var(--radius);
            overflow: hidden;
            border: 1px solid var(--border);
            transition: transform .2s, box-shadow .2s;
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(0,0,0,.08);
        }

        .card-img {
            width: 100%;
            aspect-ratio: 4/3;
            object-fit: cover;
            background: var(--accent2);
            display: block;
        }

        .card-img-placeholder {
            width: 100%;
            aspect-ratio: 4/3;
            background: var(--accent2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-img-placeholder svg {
            opacity: .35;
            width: 48px;
            height: 48px;
        }

        .card-body {
            padding: 16px;
        }

        .card-type {
            font-size: 0.72rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: var(--accent);
            margin-bottom: 6px;
        }

        .card-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.05rem;
            line-height: 1.3;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 12px;
            border-top: 1px solid var(--border);
        }

        .card-price {
            font-size: 1.15rem;
            font-weight: 600;
            color: var(--dark);
        }

        .card-price span {
            font-size: 0.75rem;
            font-weight: 400;
            color: var(--muted);
        }

        .card-qty {
            font-size: 0.78rem;
            color: var(--muted);
            background: var(--bg);
            padding: 3px 10px;
            border-radius: 12px;
            border: 1px solid var(--border);
        }

        /* ── EMPTY STATE ── */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            color: var(--muted);
            grid-column: 1 / -1;
        }

        .empty-state svg {
            width: 64px;
            height: 64px;
            margin: 0 auto 16px;
            opacity: .3;
        }

        .empty-state h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            color: var(--dark);
            margin-bottom: 8px;
        }

        /* ── FOOTER ── */
        footer {
            background: var(--dark);
            color: rgba(255,255,255,.5);
            text-align: center;
            padding: 24px;
            font-size: 0.82rem;
        }

        footer strong { color: rgba(255,255,255,.8); }
    </style>
</head>
<body>

{{-- ── HEADER ── --}}
<header>
    <div class="header-inner">

        {{-- Logo --}}
        <a href="/" class="logo">
            <div class="logo-icon">
                <svg width="20" height="20" viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6" stroke="white" stroke-width="2" fill="none"/><path d="M16 10a4 4 0 01-8 0" fill="none" stroke="white" stroke-width="2"/></svg>
            </div>
            <span class="logo-name">Loja<span>Virtual</span></span>
        </a>

        {{-- Busca --}}
        <form class="search-bar" method="GET" action="/">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Buscar produto..."
            >
            {{-- mantém o filtro de tipo ao buscar --}}
            @if(request('type_id'))
                <input type="hidden" name="type_id" value="{{ request('type_id') }}">
            @endif
        </form>

        {{-- Ações --}}
        <div class="header-actions">
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-outline">Painel</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline">Entrar</a>
                <a href="{{ route('register') }}" class="btn btn-solid">Registrar</a>
            @endauth
        </div>

    </div>
</header>

{{-- ── HERO ── --}}
<section class="hero">
    <h1>Os melhores produtos,<br><em>direto para você.</em></h1>
    <p>Navegue pelo nosso catálogo e encontre exatamente o que precisa.</p>
</section>

{{-- ── FILTROS POR TIPO ── --}}
<div class="filters-wrap">
    <div class="filters-inner">
        <span class="filter-label">Filtrar:</span>

        <a href="{{ url('/') }}{{ request('search') ? '?search='.request('search') : '' }}"
           class="filter-btn {{ !request('type_id') ? 'active' : '' }}">
            Todos
        </a>

        @foreach($types as $type)
            <a href="?type_id={{ $type->id }}{{ request('search') ? '&search='.request('search') : '' }}"
               class="filter-btn {{ request('type_id') == $type->id ? 'active' : '' }}">
                {{ $type->name }}
            </a>
        @endforeach
    </div>
</div>

{{-- ── PRODUTOS ── --}}
<main class="main">
    <div class="section-header">
        <h2 class="section-title">
            @if(request('search'))
                Resultados para "{{ request('search') }}"
            @elseif(request('type_id'))
                {{ $types->firstWhere('id', request('type_id'))->name ?? 'Produtos' }}
            @else
                Lista de Produtos
            @endif
        </h2>
        <span class="product-count">{{ $products->count() }} {{ $products->count() == 1 ? 'produto' : 'produtos' }}</span>
    </div>

    <div class="products-grid">

        @forelse($products as $product)
        <div class="product-card">

            {{-- Imagem --}}
            @if($product->image)
                <img
                    class="card-img"
                    src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->name }}"
                    loading="lazy"
                >
            @else
                <div class="card-img-placeholder">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#1A1A1A" stroke-width="1.5">
                        <rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/>
                        <polyline points="21 15 16 10 5 21"/>
                    </svg>
                </div>
            @endif

            <div class="card-body">
                <p class="card-type">{{ $product->type->name ?? '—' }}</p>
                <h3 class="card-name">{{ $product->name }}</h3>

                @if($product->description)
                    <p style="font-size:.82rem;color:var(--muted);margin-bottom:0;
                    overflow:hidden;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;">
                        {{ $product->description }}
                    </p>
                @endif

                <div class="card-footer">
                    <div class="card-price">
                        <span>R$</span> {{ number_format($product->price, 2, ',', '.') }}
                    </div>
                    <span class="card-qty">{{ $product->quantity }} em estoque</span>
                </div>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
                <line x1="3" y1="6" x2="21" y2="6"/>
                <path d="M16 10a4 4 0 01-8 0"/>
            </svg>
            <h3>Nenhum produto encontrado</h3>
            <p>Tente ajustar o filtro ou o termo de busca.</p>
        </div>
        @endforelse

    </div>
</main>

<footer>
    <strong>Loja Virtual</strong> &mdash; Projeto acadêmico &bull; TEDS I
</footer>

</body>
</html>