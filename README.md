# Sistema BI - Plataforma de Business Intelligence & Gestão de Acessos

Aplicação web corporativa desenvolvida em **Laravel**, projetada para centralizar indicadores de Business Intelligence (BI) e fornecer um rigoroso controle de segurança, autenticação e gerenciamento de permissões granulares. O front-end combina a modernidade do **Tailwind CSS** com a elegância e robustez do template de painel **Tabler**.

---

## 🚀 Principais Funcionalidades

* **Painel de Controle (Dashboard)**: Visão centralizada e intuitiva com indicadores e métricas estratégicas do sistema.
* **Autenticação Completa**: Sistema de login seguro com gerenciamento de sessões e recuperação de acesso.
* **Gestão de Acessos Avançada (RBAC)**:
  * **Usuários**: Cadastro, vínculo de perfis e controle ativo de contas.
  * **Perfis (Roles)**: Agrupamento dinâmico de permissões por cargo ou função corporativa.
  * **Permissões Granulares**: Controle minucioso de visualização e ações por rotas e recursos do sistema via diretivas do Laravel (`@can`, `@canany`).
* **Interface Dinâmica e Responsiva**:
  * Barra lateral (sidebar) retrátil com suporte a estado colapsado/expandido.
  * Persistência da preferência de layout diretamente no navegador do usuário (`localStorage`).
  * Ícones modernos integrados via *Tabler Icons*.

---

## 🛠️ Tecnologias Utilizadas

* **[Laravel](https://laravel.com/)** (v13+) - Framework PHP backend.
* **[Tailwind CSS](https://tailwindcss.com/)** - Estilização e design responsivo.
* **[Tabler UI / Tabler Icons](https://tabler.io/)** - Componentes visuais e iconografia corporativa.
* **Vite** - Empacotamento e otimização de assets em tempo real.
* **Blade Templates** - Sistema de renderização de views modularizadas.

---

## ⚙️ Pré-requisitos

Certifique-se de possuir o seguinte ambiente configurado:
* **PHP** >= 8.2
* **Composer**
* **Node.js** e **NPM**

---

## 📦 Instalação e Configuração

Siga os passos abaixo para configurar o ambiente de desenvolvimento local:

1. **Clone o repositório:**
   ```bash
   git clone <url-do-seu-repositorio>
   cd <nome-da-pasta-do-projeto>
