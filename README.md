# Sistema de Gerenciamento de Tarefas

Este projeto faz parte de um processo seletivo para um desenvolvedor web iniciante. O objetivo é criar um sistema básico de gerenciamento de tarefas utilizando as tecnologias HTML, PHP e MySQL, integrado ao framework Laravel.

## Descrição do Projeto

O sistema permitirá que os usuários criem, visualizem, editem e excluam tarefas, com uma interface simples em HTML. O backend será responsável por gerenciar as operações de CRUD (Create, Read, Update, Delete) para essas tarefas.

## Requisitos Técnicos

### 1. Front-end (HTML/CSS)
- **Listagem de Tarefas**: Exibir todas as tarefas cadastradas.
- **Formulário de Tarefas**: Permitir a criação e edição de tarefas.
- **Estilo Básico**: Aplicar um CSS básico para a interface.

### 2. Back-end (PHP e Laravel)
- **CRUD**: Implementar funcionalidades de criação, leitura, atualização e exclusão de tarefas.
- **Validação de Dados**: Implementar validações mínimas para os campos do formulário.
- **Boas Práticas**: Organizar o código seguindo as melhores práticas.

### 3. Banco de Dados (MySQL)
- **Estrutura da Tabela**: Tabela `tarefas` com os seguintes campos:
  - `id`: Chave primária
  - `titulo`: Título da tarefa
  - `descricao`: Descrição da tarefa
  - `status`: Status da tarefa (`pendente` ou `concluída`)
  - `created_at`: Data de criação
  - `updated_at`: Data de atualização

## Funcionalidades do Sistema

1. **Listar Tarefas**: Exibir todas as tarefas cadastradas.
2. **Adicionar Tarefa**: Permitir a adição de novas tarefas.
3. **Editar Tarefa**: Permitir a edição de tarefas existentes.
4. **Marcar como Concluída**: Permitir a mudança do status da tarefa.
5. **Excluir Tarefa**: Permitir a exclusão de tarefas.

## Estrutura do Projeto

- **/resources/views/**: Arquivos blade para páginas HTML.
- **/app/Http/Controllers/**: Arquivos PHP com o controller principal `TarefaController`.
- **/database/migrations**: Script SQL para a criação da tabela `tarefas`.

## Instruções de Instalação

1. **Clone o Repositório**:
   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
   ```
2. **Configuração do Banco de Dados:**
- Crie um banco de dados no MySQL.
- Execute as migrations. Edite a migration que cria a tabela de tarefas para adicionar os campos necessários ou crie uma para adicionálos posteriormente.

3. **Configuração do Projeto:**
- Atualize o arquivo `.env` as credenciais do seu banco de dados.

4. **Execução:**
- Acesse a aplicação via navegador no endereço configurado no seu ambiente local, por exemplo: `http://localhost/seu-projeto`.

## Requisitos de Entrega

1. **Commits:**
- O candidato deve realizar commits frequentes durante o desenvolvimento do projeto, com mensagens descritivas que indiquem as alterações realizadas.

2. **Repositório no GitHub:**
- O projeto deve ser entregue em um repositório público no GitHub.
- O link do repositório deve ser enviado para avaliação.

3. **Prazo de Entrega:**
- O candidato deverá concluir e enviar o desafio em até 4 dias corridos, contados a partir do seu recebimento.

## Critérios de Avaliação: 
- **Organização e Estrutura do Código:** Boa organização dos arquivos e clareza no código.
- **Funcionalidade:** O sistema deve atender a todos os requisitos funcionais especificados.
- **Validações:** O sistema deve lidar corretamente com entradas inválidas ou inesperadas.
- **Uso do Git:** Frequência e qualidade dos commits no repositório.

## Bônus

Você pode se destacar no processo seletivo ao implementar funcionalidades adicionais e utilizar ferramentas que melhorem a interface e a usabilidade do sistema. Aqui estão algumas sugestões:

1. **Utilização de Plugins CSS**: 
   - Implementar o design do sistema utilizando frameworks CSS como Bootstrap 4 ou 5.

2. **jQuery**:
   - Utilizar jQuery para adicionar interatividade e manipulação de DOM de forma simples e eficiente.

3. **Laravel Livewire**:
   - Implementar interatividade no sistema utilizando Laravel Livewire, tornando a aplicação mais dinâmica sem a necessidade de muito JavaScript.

4. **Funcionalidades Adicionais**:
   - Implementar filtros ou buscas nas tarefas.
   - Adicionar uma funcionalidade de "tarefas prioritárias".
   - Criar uma funcionalidade de categorias de tarefas.
   - Implementar autenticação para permitir que diferentes usuários gerenciem suas próprias tarefas.

Essas adições não são obrigatórias, entretando demonstrarão habilidades extras e iniciativa, o que será valorizado durante a avaliação.
