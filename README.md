andyrofl.com
===

This is a rough draft of my personal website. I decided to open-source it while I'm working on it.


SQL
requires sql.php in the root and another in /admin/  
**root**  
	$mysql_host (hostname)  
	$mysql_database (the public db)  
	$mysql_user_read (read only account)  
	$mysql_user_write (read and write account)  
	$mysql_password_read  
	$mysql_password_write  
**admin**  
	$mysql_host_private (can be the same as public)  
	$mysql_database_private (the private db)  

required tables for public database (root sql) are blog, blogcache, games, portfolio, and resources.
required table for private database (admin sql) is users

directory
===
**/pages/** contains pages  
**/cdn/** contains images, scripts, styles, and other static content. Storing these in a different directory makes it easier to serve them from another domain or subdomain.  
**/admin/** contains the admin pages and is a separate directory for the same reason as /cdn/  
**/tempate/** contains headers, footers, and other content that is used in multiple pages
