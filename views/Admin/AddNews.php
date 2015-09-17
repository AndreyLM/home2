<h3>Add news</h3>
<form method="post"  action="/home2/admin.php?Action=Add">
    <label for="Title">Title</label>
    <br><input type="text" name="title" id="title"/><br>
    <label for="text">Enter your text:</label><br>
    <textarea name="text" id="text">Enter text here...</textarea><br>
    <a href="/home2/admin.php">Back to admin panel</a><br>
    <input type="submit" name="submit" value="Save" />
</form>