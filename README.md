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

## Possiveis falhas
- de momento apenas estou a fazer o pedido dos jogadores por equipa, ignorando a data. Ou seja caso se selecione uma equipa na temporada 2018/2019 (por exemplo) a equipa poderá estar desatualizada.
- falta tratar os possiveis erros provenientes da API
- Falta ter a possibilidade de fazer update aos registos