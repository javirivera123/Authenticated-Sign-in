# Authenticated-Sign-in

Webpage: http://cs5339.cs.utep.edu/jrivera17/swsAuth/mainpage.php

Nowadays, almost every web-based system include an authentication module where users need sign in to access some features of the system. Attackers attempt to bypass the authentication to get unauthorized access. There are so many ways an attacker can succeed, and no matter how good our au- thentication is, we should be attempting to detect and react to unauthorized access. Yet, it would be careless not to include some basic design features of a password based authentication that makes it harder for the attacker and not more burdensome for the legitimate user. I will implement such an authentication module that should be able to be imported into future web-based systems.

# Overview

My web site will have three types of users: visitors, regular users and administrators. The regular users and administrators information will be stored in a MySQL database. Access to a page will depend on which type of user attempts to load the page.

# Access

mainpage.php and signin.php can be accessed by all visitors.
user.php can be only accessed by regular users and administrators. admin.php can only be accessed by administrators.
Trying to access a page where access is denied should display an appropriate error message, for example, “you need to be logged in as an administrator to access this page” instead of displaying the regular contents of the page.

# Users database

There is a database with a table of registered users. I used salting and hashing to store the password in the table. For salting, I used 2 strings: a constant string of random characters, and the username, so storing in the table, the hash function applied to the concatenation of 3 strings: a constant string of random characters, the userid, and the password. In this way, one would need to have access to both the database and the php program to mount a password cracking attack, and the username used as an additional salt will slow down the brute force attack.Access
mainpage.php and signin.php can be accessed by all visitors.
user.php can be only accessed by regular users and administrators. admin.php can only be accessed by administrators.
Trying to access a page where access is denied should display an appropriate error message, for example, “you need to be logged in as an administrator to access this page” instead of displaying the regular contents of the page.

# Page contents

All pages have a sign in button if the visitor is not signed in, and a sign out button otherwise.
All pages have links to the other accessible pages, and no link to not accessible pages. For example, if an administrator visits the main page, there is a link to user.php and to admin.php.
All pages have some text in it indicating where we are.
user.php displays the user’s information.
admin.php has a form to add new users. The form allows adding either regular users or administrators. It also has a link or button to display the list of registered users.

user name: admin
password: nimda339

# Authentication

When signing in, this will check the username and password against the registered users table. Then use PHP sessions to keep the user logged in. Session is is destroyed when the user signs out.
