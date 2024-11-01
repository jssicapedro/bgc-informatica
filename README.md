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

## Gestão de Ficheiros e CRUD
MENU              |  CREATE             | READ                | UPDATE              | DELETE
_____________________________________________________________________________________________
CLIENTE
                  |  clienete_new       | cliente_view        | cliente_edit        |
_____________________________________________________________________________________________
EQUIPAMENTOS
                  |  equipamentos_new   | equipamentos_view   | equipamentos_edit   |
_____________________________________________________________________________________________
MARCAS E MODELOS
                  |  marcamodelos_new   | marcamodelos_view   | marcamodelos_edit   |
_____________________________________________________________________________________________
REPARACOES
                  |  reparacoes_new     | reparacoes_view     | reparacoes_edit     |
_____________________________________________________________________________________________
ORCAMENTOS
                  |  orcamentos_new     | orcamentos_view     | orcamentos_edit     |
_____________________________________________________________________________________________
ENCOMENDAS
                  |  encomendas_new     | encomendas_view     | encomendas_edit     |
_____________________________________________________________________________________________
DIVIDAS
                  |  dividas_new        | dividas_view        | dividas_edit        |
_____________________________________________________________________________________________
SERVICOS
                  |  servicos_new       | servicos_view       | servicos_edit       |
_____________________________________________________________________________________________
TECNICOS
                  |  tecnicos_new       | tecnicos_view       | tecnicos_edit       |
_____________________________________________________________________________________________