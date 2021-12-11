# Guia Utilização

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