# Vulnerable PHP Application - XSS and SQL Injection Demo

## Description
This project is a **vulnerable PHP application** created for demonstration and educational purposes. It highlights the risks of common web vulnerabilities, including **Cross-Site Scripting (XSS)** and **SQL Injection**. The application features a simple blog-like interface with the following functionalities:

- **Search Form**: Users can search for a term, which is reflected in the query results (vulnerable to Reflected XSS).
- **Comments Section**: Users can submit comments, which are stored in a plain text file (vulnerable to Stored XSS).
- **Blog Search**: Allows users to input a query and see search results.

⚠️ **Warning**: This application is intentionally vulnerable. Do not deploy it in a production environment.

---

## Features
1. **Search Form**:
   - Accepts user input via a text field.
   - Displays the input directly in the search results without sanitization (Reflected XSS vulnerability).

2. **Comments Section**:
   - Users can submit their name and a comment.
   - Comments are saved in a text file (`comments.txt`) without proper input sanitization (Stored XSS vulnerability).

3. **File-Based Storage**:
   - Comments and user interactions are stored in plain text files for simplicity.
   - No database is used, but this design demonstrates how improper handling of user input can lead to vulnerabilities.

---

## Vulnerabilities Demonstrated
### 1. Cross-Site Scripting (XSS)
- **Reflected XSS**: Occurs when malicious input from the search form is immediately reflected in the response without validation or sanitization.
  - Example payload: 
    ```html
    <script>alert('Reflected XSS');</script>
    ```
- **Stored XSS**: Happens when malicious scripts are stored in the comments file and executed when the comments are displayed to other users.
  - Example payload: 
    ```html
    <script>alert('Stored XSS');</script>
    ```

### 2. Insecure File Storage
- Comments and other user-generated content are stored in plain text files. This design lacks basic security controls, allowing for data tampering or information leakage.

---

## How to Use
### Prerequisites
- PHP installed on your machine (version 7.x or later).
- A local or hosted server environment (e.g., PHP built-in server, XAMPP, WAMP).

### Running the Application
1. Clone the repository:
   ```bash
   git clone https://github.com/Simone-Stage/Stage-TET
