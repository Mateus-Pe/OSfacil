# Requisitos do Sistema OSFacil

## 📋 Sumário
- [1. Introdução](#1-introdução)
- [2. Requisitos Funcionais](#2-requisitos-funcionais)
- [3. Requisitos Não Funcionais](#3-requisitos-não-funcionais)
- [4. Regras de Negócio](#4-regras-de-negócio)

---

## 1. Introdução

O **OSFacil** é um sistema de gestão de ordens de serviço desenvolvido para facilitar o controle e acompanhamento de serviços de conserto de aparelhos, clientes e vendedores/atendentes.

### 1.1 Objetivo
Fornecer uma solução simples e eficiente para gerenciar ordens de serviço, desde o cadastro de clientes e vendedores até a emissão de relatórios em PDF.

### 1.2 Escopo
O sistema abrange:
- Gestão de clientes
- Gestão de vendedores/atendentes
- Gestão de ordens de serviço
- Geração de relatórios em PDF

---

## 2. Requisitos Funcionais

Os requisitos funcionais descrevem as funcionalidades que o sistema deve oferecer.

### 2.1 Gestão de Clientes

#### RF01 - Cadastrar Cliente
**Descrição:** O sistema deve permitir o cadastro de novos clientes.

**Dados obrigatórios:**
- Nome do cliente
- Telefone

**Dados opcionais:**
- E-mail
- Endereço
- Observações

**Critérios de aceite:**
- O sistema deve validar que o nome e telefone não estejam vazios
- Os dados devem ser salvos no banco de dados SQLite
- Deve registrar a data/hora de criação automaticamente

---

#### RF02 - Listar Clientes
**Descrição:** O sistema deve exibir uma lista com todos os clientes cadastrados.

**Critérios de aceite:**
- Deve exibir todos os clientes cadastrados
- Os dados devem ser ordenados pela data de cadastro (mais recente primeiro)

---

#### RF03 - Excluir Cliente
**Descrição:** O sistema deve permitir a exclusão de um cliente.

**Critérios de aceite:**
- O sistema deve validar se existem ordens de serviço vinculadas ao cliente
- Se existirem OS vinculadas, a exclusão deve ser bloqueada e uma mensagem de erro deve ser exibida
- Se não houver OS vinculadas, o cliente deve ser removido permanentemente do banco de dados
- Deve solicitar confirmação antes de excluir
- Deve exibir mensagem de sucesso ou erro após a operação

---

### 2.2 Gestão de Vendedores

#### RF04 - Cadastrar Vendedor
**Descrição:** O sistema deve permitir o cadastro de vendedores/atendentes.

**Dados obrigatórios:**
- Nome do vendedor
- Telefone
- CPF
- Data de admissão

**Dados opcionais:**
- E-mail
- Observações

**Critérios de aceite:**
- O sistema deve validar que todos os campos obrigatórios estejam preenchidos
- Deve registrar data/hora de criação e atualização automaticamente

---

#### RF05 - Listar Vendedores
**Descrição:** O sistema deve exibir uma lista com todos os vendedores cadastrados.

**Critérios de aceite:**
- Deve exibir todos os vendedores cadastrados
- Os dados devem incluir nome, telefone, e-mail e CPF

---

#### RF06 - Excluir Vendedor
**Descrição:** O sistema deve permitir a exclusão de um vendedor.

**Critérios de aceite:**
- O sistema deve validar se existem ordens de serviço vinculadas ao vendedor
- Se existirem OS vinculadas, a exclusão deve ser bloqueada e uma mensagem de erro deve ser exibida
- Se não houver OS vinculadas, o vendedor deve ser removido permanentemente do banco de dados
- Deve solicitar confirmação antes de excluir
- Deve exibir mensagem de sucesso ou erro após a operação

---

### 2.3 Gestão de Ordens de Serviço

#### RF07 - Criar Ordem de Serviço
**Descrição:** O sistema deve permitir a criação de uma nova ordem de serviço.

**Dados obrigatórios:**
- Cliente (selecionado da lista de clientes cadastrados)
- Vendedor (selecionado da lista de vendedores cadastrados)
- Contato
- Aparelho
- Problema relatado
- Status
- Valor
- Data de entrada

**Dados opcionais:**
- Serviço a ser realizado
- Data de saída

**Critérios de aceite:**
- Deve existir pelo menos um cliente cadastrado
- Deve existir pelo menos um vendedor cadastrado
- Todos os campos obrigatórios devem ser validados
- A data de criação deve ser registrada automaticamente

---

#### RF08 - Listar Ordens de Serviço
**Descrição:** O sistema deve exibir uma lista com todas as ordens de serviço cadastradas.

**Critérios de aceite:**
- Deve exibir: ID, nome do cliente, nome do vendedor, aparelho e status
- As ordens devem ser listadas da mais recente para a mais antiga

---

#### RF09 - Exportar OS para PDF
**Descrição:** O sistema deve permitir exportar uma ordem de serviço específica em formato PDF.

**Critérios de aceite:**
- O PDF deve conter todos os dados da OS
- Deve incluir informações do cliente
- Deve incluir informações do vendedor
- O arquivo deve ser gerado e disponibilizado para download

---

#### RF10 - Excluir Ordem de Serviço
**Descrição:** O sistema deve permitir a exclusão de uma ordem de serviço.

**Critérios de aceite:**
- A OS deve ser removida permanentemente do banco de dados
- Deve solicitar confirmação antes de excluir

---

## 3. Requisitos Não Funcionais

Os requisitos não funcionais descrevem as características de qualidade do sistema.

### 3.1 Usabilidade

#### RNF01 - Interface Intuitiva
**Descrição:** O sistema deve possuir interface simples e intuitiva.

**Critérios:**
- Design responsivo utilizando Tailwind CSS
- Navegação clara entre as funcionalidades
- Feedback visual para ações do usuário

---

#### RNF02 - Acessibilidade
**Descrição:** O sistema deve ser acessível via navegador web.

**Critérios:**
- Compatível com navegadores modernos (Chrome, Firefox, Edge, Safari)
- Interface responsiva para diferentes tamanhos de tela

---

### 3.2 Desempenho

#### RNF03 - Tempo de Resposta
**Descrição:** O sistema deve responder rapidamente às ações do usuário.

**Critérios:**
- Tempo de carregamento de páginas inferior a 2 segundos
- Operações de CRUD devem ser executadas em menos de 1 segundo

---

#### RNF04 - Capacidade
**Descrição:** O sistema deve suportar volume adequado de dados.

**Critérios:**
- Suportar até 10.000 ordens de serviço sem degradação de performance
- Suportar múltiplas consultas simultâneas

---

### 3.3 Confiabilidade

#### RNF05 - Integridade de Dados
**Descrição:** O sistema deve garantir a integridade dos dados armazenados.

**Critérios:**
- Utilização de banco de dados relacional SQLite
- Validação de dados antes de persistir
- Registro de timestamps em todas as operações

---

#### RNF06 - Recuperação de Erros
**Descrição:** O sistema deve tratar erros de forma adequada.

**Critérios:**
- Mensagens de erro claras e informativas
- Não expor informações técnicas sensíveis ao usuário
- Log de erros para análise posterior

---

### 3.4 Segurança

#### RNF07 - Validação de Entrada
**Descrição:** O sistema deve validar todos os dados de entrada.

**Critérios:**
- Validação de campos obrigatórios
- Validação de formato de dados (email, CPF, datas)
- Proteção contra injeção de SQL

---

### 3.5 Manutenibilidade

#### RNF08 - Arquitetura MVC
**Descrição:** O sistema deve seguir o padrão arquitetural MVC.

**Critérios:**
- Separação clara entre Model, View e Controller
- Código organizado e modular
- Facilidade para adicionar novas funcionalidades

---

#### RNF09 - Documentação
**Descrição:** O sistema deve possuir documentação adequada.

**Critérios:**
- Diagramas UML (casos de uso, banco de dados)
- Documentação de requisitos
- README com instruções de instalação e uso

---

### 3.6 Tecnologia

#### RNF10 - Stack Tecnológica
**Descrição:** O sistema deve utilizar tecnologias modernas e confiáveis.

**Tecnologias utilizadas:**
- **Framework:** Leaf MVC v4 + Leaf v4 (PHP)
- **Template Engine:** Blade
- **Banco de Dados:** SQLite
- **CSS Framework:** Tailwind CSS
- **Geração de PDF:** DomPDF
- **Gerenciador de Dependências:** Composer

---

## 4. Regras de Negócio

### RN01 - Dependência de Cliente e Vendedor
Para criar uma ordem de serviço, é obrigatório ter pelo menos um cliente e um vendedor cadastrados no sistema.

### RN02 - Informações da OS
Uma ordem de serviço deve conter informações sobre o aparelho a ser consertado, o problema relatado, o serviço executado e o valor cobrado.

### RN03 - Unicidade de CPF
O CPF de um vendedor deve ser único no sistema (recomendação para implementação futura).

### RN04 - Restrição de Exclusão por Integridade Referencial
Não é permitido excluir clientes ou vendedores que possuam ordens de serviço vinculadas. O sistema valida essa condição e impede a exclusão, exibindo mensagem de erro ao usuário.

### RN05 - Exclusão de Registros
A exclusão de clientes, vendedores ou ordens de serviço é permanente e não pode ser desfeita (recomenda-se implementar exclusão lógica no futuro).

### RN06 - Formato de Datas
Todas as datas devem seguir o formato ISO 8601 (YYYY-MM-DD) para garantir consistência.

### RN07 - Registro de Timestamps
Todos os registros devem ter data/hora de criação. Registros que sofrem alterações devem ter também data/hora de atualização.

---

## 📝 Notas Adicionais

### Melhorias Futuras Sugeridas
1. **Autenticação e Autorização:** Implementar sistema de login com diferentes níveis de acesso
2. **Histórico de Alterações:** Registrar alterações nas OS para auditoria
3. **Notificações:** Enviar notificações por e-mail/SMS sobre status de OS
4. **Dashboard:** Criar dashboard com estatísticas e métricas
5. **Busca e Filtros:** Implementar busca avançada e filtros nas listagens
6. **Backup Automatizado:** Sistema de backup automático do banco de dados
7. **API REST:** Disponibilizar API para integração com outros sistemas
8. **Exclusão Lógica:** Implementar soft delete ao invés de exclusão permanente

---

**Versão:** 1.0  
**Data:** 15/11/2025  
**Projeto:** OSFacil - Sistema de Gestão de Ordens de Serviço

