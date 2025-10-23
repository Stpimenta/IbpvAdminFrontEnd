# IBPV - Nova Versão (PHP)

## 🧭 Proposta
Refazer o **IBPV Front-end**, originalmente desenvolvido em **Blazor**, utilizando **PHP** por motivos de **performance e estabilidade**

O objetivo é ter uma aplicação **leve, responsiva, documentada e bem estruturada**, mantendo toda a lógica de negócio existente na **API .NET**.

---

## ⚙️ Stack Principal
- **PHP 8.2**
- **Slim Framework 4** — roteamento e estrutura MVC
- **League/Plates** — engine de templates (layouts, temas e componentes)
- **Bootstrap 5** *(uso moderado, apenas onde for essencial)*
- **JavaScript ES6 puro** — interações, modais e comportamento dinâmico

---

## 🧩 Funcionalidades Principais

- [] Tela de login e autenticação  
    - [X] Tela de login UI 
    - [ ] Lógica de controle de sessão, token e estado do user.

- [X] Layout
    - [X] Navbar  fluida e responsiva para mobile e desktop
    - [X] Header polido com logotipo  + acesso ao perfil

- [ ] CRUD de membros  
- [ ] CRUD de gastos  
- [ ] CRUD de contribuições  
- [ ] CRUD de caixa  
- [ ] Relatórios e bloqueio de período financeiro  

---

## 🎯 Objetivos Técnicos
- Código limpo, organizado e documentado  
- Uso consistente de **models** e **camada de dados**  
- Tratamento adequado de erros e mensagens ao usuário  
- Implementação de **níveis de permissão** (usuário, admin, etc.)  
- Design responsivo e leve  
- Facilidade de manutenção e expansão futura  

---

## 🔄 Planejamento
O projeto será desenvolvido por etapas curtas e incrementais, com foco em:
1. Estrutura inicial e autenticação  
2. Layout base e navegação  
3. Módulos (membros, gastos, contribuições, caixa)  
4. Relatórios e travamento de período  
5. Refino visual e documentação  

---

## 🖥️ Ambiente de Desenvolvimento
- PHP 8.2+
- Composer
- Slim Framework
- Plates Template Engine
- Servidor Apache ou Nginx (Raspberry Pi)

---

## 🧑‍💻 Autor
**Sergio Pimenta** — Projeto voluntário e de aprimoramento técnico.
