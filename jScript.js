function confirmClear() {
    var input = document.getElementById("title");
    var input1 = document.getElementById("comment");
    if (input.value != "") {
        
      var r = confirm("Are you sure you want to clear this field?");
      if (r == true) {
        input.value = "";
        input1.value = "";
      }
    }
    var r = alert("Text fields have been cleared");
  }
  
  var submitColour = document.getElementById("po");

  submitColour.addEventListener("click",function(event) {
    var title = document.getElementById("title");
    var comment = document.getElementById("comment");

    if ((title.value.trim() === "") || (comment.value.trim() === "")) {
        title.style.backgroundColor = "red";
        comment.style.backgroundColor = "red";
        event.preventDefault();
        var r = alert("Text fields are empty.");
    }
    else {
        title.style.backgroundColor = "";
        comment.style.backgroundColor = "";
    }
  });