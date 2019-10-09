# Simple Secure Test

Here will contain my opinion about security check that was passed in this project


### 1. Always Perform Context-Aware Content Escaping
- By default laravel always perform escape special character when using {{ }} https://laravel.com/docs/6.x/blade#displaying-data
- For addition i'm using strip_tags to escape special character when using form

### 2. Deprecate Features and Libraries When They’re No Longer Used
- Scanned using https://github.com/sensiolabs-de/deprecation-detector depcreated libraries not found

### 3. Disable or Limit Program Execution Functionality
- Nope

### 4. Disable Unsafe and Unrequired Functionality
- It's server production configuration

### 5. Don’t Cache Sensitive Data
- Not using cache definitely, performed <meta http-equiv="Cache-Control" content="no-store" />

### 6. Don’t Implement Your Own Crypto
- Nope

### 7. Filter and Validate All Data
- Already use https://laravel.com/docs/6.x/validation in form request

### 8. Filter File Uploads
- Already use https://laravel.com/docs/6.x/validation in form request

### 9. Integrate Security Scanners Into Your CI Pipeline
- Haven't tried

### 10. Invalidate Sessions When Required
- Regenerate session id activated by default 
- I set 15 minutes for session to expired
- I change cookie name from .env file, so not use default name
- I set destroy session when browser close

### 11. Keep All Dependencies Up to Date
- Perform this by using composer update

### 12. Make sure permissions on filesystem are limited
- I'm using 3rd party storage engine to store my uploaded file

### 13. Never Display PHP Errors and Exceptions in Production
- It's server production configuration

### 14. Never Store Sensitive Data in Session
- Only storing user_id

### 15. Never Store Sessions in a Shared Area
- By default session location handled inside root directory of laravel so its privated

### 16. Perform Strict Type Comparisons
- Implemented in controller

### 17. Set open_basedir
- Not implemented yet

### 18. Store Passwords Using Strong Hashing Functions
- Using hash bcrypt

### 19. Use a DAST
- Haven't tried

### 20. Use a Package Vulnerability Scanner
- Haven't tried

### 21. Use a Reputable ACL or RBAC Library
- Haven't tried

### 22. Use a SAST
- Haven't tried

### 23. Use Libsodium
- Using bcrypt

### 24. Use libxml_disable_entity_loader(true)
- Not using xml

### 25. Use Microframeworks Over Monolithic Frameworks
- Laravel

### 26. Use Parameterized Queries
- Using ORM and Query Builder

### 27. Use PHP 7!
- Yess

### 28. Use Secure Session Settings
- Implemented in 15 lifetime session

### 29. Whitelist, Never Blacklist
- Implemented in image mimetypes
