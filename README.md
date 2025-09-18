# 🔐 Login Inseguro

Aplicação vulnerável criada para demonstração de **DevSecOps** com **GitHub Actions** e integração com **Veracode**.

![Veracode Upload Scan](https://github.com/Diogenes28/login-inseguro/actions/workflows/veracode-upload-scan.yml/badge.svg)
![Veracode Pipeline Scan](https://github.com/Diogenes28/login-inseguro/actions/workflows/veracode-pipeline-scan.yml/badge.svg)
![Deploy GitHub Pages](https://github.com/Diogenes28/login-inseguro/actions/workflows/deploy-github-pages.yml/badge.svg)
[![Code Scanning - GitHub](https://img.shields.io/badge/Code%20Scanning-Active-brightgreen)](https://github.com/Diogenes28/login-inseguro/security/code-scanning)
![License](https://img.shields.io/github/license/Diogenes28/login-inseguro)

---

## 📌 Objetivo do Projeto
Este repositório foi desenvolvido com a intenção de **mostrar na prática como funciona um pipeline DevSecOps**, utilizando ferramentas de análise de segurança automatizadas.

A aplicação contém vulnerabilidades **propositais** (não deve ser usada em produção) para demonstrar como o **Veracode** e o **Code Scanning do GitHub** conseguem detectá-las.

---

## ⚠️ Vulnerabilidades Propositalmente Inseridas
- **SQL Injection** → consultas inseguras no PHP.  
- **XSS (Cross-Site Scripting)** → falta de sanitização de entrada de usuário.  

Essas falhas estão presentes apenas para **fins educacionais**.

---

## 🛠️ Tecnologias Utilizadas
- **PHP** (backend simples)  
- **HTML / CSS** (frontend básico)  
- **Composer** (gerenciador de dependências)  
- **GitHub Actions** (CI/CD e segurança)  
- **Veracode** (SAST e Pipeline Scan)  

## ⚙️ Workflows Configurados
Dentro da pasta [`.github/workflows`](./.github/workflows), este projeto possui três automações principais:

1. **`veracode-upload-scan.yml`**  
   🔹 Faz o upload da aplicação para a plataforma Veracode e executa análise completa.

2. **`veracode-pipeline-scan.yml`**  
   🔹 Executa o **Pipeline Scan** localmente no GitHub Actions.  
   🔹 Converte os resultados em **SARIF** e envia para o **Code Scanning** do GitHub.

3. **`deploy-github-pages.yml`**  
   🔹 Faz o deploy da aplicação para o **GitHub Pages**, permitindo visualizar a aplicação vulnerável online.

---

## 📊 Integração com Veracode
- O projeto está configurado para enviar resultados de segurança diretamente para a **plataforma Veracode**.  
- Os relatórios de vulnerabilidades também aparecem na aba **Security → Code scanning alerts** do GitHub.
