# Desafio Docker: A Historia de Toshiro Shibakita

> Projeto desenvolvido para o Bootcamp DIO em parceria com a Accenture.

Este repositorio contem a solucao do desafio pratico focado em containerizacao de aplicacoes, utilizando **Docker** e **Docker Compose** para orquestrar um ambiente de microsservicos.

---

## Descricao do Desafio

O objetivo principal foi pegar uma aplicacao legada (PHP + MySQL) e transforma-la em uma estrutura moderna, escalavel e independente de infraestrutura fisica. O projeto original continha dependencias de IPs fixos e configuracoes manuais que foram totalmente automatizadas neste repositorio.

---

## Tecnologias Utilizadas

- **Docker**: Criacao de imagens isoladas para a aplicacao.
- **Docker Compose**: Orquestracao de multiplos containers (App e Database).
- **PHP 7.4 + Apache**: Servidor de aplicacao dinamico.
- **MySQL 5.7**: Banco de dados relacional.
- **IntelliJ IDEA**: Ambiente de desenvolvimento (IDE).

---

## Melhorias Tecnicas Implementadas

Para elevar o nivel do desafio e seguir as melhores praticas de mercado, implementei as seguintes melhorias:

1. **Service Discovery**: Removi o IP fixo da AWS no codigo e implementei a conexao via nome do servico Docker (`db`), permitindo que a aplicacao rode em qualquer ambiente sem alteracao de codigo.

2. **Persistencia de Dados**: Configuracao de **Volumes** no Docker Compose para garantir que as informacoes do banco de dados nao sejam perdidas ao reiniciar os containers.

3. **Inicializacao Automatica (Seed)**: Uso do volume `/docker-entrypoint-initdb.d` para carregar o script `banco.sql` automaticamente no primeiro boot do banco.

4. **Tratamento de Headers**: Reorganizacao do codigo PHP para evitar erros de `headers already sent` e implementacao de `ob_start()` para maior robustez no processamento HTTP.

5. **Otimizacao da Imagem**: Customizacao do Dockerfile com a instalacao da extensao `mysqli` para garantir a conectividade nativa entre PHP e MySQL.

---

## Estrutura do Projeto

```
/
├── sql/
│   └── banco.sql         # Script de criacao da tabela 'dados'
├── Dockerfile            # Configuracao da imagem PHP-Apache
├── docker-compose.yml    # Orquestrador dos servicos
├── index.php             # Logica da aplicacao ajustada para Docker
└── README.md             # Documentacao do projeto
```

---

## Como Executar o Projeto

1. Certifique-se de ter o **Docker Desktop** instalado e rodando.

2. Clone o repositorio:

   ```bash
   git clone https://github.com/Jvbarbosa00/toshiro-shibakita
   
3. Acesse a pasta do projeto e suba os containers:
   ```bash
   docker-compose up -d --build
   
4. Acesse no navegador: [http://localhost:8080](http://localhost:8080)
    
   