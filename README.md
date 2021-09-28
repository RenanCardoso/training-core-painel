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

<h3> 1. clone o repositório </h3>
$ git clone https://github.com/RenanCardoso/training-core-painel my-project

<h3> 2. vá para o diretório do aplicativo </h3>
$ cd my-project

<h3> 3. instalar dependências do aplicativo </h3>
$ composer install

<h3> 4. instalar dependências do aplicativo </h3>
$ npm install

<h3> 5.1. Instalar PostgreSQL </h3>

<h3> 5.2. Criar usuário </h3>

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

<h3> 5.3. Criar senha para o usuário </h3>
$ sudo -u postgres psql
postgres= ALTER USER laravel WITH ENCRYPTED PASSWORD 'password';
postgres= \q

<h3> 5.4. Criar banco de dados </h3>
$ sudo -u postgres createdb laravel

<h3> 5.5. Copie o arquivo ".env.example" e altere seu nome para ".env". Em seguida, no arquivo ".env" substitua esta configuração do banco de dados: </h3>
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

<h3> 6. Definir APP_URL
Se a url do seu projeto se parece com: example.com/sub-folder Então vá para my-project / .env E modifique esta linha: 
 </h3>
APP_URL =
Para fazer com que fique assim:

APP_URL = http://example.com/sub-folder

<h5>7. Próxima etapa</h5> 

<h3> no diretório do seu aplicativo </h3>
<h3> gerar APP_KEY de laravel </h3>
$ php artisan key:generate

<h3> 8. executar migration e seed do banco de dados  </h3>
$ php artisan migrate:refresh --seed

<h3> 9. generate mixing </h3>
$ npm run dev

<h3> 10. and repeat generate mixing </h3>
$ npm run dev

<h5>Uso</h5> 
# iniciar servidor local <br>
$ php artisan serve

<p> Abra seu navegador com o endereço:  </p>
<p> localhost: 8000 </p>

<p> Clique em "Login" no menu da barra lateral e faça login com as credenciais: </p>
<p> E-mail: admin@admin.com </p>
<p> Senha: password </p>

<p> Este usuário tem funções: </p>
<p> usuário e administrador </p>