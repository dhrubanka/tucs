# Tezpur University Computer Society

The Tezpur University Computer Society is a student-run organization at Tezpur University that aims to promote the study and understanding of computer science and related fields. This project is a web platform built using the Laravel PHP framework that serves as a hub for resources, events, and communication for members of the society.

The platform includes a Reddit-like forum where members can post in various topic categories, a blog section for sharing articles and news, an events calendar, a GitHub-like project section, and a "connect" feature for visiting the profiles of other members. The main users of the site are students, alumni, professors, and other registered members of TUCS.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- PHP 7.4 or higher
- Composer
- A local development server (e.g. Apache, Nginx)
- npm

### Installing

1. Clone the repository: `git clone https://github.com/dhrubanka/tezpur-university-computer-society.git`
2. Navigate to the project directory: `cd tezpur-university-computer-society`
3. Install the dependencies: `composer install`
4. Copy the example environment file: `cp .env.example .env`
5. Generate an app key: `php artisan key:generate`
6. Set up your database connection in the `.env` file
7. Run the migrations: `php artisan migrate`
8. Seed the database: `php artisan db:seed --class=PermissionSeeder`
9. Install the frontend dependencies: `npm install`
10. Compile the frontend assets: `npm run dev`
11. Start the development server: `php artisan serve`

The project should now be running at http://localhost:8000.

## Usage

To log in as an administrator, use the following credentials:

- Email: admin@tucs.org
- Password: admin

From the dashboard, you can manage resources, events, and users.

## Contributing

If you would like to contribute to the project, please follow these guidelines:

- Fork the repository
- Create a new branch for your contribution
- Commit your changes to the new branch
- Create a pull request to the main repository

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
