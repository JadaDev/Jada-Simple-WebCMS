## Simple WebCMS Only Base
## Hosting a Simple Website with XAMPP

1. **Install XAMPP**:
   - Download and install XAMPP, which includes Apache, MySQL, PHP, and other useful tools.
   - Make sure to install it on your local machine.

2. **Open Port 80**:
   - Ensure that port 80 is not blocked by any firewall or other software on your system.
   - Port 80 is typically used for HTTP traffic, so it needs to be open for your website to be accessible.

3. **Import SQL Database**:
   - Locate the `jada-web.sql` file provided with the website files.
   - Open phpMyAdmin by going to `http://localhost/phpmyadmin` in your web browser.
   - Log in with your MySQL credentials (default username is usually `root` and leave the password field empty).
   - Create a new database named `jada_web`.
   - Select the `jada_web` database from the left sidebar.
   - Click on the "Import" tab and choose the `jada-web.sql` file.
   - Click "Go" to import the SQL file and create the necessary tables.

4. **Place Files in htdocs**:
   - Copy all the website files into the `htdocs` directory of your XAMPP installation.
   - The `htdocs` directory is typically located in the XAMPP installation directory (e.g., `C:\xampp\htdocs` on Windows).

5. **Start Apache and MySQL**:
   - Open the XAMPP Control Panel.
   - Start the Apache and MySQL services by clicking on the "Start" buttons next to them.
   - Wait until both services are running (the "Running" status should be displayed next to each service).

6. **Access the Website**:
   - Open a web browser and navigate to `http://localhost` or `http://127.0.0.1`.
   - You should see the homepage of your website, which should display the website name and navigation menu.
   - You can now register, log in, and access the dashboard features provided by the website.
