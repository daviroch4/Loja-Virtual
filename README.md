# 🛒 Loja Virtual

Projeto acadêmico desenvolvido na disciplina **Tópicos Especiais em Desenvolvimento de Software I** do curso de Análise e Desenvolvimento de Sistemas.

Aplicação web de loja virtual construída com **PHP + Laravel**, com cadastro de produtos, autenticação de usuários e vitrine pública de produtos.

---

## 🚀 Tecnologias

- [PHP 8.2](https://www.php.net/)
- [Laravel 12](https://laravel.com/)
- [MySQL](https://www.mysql.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [Alpine.js](https://alpinejs.dev/)
- [Vite](https://vitejs.dev/)
- [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze) — autenticação
- [DomPDF](https://github.com/barryvdh/laravel-dompdf) — geração de relatórios em PDF

---

## ✅ Funcionalidades

- Vitrine pública com listagem de produtos (preço e estoque)
- Filtro de produtos por tipo e busca por nome
- Cadastro, edição e exclusão de produtos (autenticado)
- Upload de imagem para produtos
- Cadastro de tipos de produto
- Relatório de produtos exportável em PDF
- Sistema completo de autenticação (login, registro, perfil)

---

## ⚙️ Como rodar localmente

### Pré-requisitos

- PHP 8.2+
- Composer
- Node.js + npm
- MySQL (XAMPP ou similar)

### Passo a passo

```bash
# 1. Clone o repositório
git clone https://github.com/daviroch4/Loja-Virtual.git
cd Loja-Virtual

# 2. Instale as dependências PHP
composer install

# 3. Instale as dependências JS
npm install

# 4. Copie o arquivo de configuração
copy .env.example .env

# 5. Gere a chave da aplicação
php artisan key:generate

# 6. Configure o banco de dados no arquivo .env
# DB_DATABASE=lojavirtual
# DB_USERNAME=root
# DB_PASSWORD=

# 7. Rode as migrations
php artisan migrate

# 8. Crie o link de storage (para imagens)
php artisan storage:link

# 9. Inicie o servidor
php artisan serve

# 10. Em outro terminal, compile os assets
npm run dev
```

Acesse em: **http://127.0.0.1:8000**

---

## 📁 Estrutura principal

```
app/Http/Controllers/
├── HomeController.php       # Vitrine pública
├── ProductsController.php   # CRUD de produtos + PDF
└── TypesController.php      # Cadastro de tipos

resources/views/
├── welcome.blade.php        # Tela inicial (vitrine)
├── products/                # Views de produtos
├── types/                   # Views de tipos
└── layouts/                 # Layouts base

routes/
├── web.php                  # Rotas principais
└── auth.php                 # Rotas de autenticação
```

---

## 👤 Autor

**Davi Roch**  
Curso de Análise e Desenvolvimento de Sistemas  
Disciplina: Tópicos Especiais em Desenvolvimento de Software I