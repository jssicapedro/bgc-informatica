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
7. No terminal executa os comandos:
 <pre>php artisan migrate:fresh
php artisan db:seed </pre>
8. Para que tudo funcione deves executar o comando 
 <pre>npm run dev </pre> 
 <small>(este comando deve ser usado sempre que se for visualizar/editar o projeto)</small>

### Caso o comando 'npm run dev' não funcione deve
<pre>npm install -g vite</pre>
<pre>npm install vite --save-dev</pre>

## Gestão de Ficheiros e CRUD
MENU              |  CREATE               | READ                  | UPDATE               | DELETE
__________________________________________________________________________________________________
CLIENTE
                  |  clienete_new ✅      | cliente_view  ✅     | cliente_edit  ✅    |
__________________________________________________________________________________________________
EQUIPAMENTOS
                  |  equipamentos_new ✅  |                       | equipamentos_edit✅ |
__________________________________________________________________________________________________
MARCAS E MODELOS
                  |  marcamodelos_new ✅  |                       | marcamodelos_edit✅ |
__________________________________________________________________________________________________
RMA
                  |  reparacoes_new  ✅   | reparacoes_view✅    | reparacoes_edit      |
__________________________________________________________________________________________________
ENCOMENDAS
                  |  encomendas_new ✅    | encomendas_view ✅    | encomendas_edit ✅  |
__________________________________________________________________________________________________
SERVICOS
                  |  servicos_new ✅      | servicos_view ✅      | servicos_edit        |
__________________________________________________________________________________________________
CATEGORIAS
                  |  categoria_new ✅     |                        | categoria_edit       |
__________________________________________________________________________________________________
TECNICOS
                  |  tecnicos_new ✅      | tecnicos_view ✅      | tecnicos_edit        |
__________________________________________________________________________________________________