(function () {
    'use strict'
    const forms = document.querySelectorAll('.requires-validation')
    Array.from(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
    
          form.classList.add('was-validated')
        }, false)
      })
    })();
    var input1 = document.getElementById("libelle");
    var input2 = document.getElementById("text");
    var input3 = document.getElementById("Matiere");
    var input4 = document.getElementById("text2");
      input1.addEventListener("input", function() {
        input2.value = input1.value;
      });
      
      input2.addEventListener("input", function() {
        input1.value = input2.value;
      });
      input3.addEventListener("input", function() {
        input4.value = input3.value;
      });
      
      input4.addEventListener("input", function() {
        input3.value = input4.value;
      });
      var select = document.getElementById("image-select");
      var image = document.getElementById("selected-image");
      select.addEventListener("change", function() {
        var selectedOption = select.options[select.selectedIndex];
        var imageUrl = selectedOption.getAttribute("data-image");
        image.src = imageUrl;
      });
      function changeImage() {
        var imageValue = document.querySelector('input[name="NumEtud"]:checked').value;
        var selectedImage = document.getElementById("selected-image2");
        selectedImage.src = '/images/' +imageValue + '.jpg';
    }
    function changeImage2() {
        var imageValue = document.querySelector('input[name="ligneRemonde"]:checked').value;
        var selectedImage = document.getElementById("selected-image3");
        selectedImage.src = '/images/ligneRemonde/' +imageValue + '.jpg';
    }
    document.getElementById("listContainer").addEventListener("click", function(){
        document.getElementById("listContainer").style.display = "block";
    });
    
    document.getElementById("hideListButton").addEventListener("click", function(){
        document.getElementById("listContainer").style.display = "none";
    });
    document.getElementById("showListButton2").addEventListener("click", function(){
        document.getElementById("listContainer2").style.display = "block";
    });
    
    document.getElementById("hideListButton2").addEventListener("click", function(){
        document.getElementById("listContainer2").style.display = "none";
    });
    document.getElementById("showListButton3").addEventListener("click", function(){
        document.getElementById("listContainer2").style.display = "block";
    });
    