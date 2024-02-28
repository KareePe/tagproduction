const convertFormToJSON = (form) => {
  return $(form)
    .serializeArray()
    .reduce(function (json, { name, value }) {
      json[name] = value;
      return json;
    }, {});
};

const convertImgToBase64 = (files) => {
  return new Promise((resolve, reject) => {
    const file = files[0];
    const reader = new FileReader();

    reader.onload = function (event) {
      const base64Data = event.target.result;
      resolve(base64Data);
    };

    reader.onerror = function (error) {
      reject(error);
    };

    reader.readAsDataURL(file);
  });
};

const convertImgToBase642 = (file) => {
  return new Promise((resolve, reject) => {
    const reader = new FileReader();

    reader.onload = function (event) {
      const base64Data = event.target.result;
      resolve(base64Data);
    };

    reader.onerror = function (error) {
      reject(error);
    };

    reader.readAsDataURL(file);
  });
};

const loadData = () => {
  $.ajax({
    url: "../server/get_slide",
    type: "GET",
    success: function (data) {
      $("#tbody-slide").html(data);
    },
  });
};

const editSlide = (id) => {
  Swal.fire({
    title: "คุณต้องการจะซ่อนสไลด์นี้ใช่หรือไม่",
    text: "การกระทำนี้จะซ่อนสไลด์ไว้เท่านั้น",
    icon: "info",
    confirmButtonText: "ตกลง",
  }).then((result) => {
    if (result.isConfirmeded) {
      $.ajax({
        url: "../server/edit_slide",
        type: "GET",
        data: { slideId: id },
        success: function (result) {
          if (result.status === "OK") {
            loadData();
          } else {
            Swal.fire({
              title: "ผิดพลาด",
              text: "ไม่สามารถอัพเดทสไลด์ได้",
              icon: "info",
              confirmButtonText: "ตกลง",
            });
          }
        },
        error: function (err) {
          Swal.fire({
            title: "ผิดพลาด",
            text: err,
            icon: "info",
            confirmButtonText: "ตกลง",
          });
        },
      });
    }
  });
};

const getType = () => {
  $.ajax({
    url: "../server/get_type",
    type: "GET",
    success: function (data) {
      $("#tbody-type").html(data);
    },
  });
};

const editType = (id) => {
  console.log(id);
  Swal.fire({
    title: "คุณต้องการจะซ่อนหมวดหมู่นี้ใช่หรือไม่",
    text: "การกระทำนี้จะซ่อนหมวดหมู่ไว้เท่านั้น",
    icon: "info",
    confirmButtonText: "ตกลง",
  }).then((result) => {
    if (result.isConfirmeded) {
      $.ajax({
        url: "../server/edit_type",
        type: "GET",
        data: { typeId: id },
        success: function (result) {
          console.log(result);
          if (result.status === "OK") {
            getType();
          } else {
            Swal.fire({
              title: "ผิดพลาด",
              text: "ไม่สามารถอัพเดทหมวดหมู่ได้",
              icon: "info",
              confirmButtonText: "ตกลง",
            });
          }
        },
        error: function (err) {
          Swal.fire({
            title: "ผิดพลาด",
            text: err,
            icon: "info",
            confirmButtonText: "ตกลง",
          });
        },
      });
    }
  });
};

const changeType = (id) => {
  $.ajax({
    url: "../server/get_type_id",
    type: "GET",
    data: { typeId: id },
    success: function (result) {
      if (result.status === "OK") {
        $("#typeEdit").modal("show");

        $("#typeid").val(result.message[0].typeId);
        $("#typeName").val(result.message[0].typeName);
      } else {
        Swal.fire({
          title: "ผิดพลาด",
          text: "ไม่สามารถดำเนินการได้",
          icon: "info",
          confirmButtonText: "ตกลง",
        });
      }
    },
    error: function (err) {
      Swal.fire({
        title: "ผิดพลาด",
        text: err,
        icon: "info",
        confirmButtonText: "ตกลง",
      });
    },
  });
};

function previewImages(event) {
  const previewContainer = document.getElementById("imagePreview2");
  previewContainer.innerHTML = "";

  const files = event.target.files;

  // console.log(files.length, "files.length");

  for (let i = 0; i < files.length; i++) {
    let reader = new FileReader();

    reader.onload = function (e) {
      let image = document.createElement("img");
      image.className = "image-work-preview";
      image.src = e.target.result;
      previewContainer.appendChild(image);
    };

    reader.readAsDataURL(files[i]);
  }
}

const uploadImg = async (data) => {
  const imagesInput = document.querySelector('input[name="images[]"]');
  const images = imagesInput.files;

  let base64Object = [];
  for (let i = 0; i < images.length; i++) {
    const readAsDataURLPromise = () => {
      return new Promise((resolve, reject) => {
        const reader = new FileReader();

        reader.onload = function (event) {
          const base64Data = event.target.result;
          resolve(base64Data);
        };

        reader.onerror = function (error) {
          reject(error);
        };

        reader.readAsDataURL(images[i]);
      });
    };
    const base64Img = await readAsDataURLPromise();
    base64Object.push(base64Img);
  }

  // console.log(base64Object, "base64Object");

  try {
    const formData = $(".form-work").serialize();
    let parts = formData.split("&");

    let selectType = parts[0].split("=")[1];
    let work = parts[1].split("=")[1];

    const data = {
      selectType: selectType,
      work: work,
      message: base64Object,
    };

    $.ajax({
      type: "POST",
      dataType: "json",
      url: "../server/upload_img",
      data: { img: data },
      success: function (response) {
        console.log(response, "response");
        Swal.fire({
          title: "สำเร็จ!",
          text: "เพิ่มผลงานและรูปภาพสำเร็จ",
          icon: "success",
          confirmButtonText: "ตกลง",
        }).then((result) => {
          if (result.isConfirmed) {
            location.reload();
            // setTimeout(function () {
            //   location.reload();
            // });
          }
        });
        // location.reload();
      },
      error: function (err) {
        console.log(err);
        Swal.fire({
          title: "ผิดพลาด!",
          text: err,
          icon: "error",
          confirmButtonText: "ตกลง",
        }).then((result) => {
          if (result.isConfirmed) {
            location.reload();
          }
        });
      },
    });
    // Continue with the code that depends on base64Data
  } catch (error) {
    console.error("Error reading file:", error);
    Swal.fire({
      title: "ผิดพลาด!",
      text: error,
      icon: "error",
      confirmButtonText: "ตกลง",
    }).then((result) => {
      if (result.isConfirmed) {
        location.reload();
      }
    });
  }
};

const editImgWork = async (id) => {
  $("#editImgWork").modal("show");

  $(".btn").attr("disabled", true);

  const buttons = document.querySelectorAll(".btn-loading");
  buttons.forEach((button) => {
    button.classList.add("spinner");
  });

  $.ajax({
    url: "../server/get_img_id",
    type: "GET",
    data: { workId: id },
    success: function (data) {
      buttons.forEach((button) => {
        button.classList.remove("spinner");
      });
      $(".btn").attr("disabled", false);
      $("#workIdField").val(id);
      $("#imageFetch").html(data);
    },
  });
};

const editWork = async (id, workName, typeName) => {
  $("#editWork").modal("show");
  $("#workIdFieldEdit").val(id);
  $("#selectTypeEdit").val(typeName);
  $("#workEdit").val(workName);
};

const deleteImg = async (id, workId) => {
  $("#editImgWork").modal("show");

  $(".btn").attr("disabled", true);

  const buttons = document.querySelectorAll(".btn-loading");
  buttons.forEach((button) => {
    button.classList.add("spinner");
  });

  $.ajax({
    url: "../server/delete_img.php",
    type: "GET",
    data: { img_id: id, work_id: workId },
    success: function (data) {
      buttons.forEach((button) => {
        button.classList.remove("spinner");
      });
      $(".btn").attr("disabled", false);

      $("#imageFetch").html(data);
    },
  });
};

$(document).ready(function () {
  loadData();
  getType();

  $("#imageUploadWork").change(async (e) => {
    const files = e.target.files;

    for (let i = 0; i < files.length; i++) {
      const base64 = await convertImgToBase642(files[i]);
      const data = {
        img: base64,
        workId: $("#workIdField").val(),
      };

      $.ajax({
        type: "POST",
        dataType: "json",
        url: "../server/upload_img_edit",
        data: { img: data },
        success: function (response) {
          console.log(response, "response");
          editImgWork($("#workIdField").val());
        },
        error: function (err) {
          console.log(err);
        },
      });
    }
  });

  $(".image-work").change((e) => {
    const previewContainer = document.getElementById("imagePreview2");
    previewContainer.innerHTML = "";

    const files = e.target.files;

    // console.log(files, "files");

    for (let i = 0; i < files.length; i++) {
      let reader = new FileReader();

      reader.onload = function (e) {
        let image = document.createElement("img");
        image.className = "image-work-preview";
        image.src = e.target.result;
        previewContainer.appendChild(image);
      };

      reader.readAsDataURL(files[i]);
    }
  });

  $(".form-auth").submit((e) => {
    $(".btn").attr("disabled", true);
    e.preventDefault();

    const buttons = document.querySelectorAll(".btn-loading");
    buttons.forEach((button) => {
      button.classList.add("spinner");
    });

    $(".btn-icons").css("display", "none");

    const formData = $(".form-auth").serialize();

    $.ajax({
      type: "POST",
      url: "../server/auth",
      data: formData,
      success: function (response) {
        // console.log(response);
        // buttons.forEach((button) => {
        //   button.classList.remove("spinner");
        // });
        // $(".btn-icons").css("display", "block");
        // $(".btn").attr("disabled", false);
        window.location.href = "../index";
      },
      error: function (err) {
        console.log(err);
      },
    });
  });

  $(".img-slide").change((e) => {
    const files = $(".img-slide")[0].files;

    const file = files[0];

    if (file.type.match("image.*")) {
      const reader = new FileReader();

      reader.onload = function (e) {
        const base64Data = e.target.result;

        // Preview the image
        const previewElement = document.getElementById("image-preview");
        previewElement.src = base64Data;
      };

      // Read the file as Data URL (base64)
      reader.readAsDataURL(file);
    } else {
      alert("Invalid file type. Please select an image.");
    }
  });

  $(".form-slide").submit(async (e) => {
    $(".btn").attr("disabled", true);
    e.preventDefault();

    const buttons = document.querySelectorAll(".btn-loading");
    buttons.forEach((button) => {
      button.classList.add("spinner");
    });

    const formData = $(".form-slide").serialize();
    const files = $(".img-slide")[0].files;

    if (files.length > 0 && formData.trim() !== "") {
      try {
        const base64 = await convertImgToBase64(files);
        // console.log(base64, "base64");
        const data = {
          title: formData,
          img: base64,
        };

        $.ajax({
          type: "POST",
          dataType: "json",
          url: "../server/slide",
          data: { slideData: data },
          success: function (response) {
            console.log(response, "response");
            buttons.forEach((button) => {
              button.classList.remove("spinner");
            });
            $(".btn").attr("disabled", false);
            if (response.status === "OK") {
              $("#slideAdd").modal("hide");
            }
            loadData();
            location.reload();
            // window.location.href = "../index";
          },
          error: function (err) {
            console.log(err, "err");
            buttons.forEach((button) => {
              button.classList.remove("spinner");
            });
            $(".btn").attr("disabled", false);
          },
        });
      } catch (error) {
        console.error("Error converting to base64:", error);
        buttons.forEach((button) => {
          button.classList.remove("spinner");
        });
        $(".btn").attr("disabled", false);
      }
    } else {
      buttons.forEach((button) => {
        button.classList.remove("spinner");
      });
      $(".btn").attr("disabled", false);
      Swal.fire({
        title: "ผิดพลาด!",
        text: "กรุณากรอกข้อมูลให้ครบถ้วน",
        icon: "warning",
        confirmButtonText: "ตกลง",
      }).then((result) => {
        if (result.isConfirmed) {
          location.reload();
        }
      });
    }
  });

  $(".form-type").submit((e) => {
    $(".btn").attr("disabled", true);
    e.preventDefault();

    const buttons = document.querySelectorAll(".btn-loading");
    buttons.forEach((button) => {
      button.classList.add("spinner");
    });

    const formData = $(".form-type").serialize();

    try {
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "../server/type",
        data: formData,
        success: function (response) {
          console.log(response, "response");
          buttons.forEach((button) => {
            button.classList.remove("spinner");
          });
          $(".btn").attr("disabled", false);
          if (response.status === "OK") {
            $("#typeAdd").modal("hide");
          }
          getType();
          location.reload();
          // window.location.href = "../index";
        },
        error: function (err) {
          console.log(err, "err");
          buttons.forEach((button) => {
            button.classList.remove("spinner");
          });
          $(".btn").attr("disabled", false);
        },
      });
    } catch (error) {
      console.error("Error converting to base64:", error);
      buttons.forEach((button) => {
        button.classList.remove("spinner");
      });
      $(".btn").attr("disabled", false);
    }
  });

  $(".form-type-edit").submit((e) => {
    $(".btn").attr("disabled", true);
    e.preventDefault();

    const buttons = document.querySelectorAll(".btn-loading");
    buttons.forEach((button) => {
      button.classList.add("spinner");
    });

    const formData = $(".form-type-edit").serialize();

    try {
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "../server/typeEditId",
        data: formData,
        success: function (response) {
          console.log(response, "response");
          buttons.forEach((button) => {
            button.classList.remove("spinner");
          });
          $(".btn").attr("disabled", false);
          if (response.status === "OK") {
            $("#typeEdit").modal("hide");
          }
          getType();
          location.reload();
          // window.location.href = "../index";
        },
        error: function (err) {
          console.log(err, "err");
          buttons.forEach((button) => {
            button.classList.remove("spinner");
          });
          $(".btn").attr("disabled", false);
        },
      });
    } catch (error) {
      console.error("Error converting to base64:", error);
      buttons.forEach((button) => {
        button.classList.remove("spinner");
      });
      $(".btn").attr("disabled", false);
    }
  });

  $(".form-work").submit(async (e) => {
    $(".btn").attr("disabled", true);
    e.preventDefault();

    const buttons = document.querySelectorAll(".btn-loading");
    buttons.forEach((button) => {
      button.classList.add("spinner");
    });

    const formData = $(".form-work").serialize();

    try {
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "../server/upload_work",
        data: formData,
        success: async function (response) {
          // console.log(response, "response");
          if (response.status === "OK") {
            await uploadImg();
          }
        },
        error: function (err) {
          Swal.fire({
            title: "ผิดพลาด!",
            text: err,
            icon: "error",
            confirmButtonText: "ตกลง",
          }).then((result) => {
            if (result.isConfirmed) {
              location.reload();
            }
          });
        },
      });
    } catch (error) {
      // console.error("Error converting to base64:", error);
      Swal.fire({
        title: "ผิดพลาด!",
        text: error,
        icon: "error",
        confirmButtonText: "ตกลง",
      }).then((result) => {
        if (result.isConfirmed) {
          location.reload();
        }
      });
    }
  });

  $(".form-contact").submit((e) => {
    $(".btn").attr("disabled", true);
    e.preventDefault();

    const buttons = document.querySelectorAll(".btn-loading");
    buttons.forEach((button) => {
      button.classList.add("spinner");
    });

    const formData = $(".form-contact").serialize();

    console.log(formData);
    try {
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "../server/contact",
        data: formData,
        success: function (response) {
          console.log(response, "response");
          buttons.forEach((button) => {
            button.classList.remove("spinner");
          });
          $(".btn").attr("disabled", false);
          if (response.status === "OK") {
            Swal.fire({
              title: "อัพเดท!",
              text: "อัพเดทข้อมูลติดต่อสำเร็จ",
              icon: "success",
              confirmButtonText: "ตกลง",
            });
          }
        },
        error: function (err) {
          console.log(err, "err");
          buttons.forEach((button) => {
            button.classList.remove("spinner");
          });
          $(".btn").attr("disabled", false);
          Swal.fire({
            title: "ผิดพลาด!",
            text: "อัพเดทข้อมูลติดต่อไม่สำเร็จ",
            icon: "error",
            confirmButtonText: "ตกลง",
          });
        },
      });
    } catch (error) {
      console.error("Error converting to base64:", error);
      buttons.forEach((button) => {
        button.classList.remove("spinner");
      });
      $(".btn").attr("disabled", false);
      Swal.fire({
        title: "ผิดพลาด!",
        text: error,
        icon: "error",
        confirmButtonText: "ตกลง",
      });
    }
  });

  $(".form-edit-work").submit((e) => {
    $(".btn").attr("disabled", true);
    e.preventDefault();

    const buttons = document.querySelectorAll(".btn-loading");
    buttons.forEach((button) => {
      button.classList.add("spinner");
    });

    const formData = $(".form-edit-work").serialize();

    console.log(formData);
    try {
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "../server/update_work",
        data: formData,
        success: function (response) {
          console.log(response, "response");
          buttons.forEach((button) => {
            button.classList.remove("spinner");
          });
          $(".btn").attr("disabled", false);
          if (response.status === "OK") {
            Swal.fire({
              title: "อัพเดท!",
              text: "อัพเดทข้อมูลติดต่อสำเร็จ",
              icon: "success",
              confirmButtonText: "ตกลง",
            }).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            });
          }
        },
        error: function (err) {
          console.log(err, "err");
          buttons.forEach((button) => {
            button.classList.remove("spinner");
          });
          $(".btn").attr("disabled", false);
          Swal.fire({
            title: "ผิดพลาด!",
            text: "อัพเดทข้อมูลติดต่อไม่สำเร็จ",
            icon: "error",
            confirmButtonText: "ตกลง",
          });
        },
      });
    } catch (error) {
      console.error("Error converting to base64:", error);
      buttons.forEach((button) => {
        button.classList.remove("spinner");
      });
      $(".btn").attr("disabled", false);
      Swal.fire({
        title: "ผิดพลาด!",
        text: error,
        icon: "error",
        confirmButtonText: "ตกลง",
      });
    }
  });
});
