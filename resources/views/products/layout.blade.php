<!DOCTYPE html>
<html>
<head>
    <title>Products Crud</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  
<div class="container">
    @yield('content')
</div>
   
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

<script>
    // Example of how you can populate the modal with product data dynamically
    document.querySelectorAll('.btn-primary').forEach(function(button) {
        button.addEventListener('click', function() {
            // Get the product data from the button (or another data attribute)
            var productId = this.getAttribute('data-id');
            var productName = this.getAttribute('data-name');
            var productPrice = this.getAttribute('data-price');
            var productDescription = this.getAttribute('data-description');
            var productImage = this.getAttribute('data-image');  // If you want to update the image as well

            // Populate the modal with the product data
            document.getElementById('product-id').value = productId;
            document.getElementById('product-name').value = productName;
            document.getElementById('product-price').value = productPrice;
            document.getElementById('product-description').value = productDescription;
            if (productImage) {
                // Optionally, display the current image
                document.getElementById('product-image').setAttribute('data-current-image', productImage);
            }
        });
    });
</script>
</html>