const body = document.querySelector("body"),
  modeToggle = body.querySelector(".mode-toggle");
sidebar = body.querySelector("nav");
sidebarToggle = body.querySelector(".sidebar-toggle");

let getMode = localStorage.getItem("mode");
if (getMode && getMode === "dark") {
  body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if (getStatus && getStatus === "close") {
  sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () => {
  body.classList.toggle("dark");
  if (body.classList.contains("dark")) {
    localStorage.setItem("mode", "dark");
  } else {
    localStorage.setItem("mode", "light");
  }
});

sidebarToggle.addEventListener("click", () => {
  sidebar.classList.toggle("close");
  if (sidebar.classList.contains("close")) {
    localStorage.setItem("status", "close");
  } else {
    localStorage.setItem("status", "open");
  }
});
function toggleSubcategories(link) {
  var listItem = link.parentNode;
  var subcategories = listItem.querySelector(".subcategories");
  subcategories.classList.toggle("show");
}

$("button").click(function () {
  $(".alert").addClass("show");
  $(".alert").removeClass("hide");
  $(".alert").addClass("showAlert");
  setTimeout(function () {
    $(".alert").removeClass("show");
    $(".alert").addClass("hide");
  }, 5000);
});
$(".close-btn").click(function () {
  $(".alert").removeClass("show");
  $(".alert").addClass("hide");
});

function downloadAsPDF() {
  const table = document.querySelector(".content-table");
  const pdfOptions = {
    margin: 10,
    filename: "table_export.pdf",
    image: {
      type: "jpeg",
      quality: 0.98,
    },
    html2canvas: {
      scale: 2,
    },
  };

  // Use html2pdf to create the PDF
  html2pdf().from(table).set(pdfOptions).save();
}

function openPopup(idNote, note) {
  document.getElementById("idNote").value = idNote;
  document.getElementById("note").value = note;
  document.getElementById("editPopup").style.display = "block";
}

function openPopup2() {
  document.getElementById("addPopup").style.display = "block";
}

function closePopup() {
  document.getElementById("editPopup").style.display = "none";
  document.getElementById("addPopup").style.display = "none";
}

document
  .getElementById("studentIdInput")
  .addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
      event.preventDefault(); // Prevent form submission
      document.getElementById("searchForm").submit();
    }
  });
