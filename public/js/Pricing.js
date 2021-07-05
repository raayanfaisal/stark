function Price() {

    // Gather information

    var itemCode = document.getElementById("code").value;
    var itemWidth = document.getElementById("width").value;
    var itemHeight = document.getElementById("height").value;
    var itemQTY = document.getElementById("qtyi").value;
    var hardwareQTY = document.getElementById("hqty").value;
    var packingLength = document.getElementById("length").value;
    var item = document.getElementById("product").value;
    var itemTax = document.getElementById("gst").value;
    //var salesProfit = document.getElementById("profit").value;
    var itemPacking = document.getElementById("ptype").value;
    //var salesDiscount = document.getElementById("discount").value;
    var hardwareItems = document.getElementById("accessories").value;

    var productName = document.getElementById('product');
    var actualProductName = productName.options[productName.selectedIndex].text;

    var NamesHard = document.getElementById('accessories');
    var NamHard = NamesHard.options[NamesHard.selectedIndex].text;

    var packType = document.getElementById('ptype');
    var TPack = packType.options[packType.selectedIndex].text;


    //input Validatio

    //Calculate Subtotal

    var totalFoot = itemWidth + itemHeight;

    var hiddenSub = hardwareItems + item / 19 * totalFoot * itemQTY + itemPacking * packingLength + hardwareItems * hardwareQTY;

    console.log(item);
    console.log(hardwareItems);
    console.log(itemPacking);
    console.log(hiddenSub);

    // Calculate Profit and Tax's

    var tax = hiddenSub * itemTax;

    //var discountTotal = salesDiscount / 100 * hiddenSub;

    var subTotal = hiddenSub + tax;

    var displaySub = Math.round( subTotal );

    var totalAmount = displaySub;

    var finalPrice = Math.round( totalAmount );

    console.log(finalPrice);


    // Insert into Quotation / Invoice 

    var table = document.getElementsByTagName('table')[0];

    var newRow = table.insertRow(1);

    var cel1 = newRow.insertCell(0);
    var cel2 = newRow.insertCell(1);
    var cel3 = newRow.insertCell(2);
    var cel4 = newRow.insertCell(3);
    var cel5 = newRow.insertCell(4);

    cel1.innerHTML = itemCode;
    cel2.innerHTML = actualProductName + NamHard;
    cel3.innerHTML = item;
    cel4.innerHTML = itemQTY;
    cel5.innerHTML = finalPrice;


    var sbtotal = document.getElementsByClassName("sub");
    var gt6 = document.getElementsByClassName("gst6");
    var tl = document.getElementsByClassName("ttl");

    gstP = document.getElementById("gstpercent");
    subttl = document.getElementById("displaySubttl");
    ttlAmount = document.getElementById("totalAmount");

    gstP.innerHTML = 'GST%: ' + itemTax;
    ttlAmount.innerHTML = 'Total: ' + finalPrice;
    subttl.innerHTML = "Subtotal" + displaySub;
    
}