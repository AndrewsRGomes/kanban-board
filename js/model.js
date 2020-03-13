  function preencherMonitor(p_callback) {
    var xhttp;

    let responsavel = "pindoba"
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        let retorno = JSON.parse(this.responseText);
        document.querySelector("#to-do").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST", "control/control.php?responsavel=" + responsavel);
    xhttp.send();
  }
  