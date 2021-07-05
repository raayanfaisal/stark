function addItm () {

	var sl = document.getElementById('product');
	var itemf = document.getElementById('itemField').value;

	var itemVal = document.getElementById('itemPrice').value;

	var options = document.createElement("OPTION");

	options.innerHTML = itemf;
	options.value = itemVal;

	sl.options.add(options);
}