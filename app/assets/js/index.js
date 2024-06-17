document.addEventListener("DOMContentLoaded", function () {
//   const createModal = document.getElementById("createModal");
//   const updateModal = document.getElementById("updateModal");
  const confirmModal = document.getElementById("confirmModal");

//   const addBtn = document.getElementById("addBtn");
//   const createBtn = document.getElementById("createBtn");
//   const cancelCreateBtn = document.getElementById("cancelCreateBtn");

//   const updateBtns = document.querySelectorAll(".updateBtn");
//   const confirmUpdateBtns = document.querySelectorAll(".confirmUpdateBtn");
//   const cancelUpdateBtns = document.querySelectorAll(".cancelUpdateBtn");

//   const confirmBtns = document.querySelectorAll(".confirmBtn");
  const cancelBtns = document.querySelectorAll(".cancelBtn");
  const deleteBtns = document.querySelectorAll(".deleteBtn");

//   const formCreate = document.getElementById("form-create");

//   addBtn.addEventListener("click", function () {
//     createModal.classList.remove("hidden");
//     document.body.classList.add("overflow-hidden");
//   });

//   cancelCreateBtn.addEventListener("click", function () {
//     createModal.classList.add("hidden");
//     document.body.classList.remove("overflow-hidden");
//   });

  // formCreate.addEventListener("submit", function (event) {
  //   event.preventDefault();
  //   // console.log("Tao thanh cong");
  // });

//   updateBtns.forEach((updateBtn) => {
//     updateBtn.addEventListener("click", function () {
//       updateModal.classList.remove("hidden");
//       document.body.classList.add("overflow-hidden");
//     });
//   });

//   confirmUpdateBtns.forEach((confirmUpdateBtn) => {
//     confirmUpdateBtn.addEventListener("click", function () {
//       console.log("Cập nhập");
//     });
//   });

//   cancelUpdateBtns.forEach((cancelUpdateBtn) => {
//     cancelUpdateBtn.addEventListener("click", function () {
//       updateModal.classList.add("hidden");
//       document.body.classList.remove("overflow-hidden");
//     });
//   });

  deleteBtns.forEach((deleteBtn) => {
    deleteBtn.addEventListener("click", function () {
      confirmModal.classList.remove("hidden");
      document.body.classList.add("overflow-hidden");
    });
  });

  cancelBtns.forEach((cancelBtn) => {
    cancelBtn.addEventListener("click", function () {
      confirmModal.classList.add("hidden");
      document.body.classList.remove("overflow-hidden");
    });
  });

//   confirmBtns.forEach((confirmBtn) => {
//     confirmBtn.addEventListener("click", function () {
//       console.log("ok");
//     });
//   });

  window.onclick = function (event) {
    if (event.target.id == "overlayConfirm") {
      confirmModal.classList.add("hidden");
    }

    if (event.target.id == "overlayCreate") {
      createModal.classList.add("hidden");
    }

    if (event.target.id == "overlayUpdate") {
      updateModal.classList.add("hidden");
    }
  };
});
