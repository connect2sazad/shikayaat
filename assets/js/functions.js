function formatDate(dateString) {
  const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

  const date = new Date(dateString);
  const monthIndex = date.getMonth();
  const day = date.getDate();
  const year = date.getFullYear();
  let hours = date.getHours();
  const minutes = date.getMinutes();
  const ampm = hours >= 12 ? 'PM' : 'AM';

  // Convert from 24-hour time to 12-hour time
  hours = hours % 12;
  hours = hours ? hours : 12;

  const formattedDate = `${months[monthIndex]} ${day}, ${year} ${hours}:${minutes.toString().padStart(2, '0')} ${ampm}`;

  return formattedDate;
}

function close_complaint(refno) {

  var form_data = "refno=" + refno + "&status=closed&request_type=change_ticket_status";

  ajax_request(form_data).done(function (response) {
    if (response.status == 'success') {
      Toastify({
        text: response.message,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: "#4fbe87",
      }).showToast();

      location.reload();

    } else {
      Toastify({
        text: response.message,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: "red",
      }).showToast();
    }
  });

}

function revoke_complaint(refno) {

  var form_data = "refno=" + refno + "&status=revoked&request_type=change_ticket_status";

  ajax_request(form_data).done(function (response) {
    if (response.status == 'success') {
      Toastify({
        text: response.message,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: "#4fbe87",
      }).showToast();

      location.reload();

    } else {
      Toastify({
        text: response.message,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: "red",
      }).showToast();
    }
  });

}

function remind_complaint(refno) {
  var form_data = "refno=" + refno + "&request_type=remind_ticket";

  ajax_request(form_data).done(function (response) {
    if (response.status == 'success') {
      Toastify({
        text: response.message,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: "#4fbe87",
      }).showToast();

      var newElement = $('<div class="reminder-status">' + response.message + '</div>');
      $('#reminder-' + refno).after(newElement);
      $('#reminder-' + refno).remove();


    } else {
      Toastify({
        text: response.message,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: "red",
      }).showToast();
    }
  });
}

function checkUserIdExistence(userid) {
  var form_data = "userid=" + userid + "&request_type=check_userid_existence";

  ajax_request(form_data).done(function (response) {
    if (response.status == 'success') {

      if (response.userid_exists == 'yes') {
        $('#request-btn').prop('disabled', true);
        Toastify({
          text: response.message,
          duration: 3000,
          close: true,
          gravity: "top",
          position: "right",
          backgroundColor: "red",
        }).showToast();
      } else {
        $('#request-btn').prop('disabled', false);
      }

    } else {
      Toastify({
        text: response.message,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: "red",
      }).showToast();
    }
  });
}

function checkEmailExistence(email) {
  var form_data = "email=" + email + "&request_type=check_email_existence";

  ajax_request(form_data).done(function (response) {
    if (response.status == 'success') {

      if (response.email_exists == 'yes') {
        $('#request-btn').prop('disabled', true);
        Toastify({
          text: response.message,
          duration: 3000,
          close: true,
          gravity: "top",
          position: "right",
          backgroundColor: "#4fbe87",
        }).showToast();
      } else {
        $('#request-btn').prop('disabled', false);
      }

    } else {
      Toastify({
        text: response.message,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: "red",
      }).showToast();
    }
  });
}

function checkPasswords() {
  var password = $('#password').val()
  var cpassword = $('#cpassword').val()

  if (password == cpassword) {
    $('#password-msg').hide();
    $('#request-btn').prop('disabled', false);
  } else {
    $('#request-btn').prop('disabled', true);
    Toastify({
      text: "Passwords do not match!",
      duration: 3000,
      close: true,
      gravity: "top",
      position: "right",
      backgroundColor: "red",
    }).showToast();
  }
}

function change_request_status(request_refno, new_status){
  var form_data = "request_refno="+request_refno+"&new_status="+ new_status + "&request_type=change_request_status";

  ajax_request(form_data).done(function (response) {
    if (response.status == 'success') {
      Toastify({
        text: response.message,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: "#4fbe87",
      }).showToast();

      $('#row-'+request_refno).remove();

    } else {
      Toastify({
        text: response.message,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: "red",
      }).showToast();
    }
  });
}

function change_user_status(userid, status) {  }

function change_user_delete(userid, status) {  }