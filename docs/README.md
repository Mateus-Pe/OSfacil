# Documentação do Projeto OSFacil

Este diretório contém toda a documentação do sistema OSFacil, incluindo diagramas e especificações de requisitos.

## 📚 Arquivos Disponíveis

### 1. `requisitos.md`
Documento completo contendo todos os requisitos funcionais e não funcionais do sistema, além das regras de negócio.

**Conteúdo:**
- Requisitos Funcionais (RF01 a RF10)
- Requisitos Não Funcionais (RNF01 a RNF10)
- Regras de Negócio
- Sugestões de melhorias futuras

### 2. `diagrama-casos-de-uso.puml`
Diagrama de casos de uso mostrando todas as funcionalidades do sistema e as interações do usuário com o sistema.

**Principais funcionalidades:**
- Gestão de Clientes (cadastrar, listar, excluir)
- Gestão de Vendedores (cadastrar, listar, excluir)
- Gestão de Ordens de Serviço (criar, listar, exportar PDF, excluir)

### 3. `diagrama-banco-dados.puml`
Diagrama relacional do banco de dados mostrando todas as tabelas e seus relacionamentos.

**Tabelas:**
- **clientes**: informações dos clientes
- **vendedores**: informações dos vendedores/atendentes
- **os**: ordens de serviço (relaciona clientes e vendedores)

### 4. `diagrama-sequencia.puml`
Diagramas de sequência mostrando os fluxos de interação do sistema.

**Fluxos documentados:**
- **Criar Ordem de Serviço**: Fluxo completo desde o acesso ao formulário até a criação da OS
- **Exportar OS para PDF**: Processo de geração e download do PDF
- **Cadastrar Cliente**: Fluxo de cadastro de novo cliente
- **Listar e Excluir OS**: Visualização da lista e exclusão de ordens de serviço

## Como Visualizar os Diagramas

### Opção 1: Online (PlantText)
1. Acesse: https://www.planttext.com/
2. Copie o conteúdo do arquivo `.puml`
3. Cole no editor e clique em "Refresh"

### Opção 2: Visual Studio Code
1. Instale a extensão "PlantUML"
2. Instale o Java (necessário para o PlantUML)
3. Abra o arquivo `.puml`
4. Pressione `Alt + D` para visualizar o diagrama

### Opção 3: Exportar como Imagem
Use o site PlantText ou a extensão do VS Code para exportar os diagramas como PNG, SVG ou PDF.

### Opção 4: PlantUML Local
```bash
# Instalar PlantUML
java -jar plantuml.jar diagrama-casos-de-uso.puml
java -jar plantuml.jar diagrama-banco-dados.puml
```

## Estrutura do Banco de Dados

```
clientes (1) ----< (N) os
vendedores (1) ----< (N) os
```

Cada Ordem de Serviço (OS) está vinculada a:
- 1 Cliente
- 1 Vendedor

## Tecnologias

- **PlantUML**: Linguagem de modelagem de diagramas UML
- **Banco de Dados**: SQLite
- **Framework**: Leaf MVC v4

---
*Gerado para o projeto OSFacil - Sistema de Gestão de Ordens de Serviço*

