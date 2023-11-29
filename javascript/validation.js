var nameerror = document.getElementById("name-error");
var phoneerror = document.getElementById("phone-error");
var emailerror = document.getElementById("email-error");
var messageerror = document.getElementById("message-error");
var submiterror = document.getElementById("submit-error");

function validetname() {
  var name = document.getElementById("name").value;

  if (name.lenght == 0) {
    nameerror.innerHTML = "Name is required";
    return false;
  }
  if (!name.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)) {
    nameerror.innerHTML = "write full name";
    nameerror.style.color = "red";
    return false;
  }
  nameerror.innerHTML = "valid";
  nameerror.style.color = "green";
  return true;
}

function validetphone() {
  var phone = document.getElementById("phone").value;

  if (phone.lenght == 0) {
    phoneerror.innerHTML = "phone is required";
    return false;
  }
  if (!phone.match(/^[+212]+[6|7]+[0-9]{8}$/)) {
    phoneerror.innerHTML = "write full phone";
    phoneerror.style.color = "red";
    return false;
  }
  phoneerror.innerHTML = "valid";
  phoneerror.style.color = "green";
  return true;
}

function validetemail() {
  var email = document.getElementById("email").value;

  if (!email.match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/)) {
    emailerror.innerHTML = "write full email";
    emailerror.style.color = "red";
    return false;
  }
  
  if (email.lenght == 0) {
    emailerror.innerHTML = "email is required";
    return false;
  }

  emailerror.innerHTML = "valid";
  emailerror.style.color = "green";
  return true;
}

function validetmessage() {
  var message = document.getElementById("message").value;
  // console.log(message);
  var required = 30;
  var numberchrleft = required - message.length;

  if (message.lenght == 0) {
    messageerror.innerHTML = "Message is required";
    return false;
  }

  console.log(numberchrleft);

  if (numberchrleft > 0) {
    messageerror.innerHTML = numberchrleft + "more characters  required";
    messageerror.style.color = "red";
    return false;
  }
  messageerror.innerHTML = "valid";
  messageerror.style.color = "green";
  return true;
}

function formvalidet() {
  if (
    !validetname() ||
    !validetname() ||
    !validetemail() ||
    !validetmessage()
  ) {
    submiterror.innerHTML = "please enter ur information !";
    submiterror.style.color = "red";
    setTimeout(function () {
      submiterror.style.display = "none";
    }, 3000);
    return false;
  }
}




<!-- <div class="w-full mb-10">
<!-- <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label> -->
<div class="mt-2">
    <input id="phone" name="phone" type="text" autocomplete="phone" placeholder=" Phone Number"
        class="  bg-gray-200 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-white  sm:text-sm sm:leading-6" onkeyup="validetphone()">
        <span id="phone-error"></span>
</div>
</div> -->
