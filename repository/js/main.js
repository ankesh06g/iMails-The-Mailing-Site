function SearchMailFunction() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("SearchBox");
      filter = input.value.toUpperCase();
      table = document.getElementById("MailList");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }

    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();   
    });

    function inbox() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("demo").innerHTML =
          this.responseText;
        }
      };
      xhttp.open("GET", "inbox.php", true);
      xhttp.send();
    }
    function sent() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("demo").innerHTML =
          this.responseText;
        }
      };
      xhttp.open("GET", "sent.php", true);
      xhttp.send();
    }
    function star() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("demo").innerHTML =
          this.responseText;
        }
      };
      xhttp.open("GET", "star.php", true);
      xhttp.send();
    }
    function trash() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("demo").innerHTML =
          this.responseText;
        }
      };
      xhttp.open("GET", "trash.php", true);
      xhttp.send();
    }

    function draft() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("demo").innerHTML =
          this.responseText;
        }
      };
      xhttp.open("GET", "draft.php", true);
      xhttp.send();
    }
