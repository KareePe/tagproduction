$(document).ready(() => {
  $(".form-contact").submit((e) => {
    $(".btn").attr("disabled", true);
    e.preventDefault();

    const buttons = document.querySelectorAll(".btn-loading");
    buttons.forEach((button) => {
      button.classList.add("spinner");
    });

    const formData = $(".form-contact").serialize();

    try {
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "../server/contact",
        data: formData,
        success: function (response) {
          buttons.forEach((button) => {
            button.classList.remove("spinner");
          });
          $(".btn").attr("disabled", false);
          if (response.status === "OK") {
            Swal.fire({
              title: "สำเร็จ!",
              text: "ข้อมูลการติดต่อได้รับการอัปเดตเรียบร้อยแล้ว",
              icon: "success",
              confirmButtonText: "ตกลง",
              allowOutsideClick: false,
              allowEscapeKey: false,
            }).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            });
          } else {
            Swal.fire({
              title: "ผิดพลาด!",
              text: "ไม่สามารถอัปเดตข้อมูลการติดต่อได้",
              icon: "error",
              confirmButtonText: "ตกลง",
              allowOutsideClick: false,
              allowEscapeKey: false,
            }).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            });
          }
        },
        error: function (err) {
          buttons.forEach((button) => {
            button.classList.remove("spinner");
          });
          $(".btn").attr("disabled", false);
          Swal.fire({
            title: "ผิดพลาด!",
            text: "อัพเดทข้อมูลติดต่อไม่สำเร็จ",
            icon: "error",
            confirmButtonText: "ตกลง",
            allowOutsideClick: false,
            allowEscapeKey: false,
          }).then((result) => {
            if (result.isConfirmed) {
              location.reload();
            }
          });
        },
      });
    } catch (error) {
      buttons.forEach((button) => {
        button.classList.remove("spinner");
      });
      $(".btn").attr("disabled", false);
      Swal.fire({
        title: "ผิดพลาด!",
        text: error,
        icon: "error",
        confirmButtonText: "ตกลง",
        allowOutsideClick: false,
        allowEscapeKey: false,
      }).then((result) => {
        if (result.isConfirmed) {
          location.reload();
        }
      });
    }
  });
});
