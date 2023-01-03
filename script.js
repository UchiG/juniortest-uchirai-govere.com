let form = document.forms['product_form'];
let menu = form.selector;
let options = form.selector.options;
                     
      sizeDiv.style.display = 'none';
      weightDiv.style.display = 'none';
      dimensionDiv.style.display = 'none';

menu.onchange = function() {
    let optionValue = this.value;
    // console.log(optionValue);   
    switch (optionValue) {
      case 'DVD':
        sizeDiv.style.display = 'block';
        weightDiv.style.display = 'none';
        dimensionDiv.style.display = 'none';

        var weightInput = document.getElementById("weight");
        weightInput.removeAttribute("required");
        weightInput.removeAttribute("oninvalid");
        weightInput.removeAttribute("oninput");

        var heightInput = document.getElementById("height");
        heightInput.removeAttribute("required");
        heightInput.removeAttribute("oninvalid");
        heightInput.removeAttribute("oninput");

        var widthInput = document.getElementById("width");
        widthInput.removeAttribute("required");
        widthInput.removeAttribute("oninvalid");
        widthInput.removeAttribute("oninput");

        var lengthInput = document.getElementById("length");
        lengthInput.removeAttribute("required");
        lengthInput.removeAttribute("oninvalid");
        lengthInput.removeAttribute("oninput");
        break;

      case 'Book':
        sizeDiv.style.display = 'none';
        weightDiv.style.display = 'block';
        dimensionDiv.style.display = 'none';

        var sizeInput = document.getElementById("size");
        sizeInput.removeAttribute("required");
        sizeInput.removeAttribute("oninvalid");
        sizeInput.removeAttribute("oninput");

        var heightInput = document.getElementById("height");
        heightInput.removeAttribute("required");
        heightInput.removeAttribute("oninvalid");
        heightInput.removeAttribute("oninput");

        var widthInput = document.getElementById("width");
        widthInput.removeAttribute("required");
        widthInput.removeAttribute("oninvalid");
        widthInput.removeAttribute("oninput");

        var lengthInput = document.getElementById("length");
        lengthInput.removeAttribute("required");
        lengthInput.removeAttribute("oninvalid");
        lengthInput.removeAttribute("oninput");
        break;     
           
      case 'Furniture':
        sizeDiv.style.display = 'none';
        weightDiv.style.display = 'none';
        dimensionDiv.style.display = 'block';

        var sizeInput = document.getElementById("size");
        sizeInput.removeAttribute("required");
        sizeInput.removeAttribute("oninvalid");
        sizeInput.removeAttribute("oninput");

        var weightInput = document.getElementById("weight");
        weightInput.removeAttribute("required");
        weightInput.removeAttribute("oninvalid");
        weightInput.removeAttribute("oninput");
        break; 
    //   default:
        // sizeDiv.style.display = 'none';
        // weightDiv.style.display = 'none';
        // dimensionDiv.style.display = 'none';
    }
    
}