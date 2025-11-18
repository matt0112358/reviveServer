# Revive Adserver - Railway Deployment Guide

This repository is configured for easy deployment on Railway.app.

## Prerequisites

1. A Railway account (sign up at https://railway.app)
2. A GitHub account (to connect your repository)

## Quick Start

### 1. Set Up Database

Before deploying Revive Adserver, you need a database. Railway makes this easy:

1. Go to your Railway dashboard
2. Create a new project
3. Add a MySQL or PostgreSQL database service:
   - Click "New Service" → "Database" → Choose MySQL or PostgreSQL
   - Railway will automatically provision the database
   - Note the connection details from the "Variables" tab

### 2. Deploy Revive Adserver

#### Option A: Deploy from GitHub (Recommended)

1. Push this repository to GitHub
2. In Railway, click "New Project"
3. Select "Deploy from GitHub repo"
4. Choose this repository
5. Railway will automatically detect the Dockerfile and deploy

#### Option B: Deploy via Railway CLI

```bash
# Install Railway CLI
npm i -g @railway/cli

# Login to Railway
railway login

# Initialize project
railway init

# Deploy
railway up
```

### 3. Configure Environment Variables

In your Railway project, go to the Revive Adserver service and add these variables:

**For MySQL:**
```
DB_TYPE=mysql
DB_HOST=${{MySQL.MYSQLHOST}}
DB_PORT=${{MySQL.MYSQLPORT}}
DB_USER=${{MySQL.MYSQLUSER}}
DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}
DB_NAME=${{MySQL.MYSQLDATABASE}}
```

**For PostgreSQL:**
```
DB_TYPE=pgsql
DB_HOST=${{Postgres.PGHOST}}
DB_PORT=${{Postgres.PGPORT}}
DB_USER=${{Postgres.PGUSER}}
DB_PASSWORD=${{Postgres.PGPASSWORD}}
DB_NAME=${{Postgres.PGDATABASE}}
```

### 4. Complete Installation

1. Once deployed, Railway will provide a public URL (e.g., `https://your-app.railway.app`)
2. Visit your URL to access the Revive Adserver installer
3. Follow the web-based installation wizard:
   - Accept the license agreement
   - Check system requirements
   - Configure database connection (use the Railway database variables)
   - Set up your admin account
   - Complete the installation

### 5. Post-Installation

After installation:
1. The installer will create a `var/config.inc.php` file with your settings
2. Make sure to secure your admin password
3. Configure your ad zones and campaigns

## Database Connection Details

The Dockerfile is configured to support both MySQL and PostgreSQL. Choose the one that fits your needs:

- **MySQL**: Recommended for most users, widely compatible
- **PostgreSQL**: Better for high-traffic sites, more features

## Persistent Storage

Railway provides ephemeral storage by default. The `var/` directory contains:
- Configuration files
- Uploaded images
- Cache files
- Logs

**Important:** For production use, consider using Railway's Volume feature to persist the `var/` directory across deployments.

## Troubleshooting

### Installation Page Not Loading
- Check that your Railway service is running
- Verify the public URL is accessible
- Check logs in Railway dashboard

### Database Connection Errors
- Verify database service is running
- Check environment variables are correctly set
- Ensure database credentials are correct

### Permission Issues
- The Dockerfile sets appropriate permissions for `var/` directory
- If issues persist, check Railway logs for specific errors

## Updating Revive Adserver

To update to a new version:
1. Download the latest Revive Adserver release
2. Replace the files in this repository (keeping `Dockerfile`, `.gitignore`, etc.)
3. Push to GitHub
4. Railway will automatically redeploy

## Support

- Revive Adserver Documentation: https://www.revive-adserver.com/support/documentation/
- Railway Documentation: https://docs.railway.app/
- Revive Adserver Forum: https://forum.revive-adserver.com/

## Security Notes

1. Always use HTTPS in production (Railway provides this automatically)
2. Change the default admin password immediately
3. Keep Revive Adserver updated
4. Regularly backup your database
5. Don't commit `var/config.inc.php` to version control (it's in `.gitignore`)

## License

Revive Adserver is licensed under GPLv2 or later. See LICENSE.txt for details.
