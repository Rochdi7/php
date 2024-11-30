# Get User Info PHP Script

This project is a simple PHP-based web application that retrieves and displays key user information such as their **IP address**, **browser**, **device**, and **operating system**.
You can expect the IP address to be either `127.0.0.1` or `::1` in localhost 

## 🚀 Features

- Displays the user's **IP address**.
- Identifies the user's **browser**.
- Detects the user's **device type** (e.g., Computer, Mobile, Tablet).
- Shows the user's **Operating System**.

## 🛠️ How to Use

### 1. Clone or Download the Project
Clone the repository or download the files into your web server's root directory:
```bash
git clone https://github.com/Rochdi7/php/Get-user-info.git
```

### 2. Place Files in the Web Directory
Make sure the files are in the web server's directory, e.g., `htdocs` for XAMPP:
```bash
/var/www/html/your-project-folder
```

### 3. Start the Local Server
If using PHP's built-in server, navigate to the project directory and run:
```bash
php -S localhost:8000
```

### 4. Access the Application
Open a browser and navigate to:
```bash
http://localhost:8000
```

### 5. View User Info
The application will display the following:
- **Your IP Address**
- **Your Browser**
- **Your Device**
- **Your Operating System**

## 🔍 Understanding IP Address Behavior in Local Environments

When running this script on a **local server** (e.g., XAMPP, WAMP, or PHP's built-in server):
- Your **IP address** will be one of the following:
  - `127.0.0.1` (IPv4 Loopback)
  - `::1` (IPv6 Loopback)

These are reserved for **localhost testing** and are not public IP addresses.

### On a Public Server
When deployed to a public server, the script retrieves the user's real public IP address. It checks multiple headers (`HTTP_X_FORWARDED_FOR`, `REMOTE_ADDR`, etc.) to ensure accuracy.

## 📂 File Structure

```plaintext
├── index.php              # Main HTML file for displaying user info
├── user-info.php          # PHP class for extracting user details
├── README.md              # Project documentation
```

## 📜 Example Output

Here's an example of what the script displays in your browser:

```plaintext
Your IP Address: 192.168.1.1
Your Browser: Chrome
Your Device: Computer
Your Operating System: Windows 10
```

## screenshot
https://i.postimg.cc/MT043Xqg/screenshot.png

### Local Testing
You can expect the IP address to be either `127.0.0.1` or `::1`.

### Public Testing
Deploy the script on a public server to get the actual public IP address of the user.

## 🤝 Contributions

Feel free to fork this repository and create pull requests for improvements.

## 📜 License

This project is licensed under the MIT License.
