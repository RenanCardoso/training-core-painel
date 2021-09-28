# Training Core - Plataforma Web
<h3>Trabalho de Conclusão de Curso<br>
Aluno: Renan Cardoso<br>
8° Semestre do curso de Ciência da Computação da UniFaccamp 
</h3> 

Plataforma utilizada para visualização, cadastro, atualização e remoção de alunos, instrutores, planos, aparelhos,
ficha de treinos, exercícios e avaliação médica dos alunos e vínculo dos exercícios para com as fichas de treinos dos alunos.
Também sendo a ferramenta utilizada para disponibilização das webservices para o aplicativo móvel  de acompanhamento
e gerenciamento de treino dos alunos.

Desenvolvimento de um Sistema Integrado e Apoiado por
Aplicativo Móvel para Acompanhamento e Gerenciamento de
Treino de Academia.

Resumo. Este trabalho propõe o desenvolvimento de um sistema integrado e apoiado por aplicativo móvel para que alunos de academia e praticante de musculação possam de forma fácil e intuitiva não somente verificar qual é o seu treino do dia ou da semana, mas que possam também aprender mais sobre as suas atividades e ter um melhor acompanhamento dos seus instrutores, para que junto com o apoio de relatórios e outras ferramentas consigam extrair o máximo de cada pessoa, visando diminuir também o problema de acompanhamento específico para cada aluno.

<h3>Instalação</h3> 

# 1. clone o repositório
$ git clone https://github.com/RenanCardoso/training-core-painel my-project

# 2. vá para o diretório do aplicativo
$ cd my-project

# 3. instalar dependências do aplicativo
$ composer install

# 4. instalar dependências do aplicativo
$ npm install

# 5.1. Instalar PostgreSQL

# 5.2. Criar usuário

$ sudo -u postgres createuser --interactive
enter name of role to add: laravel
shall the new role be a superuser (y/n) n
shall the new role be allowed to create database (y/n) n
shall the new role be allowed to create more new roles (y/n) n
Set user password

$ sudo -u postgres psql
postgres= ALTER USER laravel WITH ENCRYPTED PASSWORD 'password';
postgres= \q
Create database
$ sudo -u postgres createdb laravel

# 5.3. Criar senha para o usuário
$ sudo -u postgres psql
postgres= ALTER USER laravel WITH ENCRYPTED PASSWORD 'password';
postgres= \q

# 5.4. Criar banco de dados
$ sudo -u postgres createdb laravel

# 5.5. Copie o arquivo ".env.example" e altere seu nome para ".env". Em seguida, no arquivo ".env" substitua esta configuração do banco de dados:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
To this:

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=password

# 6. Definir APP_URL
Se a url do seu projeto se parece com: example.com/sub-folder Então vá para my-project / .env E modifique esta linha:

APP_URL =
Para fazer com que fique assim:

APP_URL = http://example.com/sub-folder

<h5>7. Próxima etapa</h5> 

# no diretório do seu aplicativo
# gerar APP_KEY de laravel
$ php artisan key:generate

# 8. executar migration e seed do banco de dados 
$ php artisan migrate:refresh --seed

# 9. generate mixing
$ npm run dev

# 10. and repeat generate mixing
$ npm run dev

<h5>Uso</h5> 
# iniciar servidor local
$ php artisan serve
