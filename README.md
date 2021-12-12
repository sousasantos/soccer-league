# Guia Utilização

## ficheiro .env
```
cp .env.example .env

php artisan key:generate
```

## credenciais API
colocar credenciais API no ficheiro **.env**

```
SOCCER_API_URL=
SOCCER_API_KEY=
```

## Migrações - Seeder
Correr o comando para criar a Base de Dados
```
sail artisan migrate
```

Correr o seeder inicial (este seeder irá carregar a base de dados com as ligas e as "seasons" disponiveis)
```
sail artisan db:seed LeagueAndSeasonSeeder
```

## Falhas
- Caso se selecione uma equipa em temporadas antigas a equipa poderá estar desatualizada.
- falta tratar os possiveis erros provenientes da API
- Falta ter a possibilidade de fazer update aos registos
- Falta tratar das ligas quando sao grupos...
- criar testes
- refactor ao código
