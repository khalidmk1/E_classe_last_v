 // Get the input file element
 var input = document.getElementById("exampleInputFile");
  
 // Add an event listener to listen for file selection
 input.addEventListener("change", function(event) {
   // Get the selected file
   var file = event.target.files[0];
   
   // Create a FileReader object to read the file
   var reader = new FileReader();
   
   // Set the callback function when the file is loaded
   reader.onload = function(e) {
     // Get the loaded image data as a data URL
     var imageData = e.target.result;
     
     // Get the image element
     var image = document.getElementById("blah");
     
     // Set the image source to the loaded data URL
     image.src = imageData;
   };
   
   // Read the selected file as data URL
   reader.readAsDataURL(file);
 });