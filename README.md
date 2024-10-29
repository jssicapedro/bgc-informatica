## Passos para teres o projeto na tua máquina
1. Deves ter instalado o composer e o laragon (ou outro)
1. Abrir o projeto no teu GitHub
2. Usar a Branch com o teu nome (se não fores fazer alterações no código usa a main para visualizares o resultado final)
3. Abrir o projeto num editor de texto

##
4. Executa o comando dentro da pasta do projeto
 <pre>composer install</pre>

## Passos para teres a Base de Dados
5. Abrir o ficheiro .env.example e alterar todas as informações sobre a base de dados. Depois guarda este ficheiro como .env
6. De seguida deves executar o comando 
  <pre>php artisan key:generate</pre>
5. No terminal executa os comandos:
 <pre>php artisan migrate:fresh
php artisan db:seed </pre>
7. Para que tudo funcione deves executar o comando 
 <pre>npm run dev </pre> 
 <small>(este comando deve ser usado sempre que se for visualizar/editar o projeto)</small>