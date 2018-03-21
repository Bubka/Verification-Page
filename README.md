# Verification-Page
A simple Page-Protection Verification page developed in [PHP](https://secure.php.net/); used to protect webpages you'd like only people who have access to a key to see.

## Requirements
* PHP ≥ 5.4

## Tutorial
1. Firstly, [download](https://github.com/henry7720/Verification-Page/archive/master.zip) all of the files.
2. Next, open up [verification.php](verification.php) and replace the `$key` variable's value with your protection key.
3. Next, open up [example-of-use.php](example-of-use.php) and copy the PHP snippets at the beginning and end of the file.
4. Finally, create a new page (or use the example) that you'd like to be protected and place the beginning snippet at the top (above the `DOCTYPE` declaration and the ending snippet at the bottome (below the closing `html` tag).
**Note**: if you get (or are) confused, make sure to read the inline comments for further explanation.

## License
[MIT](LICENSE)
