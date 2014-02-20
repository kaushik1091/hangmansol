Hangmansol
==========

<h4>This small web application is basically a Cheat-sheet for the game, Hangman.</h4>

I have used PHP, AJAX and JQuery to build this small web app.<br/>
I intend to develop a very intuitive user interface with as many minimum user-controls (on the client-side) as possible.

When a user enters the hangman-solver page, the only control visible is a dropdown box to select the size of the word which loads the corresponding number of text-boxes dynamically. I've achieved this through a JQuery function.

User may enter a letter in each of the text-fields generated to search for corresponding words from the wordlist.

If the input field is empty (str.length==0), the showHint() function clears the content of the txtHint placeholder and exits the function.

If the input field is not empty, the showHint() function executes the following:<br/>
    Create an XMLHttpRequest object<br/>
    Create the function to be executed when the server response is ready<br/>
    Send the request off to a file on the server<br/>
    Notice that a parameter (q) is added to the URL (with the content of the input field)<br/>

Before calling the showHint() function, a regular expression is formed dynamically corresponding to the letters entered in the text fields, so that it can be pushed to gethint.php for further processing.

The string manipulation and matching algorithms are written in this php file which returns all the possible matches to the index page from the wordlist(dict.txt).

During the whole process, user will not experience a page navigation and will be using only 2 controls (dropdown and textbox) in total, which gives a better user experience.

For further development:<br/>
  Many other filters can be added to narrow down the Hint-list like "Donot-Include".<br/>
  A better wordlist could be uploaded
