window.addEventListener("load", function() { 
    document.getElementById("file-upload").onchange = function(event) { 
      var reader = new FileReader(); 
      var c1 = document.getElementById("c1");
      reader.readAsDataURL(event.srcElement.files[0]); 
      var me = this; 
      reader.onload = function () { 
        var fileContent = reader.result; 
        c1.setAttribute("src",fileContent)
        c1.setAttribute("style","")
        console.log(fileContent); 
      } 
  }}); 