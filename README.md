# eLearning

Generating Multiple Choice Questions to Students based on Teachers subjects

# How to Install:

Suggesting to use **Laragon** for our LAMP environment:

Step 1. Laragon - [Download](https://laragon.org/download/)

Step 2. After installation you will have `/www` folder.

Step 3. (See Yii Setup Guide)

Step 4. Run Laragon > "Start All"

Step 5. Open in your browser: `http://elearning.test:8070/` --> `8070` depends on your Laragon Apache Port

Step 6: (Database Setup Guide)

# Yii Setup Guide:

Setup 1. Download Yii Framework in
[Yii Framework Download](https://www.yiiframework.com/download) or use this to download [Yii-1.1.29 (Zip)](https://github.com/yiisoft/yii/releases/download/1.1.29/yii-1.1.29.f89b76.tar.gz)

Setup 2. Extract and rename the folder from `yii-1.1.29` to `yii`.

Setup 3. Move your `yii` folder under `/www`

Setup 4. `git clone https://github.com/mjc169/eLearning.git` under `/www` as well

Setup 5. Go back to `eLearning Step 4`

You should have this folder structure:

```
/www/eLearning
/www/yii/...
/www/yii/framework
```

**For Yii 1 - Quick Start Guide. Check [here](https://www.yiiframework.com/doc/guide/1.1/en/quickstart.first-app)**

# Database Setup Guide:

Step 1. Open your MySQL GUI Tool (Laragon has a built-in).

Step 2. Connect to your local database (Laragon uses MYSQL Port:3302`)

Step 3. Create database named `elearning_db`

Step 4. Import `eLearning/elearning_db.sql`

Step 5. Confirm all parameters are correct in: `eLearning/protected/config/database.php`

# Updating Login for Seed Users
Use [Password Hash](https://onlinephp.io/password-hash) to generate your `password` and update `tbl_account.password`

Example:

You want the password to be `test`

Salt is `1610877379`


**In Password Hash Form:**
```
$password = `test1610877379`
$algo = `PASSWORD_DEFAULT`
$cost = "" (blank)
```
Copy the **result** below and update the password column with this value:
```
$2y$10$aaSXBDZu7wY6p.7t9/idoORwi2KyJFiv/yd.AUcupFxCBufhcQPvK
```
