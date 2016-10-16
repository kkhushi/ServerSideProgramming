<!Doctype html>
<html>
    <head>
        <title>Five Thousand Characters</title>
        <link rel="stylesheet" type="text/css" href="/styles/common.css">
    </head>
    <body>
        <h1> Five Thousand Characters</h1>
        <a href="writesomething.view">Write Something!</a>
        <p>Checkout what people are writing...</p>
        <form>
            <input type="text" name="phrase" placeholder="Phrase Filter" />
            <select name="genre" id="genre">
                <option>All Genres</option>
                <?php foreach ($genres as $genre) {
                    echo "<option name=\"$genre\" id=\"$genre\">$genre</option>"
                }?>
            </select>
            <input type="submit" value="GO"/>
        </form>
    </body>
</html>
<!--
Beneath this there should be a link: Write Something! that takes one to the Write Something view.
Under this link, it should say: Check out what people are writing... 
There should be a form consisting of a text field with placeholder Phrase Filter, a dropdown populated from a database table of genres with the default genre being "All Genres",and a Go button.
Beneath this should be three, h3-titled ordered lists: Highest Rated, Most Viewed, and Newest. Each ordered list should have the top ten items from the database tables for story ordered according to the respective domain, i.e., either rating, views, or submission date. A list item in the list should consist of a link to the story view page presenting that story with link text the title of the story. 
The form mentioned above should have method control how the three top ten lists are filtered. Initially, it is blank and and "All Genres" is chosen, so no filtering is done.
However, if the Phrase Filter has some non-empty value, then only stories containing that value in the title should be considered for the top ten list. 
Similarly, if genre is set to something other than "All Genres", then the top ten lists are restricted to just that genres. 
As an example, suppose the Phrase Filter was "Cute Puppies" and the genre was Crime. Then the top ten lists items would be:  the Highest Rated stories with title containing "Cute Puppies" in the Crime genre, the Most Viewed stories with title containing "Cute Puppies" in the Crime genre, and the Newest stories with title containing "Cute Puppies" in the Crime genre. 
You should store the the current value of the Phrase Filter and Genre in a session, so that if a user comes back the values are set to what they had the last time they visited the site.
Your program should clean any data sent from the form.
-->