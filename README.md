# WordPress Docker Environment for Kecskemét Cybersecurity Project

This project converts a Next.js application for cybersecurity education in Kecskemét to a WordPress theme running in a Docker environment.

## Project Structure

```
wordpress-project/
├── docker-compose.yml          # Docker configuration
├── wp-content/                 # WordPress content directory
│   └── themes/
│       └── lovable-theme/      # Custom theme based on Next.js design
├── mysql-data/                 # Database storage
├── screenshots/                # Design reference screenshots
├── lovable-app/               # Original Next.js source
├── import-content.php         # Content import script
├── wordpress-import.json      # Content export data
└── README.md                  # This file
```

## Services

- **WordPress**: http://localhost:8080
- **phpMyAdmin**: http://localhost:8081
- **MariaDB**: Internal database (port 3306)

## Quick Start

1. Start the environment:
   ```bash
   docker-compose up -d
   ```

2. Access WordPress at http://localhost:8080
3. Complete WordPress installation
4. Install and activate the Lovable theme

## Database Credentials

- **Database**: wordpress
- **User**: wpuser
- **Password**: wppassword
- **Root Password**: rootpassword

## Development

The `wp-content` directory is mounted as a volume, so changes to themes and plugins are persistent and immediately visible.

## Next.js to WordPress Conversion

This project converts the cybersecurity education site from Next.js (React/Tailwind) to WordPress while maintaining the same visual design and functionality.

### Original Next.js Features Converted:
- Responsive design with Tailwind CSS
- Interactive threat cards
- Multi-language support (Hungarian)
- Modern UI components (shadcn/ui)
- Cybersecurity content structure