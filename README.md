# Sistema de Gestão Acadêmica (Laravel)

Projeto feito para a lista de atividades práticas de Laravel da disciplina, com orientação do professor Dionatan Inhoato Markiu. É um sistema de gerenciamento acadêmico simples, cobrindo desde rotas básicas até autenticação, permissões e segurança.

## Autores

Nelson Elielton Bolkota

## Tecnologias

- Laravel
- PostgreSQL (via pgAdmin)
- Laravel Breeze (autenticação)
- Blade + Tailwind CSS (vem com o Breeze)

## Organização do repositório

Cada tema da lista tem sua própria branch, e cada atividade (ATV) virou um commit separado. Ficou assim:

**tema-rotas**
- ATV 1: rotas simples (`/sobre`, `/alunos`, `/contato`)
- ATV 2: rotas parametrizadas (`/produto/{id}`, `/categoria/{id}`, `/usuario/{id}`)

**tema-controllers**
- ATV 3: controller de recursos `AlunoController`
- ATV 4: as 7 rotas básicas de CRUD no controller

**tema-views**
- ATV 5: estrutura de pastas das views de alunos
- ATV 6: arquivos Blade principais do CRUD de alunos

**tema-blade**
- ATV 7: layout base em `layouts/app.blade.php`
- ATV 8: páginas Blade (home, index, show, create)
- ATV 9: diretivas Blade (`@extends`, `@section`, `@include`, `@if`, `@foreach`)
- Desafio: menu de navegação compartilhado via `@include`

**tema-models-eloquent**
- ATV 10: Model `Aluno` e migration
- ATV 11: consultas Eloquent personalizadas

**tema-seeders**
- ATV 12: `AlunoSeeder` populando o banco com 10 alunos de teste

**tema-crud**
- ATV 13: lógica funcional do CRUD no controller

**tema-forms-requests**
- ATV 14: formulário HTML de cadastro
- ATV 15: validações com Form Request
- Desafio: mensagens de erro de validação em português

**tema-relacionamentos**
- ATV 16: Model `Curso` e migração do relacionamento 1-para-muitos
- ATV 17: chave estrangeira na tabela de alunos
- Desafio: view listando alunos agrupados por curso

**tema-autenticacao**
- ATV 18: integração do Laravel Breeze
- ATV 19: relação entre `User` e `Aluno`
- ATV 20: coluna `role` na tabela `users`

**tema-middleware**
- ATV 21: middleware restringindo `/admin` e `/professor`

**tema-policies**
- ATV 22: `AlunoPolicy` protegendo as ações do CRUD
- ATV 23: regras por perfil (admin cadastra/exclui, professor edita)

## Rodando o projeto localmente

Clone o repositório:

```bash
git clone <URL_DO_SEU_REPOSITORIO>
cd <NOME_DA_PASTA_DO_PROJETO>
```

Instale as dependências:

```bash
composer install
npm install
```

Copie o `.env.example` para `.env` e configure o PostgreSQL:

```bash
cp .env.example .env
```

No `.env`, ajuste:

```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nome_do_seu_banco
DB_USERNAME=postgres
DB_PASSWORD=sua_senha_do_pgadmin
```

Crie o banco correspondente no pgAdmin antes de seguir.

Gere a chave da aplicação:

```bash
php artisan key:generate
```

Rode as migrações e popule o banco:

```bash
php artisan migrate --seed
```

Compile os assets e suba o servidor:

```bash
npm run dev
```

Em outro terminal:

```bash
php artisan serve
```

Acesse em `http://localhost:8000`.