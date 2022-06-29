# star_assessment

Instructions
1) Download XAMPP
2) Download an IDE (Visual Studio Code is used for this project)
3) On XAMPP Start the Apache and MySQL Actions and press the Admin button on MYSQL
4) Create a database with a name: star
5) Import the two sql files that exist in this repository(articles.sql, categories.sql)
6) Type localhost/star/ in a browser
7) You are ready to use the app

Note: the articles table is empty, which means there is no data for articles. You can start creating one on the create an article tab

Tasks that are missing from the Star Technical Test
1) Tags with a one to many relationship (optional)
2) Basic SEO
3) The URL isn't following the description of /{category}/{id}/{slug}. The informations are passing with the GET action through the URL

All the rest tasks are implemented.

Non-functional features added by me
1) User is able to search all articles depending on the Category
2) On the index screen, if a user presses a Category name which is underneath the article title, he gets redirected to the category page where he can see all articles depending on the Category
3) On the article page, the exact timestamp of the article upload is shown next to the Category name

//Kostagiannis George
