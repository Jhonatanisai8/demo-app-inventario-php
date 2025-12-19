console.log("Hola mundo desde ajax ");
const formularios_ajax = document.querySelectorAll(".formularioAjax");

function enviar_formulario_ajax(e) {
  e.preventDefault();
  console.log("Ejecutando funcion enviar_formulario_ajax");
  let enviar = confirm("Quieres enviar el formulario");
  if (enviar === true) {
    let data = new FormData(this);
    let method = this.getAttribute("method");
    let action = this.getAttribute("action");

    let headers = new Headers();
    let config = {
      method: method,
      headers: headers,
      mode: "cors",
      cache: "no-cache",
      body: data,
    };

    fetch(action, config)
      .then((response) => response.text())
      .then((response) => {
        let container = document.querySelector(".form-rest");
        container.innerHTML = response;

        // limpiamos los campos
        if (!response.includes("notification is-danger")) {
          this.reset();
        }
      });
  } else {
  }
}

formularios_ajax.forEach((formulario) => {
  formulario.addEventListener("submit", enviar_formulario_ajax);
});
