function showElement()
{
	var x = document.getElementById( "hide_element" );
	if (x.style.display === "block")
		x.style.display = "none";
	else
		x.style.display = "block";
}