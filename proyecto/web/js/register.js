function validform() {

  var email = document.forms["my-form"]["email"].value;
  var password = document.forms["my-form"]["password"].value;
  var user = document.forms["my-form"]["user"].value;
  var name = document.forms["my-form"]["name"].value;
  var first_last_name = document.forms["my-form"]["first_last_name"].value;

  if (email == null || email ==="")
  {
    alert("Por favor, introduce tu email");
    return false;
  } else if (password == null || password.length > 10 || password.length < 5) {
    alert("La contraseña debe tener de 5 a 10 carácteres");
    return false;
  } else if (user == null || user === "") {
    alert("Por favor, introduce tu usuario");
    return false;
  } else if (name == null || name === "") {
    alert("Por favor, introduce tu nombre");
    return false;
  } else if (first_last_name == null || first_last_name === "") {
    alert("Por favor, introduce tu primer apellido");
    return false;
  }

}