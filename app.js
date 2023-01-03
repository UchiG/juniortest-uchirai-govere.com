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
        break;
      case 'Book':
        sizeDiv.style.display = 'none';
        weightDiv.style.display = 'block';
        dimensionDiv.style.display = 'none';
        break;        
      case 'Furniture':
        sizeDiv.style.display = 'none';
        weightDiv.style.display = 'none';
        dimensionDiv.style.display = 'block';
        break; 
      default:
        sizeDiv.style.display = 'none';
        weightDiv.style.display = 'none';
        dimensionDiv.style.display = 'none';
    }
}

class Product {
    constructor(sku, name, price) {
      this.sku = sku;
      this.name = name;
      this.price = price;
    }
    
    displayInputFields() {
      // To be implemented by subclasses
    }
  }
  
  // Define a DVD class that extends the Product class and overrides the displayInputFields method
  class DVD extends Product {
    displayInputFields() {
      sizeDiv.style.display = 'block';
      weightDiv.style.display = 'none';
      dimensionDiv.style.display = 'none';    }
  }
$DVD = new DVD();
  
  // Define a Book class that extends the Product class and overrides the displayInputFields method
  class Book extends Product {
    displayInputFields() {
      sizeDiv.style.display = 'none';
      weightDiv.style.display = 'block';
      dimensionDiv.style.display = 'none';    
  }
}
$Book = new Book();

  // Define a Furniture class that extends the Product class and overrides the displayInputFields method
  class Furniture extends Product {
    displayInputFields() {
      sizeDiv.style.display = 'none';
      weightDiv.style.display = 'none';
      dimensionDiv.style.display = 'block';
    }
  }
$Furniture = new Furniture();
  

  


 
  
  
  

  
