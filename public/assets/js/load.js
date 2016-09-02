console.log("ASdsadasd");
$('a').click(function (event) {
	console.log($(this).attr('href'));
    // Avoid the link click from loading a new page
    event.preventDefault();

    // Load the content from the link's href attribute
    $('.container').load($(this).attr('href'));
});
