**Projeto Blog: Laravel e Vue**

---

### Backend (/blog-api)

#### Instalação do Projeto com Laravel
1. Certifique-se de ter o Composer instalado em sua máquina.
2. Clone o repositório do projeto:

    ``git clone https://github.com/IzaacBaptista/Projeto-FullStack-blog-laravue``

3. Navegue até o diretório do projeto backend:

    ``cd blog-api``

4. Instale as dependências do Composer:

    ``composer install``

5. Copie o arquivo `.env.example` para `.env`:

    ``cp .env.example .env``

6. Gere a chave de aplicativo do Laravel:

    ``php artisan key:generate``

7. Configure seu banco de dados no arquivo `.env`.
8. Execute as migrações para criar as tabelas no banco de dados:

    ``php artisan migrate``

9. Inicie o servidor:

    ``php artisan serve``


#### Rodando Localmente
- Após a instalação, você pode acessar o projeto localmente em `http://localhost:8000`.

---

### Frontend (/blog-app)

#### Instalação do Projeto com Vue
1. Certifique-se de ter o Node.js e o Vue CLI instalados em sua máquina.
2. Navegue até o diretório do projeto frontend:

    ``cd blog-app``

4. Instale as dependências:

    ``npm install``


#### Rodando Localmente
- Após a instalação, você pode iniciar o servidor de desenvolvimento com o comando:

    ``npm run dev``

- O aplicativo estará disponível em `http://localhost:5173`.

---

Com estas instruções, você poderá configurar e executar tanto o backend quanto o frontend do projeto do blog feito em Laravel e Vue localmente em sua máquina.