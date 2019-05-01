# Laravel5.7 Tradução pt-BR

## Para ajudar a desenvolver

### Linux e Windows
1. Faça um Fork do projeto.
2. Clone o seu Fork, o repositório em seu nome.
3. Edite a vontade, envie para seu Fork.
4. Crie um Pull Request pro projeto original "/AdelinoLSN/Laravel5.7-Lang-ptBR"

## Para anexar ao seu projeto Laravel

### Linux
1. Acesse a pasta "resources/lang" do seu projeto.
2. Baixe os dados "git clone https://github.com/AdelinoLSN/Laravel5.7-Lang-ptBR.git ./pt-BR" (dessa forma, os dados ficarão dentro da pasta com o nome correto).
3. Remover o diretório oculto ".git" de dentro da pasta "pt-BR": "rm -rf pt-BR/.git/".
4. No arquivo "config/app.php" defina "pt-BR" como linguagem padrão: 'locale' => 'pt-BR'.
5. Dê um reset no cache: "php artisan config:cache"
6. Reinicie o Apache.

### Windows
Em construção.
