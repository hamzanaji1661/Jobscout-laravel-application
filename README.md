## About JobScout

JobScout is a Laravel-based web application designed to serve as a job portal for job seekers and employers. It is a Final Year Project at 'Ecole Marocaine Des Sciences De L'Ingenieur' EMSI , with the aim of providing a simple and efficient platform to connect job seekers with potential employers.

The application features a clean and intuitive user interface, making it easy for users to navigate and find relevant job postings. Job seekers can create their profiles, upload their resumes, and search for job listings based on various criteria such as location, industry, experience, and job type. They can also receive job alerts and notifications when new job listings that match their preferences are posted.

Employers can create their profiles, post job listings, and search for candidates based on various criteria such as location, experience, and education. They can also receive candidate applications, manage and communicate with applicants, and schedule interviews.


<h2>Installation</h2>

1. Install the xampp or wampp server or Mamp in case of MacOS.
2. Navigate to htdocs directory inside xampp or www directory in case of wampp. 
3. Download this project as zip and extract it inside the htdocs or www directory.
4. Run this code to generate manually .env file <code>cp .env.example .env</code>.
5. You'll need to generate the APP_KEY by running <code>php artisan key:generate</code>.
6. Import a SQL file provided with this project or run migration simply by running <code>php artisan migrate</code>.
7. Run the seeders by running <code>php artisan db:seed</code>.
8. Update the .env file with all the database credentials and the database name 'jobscout'.
9. After Successfully completing the above steps, simply run this command to start artisan server <code>php artisan serve</code>.
10. To create a admin / superuser to access the backend of the site I made a custom command to create a superuser by running <code>php artisan make:superuser</code> it will ask you to provide the fullname and email and the password don't worry if the password you type is hidden it is just a security measure
11. For Email verification I used 'mailpit' as it is actively maintained and easy to use with Docker it s recommanded to install Docker Desktop for a user-friendly UI
12. After setting up your docker and the Mailpit image make sure your .env is configured as follow :
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
you can access the mailpit interface with this link : http://localhost:8025
