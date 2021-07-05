function Calculate (){

    //Get all the form Data from the user and store into variables
    var itemName = document.getElementById('product').value;
    var width = document.getElementById('width').value;
    var height = document.getElementById('height').value;

    var itemprice = document.getElementById('iPrice');

    var packingType = document.getElementById('packing').value;
    var packingFeet = document.getElementById('length').value;

    //Calculate Price

    
    var foot = width + height;

    var iTotal = itemprice / 19 * foot;

    if (packingType === 'SIDE PACKING') {
        var packingPrice = packingFeet * 2.5;
    }

    else if ( packingType == 'OUTER FRAME SIDE PACKING PER FEET') {
        var packingPrice = packingFeet * 2.5;
    }

    else if (packingType == 'SASH PACKING PER FEET') {
        var packingPrice = packingFeet * 2.5;
    }

    else if (packingType == 'OUTER FRAME PACKING PER FEET'){
        var packingPrice = packingFeet * 2.5
    }

    else if (packingType == 'U PACKING PER FEET') {
        var packingPrice = packingFeet * 2.5;
    }

    else if (packingType == 'WOOL PACKING'){
        var packingPrice = packingFeet * 2;
    }

    var WholePrice = iTotal + packingPrice;


}