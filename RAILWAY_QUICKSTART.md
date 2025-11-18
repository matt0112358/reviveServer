# Railway Quick Start Guide

## 🚀 Deploy in 5 Minutes

### Step 1: Add Database Service
1. Go to [Railway Dashboard](https://railway.app/dashboard)
2. Click **New Project**
3. Add **MySQL** or **PostgreSQL** database

### Step 2: Deploy Revive Adserver
1. Push this repo to GitHub
2. In Railway, click **New Service** → **GitHub Repo**
3. Select this repository
4. Railway will auto-detect the Dockerfile and build

### Step 3: Configure Environment Variables
In your Revive Adserver service settings, add these variables:

#### For MySQL:
```bash
DB_TYPE=mysql
DB_HOST=${{MySQL.MYSQLHOST}}
DB_PORT=${{MySQL.MYSQLPORT}}
DB_USER=${{MySQL.MYSQLUSER}}
DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}
DB_NAME=${{MySQL.MYSQLDATABASE}}
```

#### For PostgreSQL:
```bash
DB_TYPE=pgsql
DB_HOST=${{Postgres.PGHOST}}
DB_PORT=${{Postgres.PGPORT}}
DB_USER=${{Postgres.PGUSER}}
DB_PASSWORD=${{Postgres.PGPASSWORD}}
DB_NAME=${{Postgres.PGDATABASE}}
```

### Step 4: Access Your Instance
1. Railway will provide a public URL
2. Open the URL in your browser
3. Follow the Revive Adserver installation wizard
4. Use the database credentials from Railway

### Step 5: Secure Your Installation
1. Complete the web installer
2. Set a strong admin password
3. Railway automatically provides HTTPS

## 🔧 Useful Commands

```bash
# Check git status
git status

# Push to GitHub
git remote add origin YOUR_GITHUB_REPO_URL
git branch -M main
git push -u origin main
```

## 📚 More Details
See `DEPLOYMENT.md` for comprehensive documentation.

## ⚡️ Railway Features Used
- ✅ Dockerfile-based deployment
- ✅ Automatic HTTPS
- ✅ Environment variables for database
- ✅ Service linking
- ✅ Auto-deploy on push

## 🆘 Need Help?
- Railway Docs: https://docs.railway.app/
- Revive Docs: https://www.revive-adserver.com/support/
