document.addEventListener("DOMContentLoaded", function () {
  loadAdminsTable();
  setInterval(loadAdminsTable, 5000);

  function loadAdminsTable() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../../controller/admin/uvadminController.php", true);

    xhr.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        var data = JSON.parse(xhr.responseText);
        var tableHTML =
          "<table><thead><tr><th>Name</th><th>Phone</th><th>Email</th><th>Bio</th><th>Reference</th><th>Action</th></tr></thead><tbody>";

        data.forEach(function (admin) {
          tableHTML += `
                          <tr data-id="${admin.id}">
                              <td>${admin.name}</td>
                              <td>${admin.phone}</td>
                              <td>${admin.email}</td>
                              <td>${admin.bio}</td>
                              <td>${admin.ref}</td>
                              <td><button class="edit-btn">Edit</button></td>
                          </tr>
                      `;
        });

        tableHTML += "</tbody></table>";
        document.getElementById("admins-table-container").innerHTML = tableHTML;

        document.querySelectorAll(".edit-btn").forEach(function (button) {
          button.addEventListener("click", handleEditClick);
        });
      }
    };

    xhr.onerror = function () {
      console.error("Request failed");
    };

    xhr.send();
  }

  function handleEditClick(event) {
    const row = event.target.closest("tr");
    const id = row.getAttribute("data-id");
    const name = row.cells[0].textContent;
    const phone = row.cells[1].textContent;
    const email = row.cells[2].textContent;
    const bio = row.cells[3].textContent;
    const ref = row.cells[4].textContent;

    document.getElementById("admin_id").value = id;
    document.getElementById("name").value = name;
    document.getElementById("phone").value = phone;
    document.getElementById("email").value = email;
    document.getElementById("bio").value = bio;
    document.getElementById("ref").value = ref;
  }

  document
    .getElementById("submitUpdate")
    .addEventListener("click", function () {
      const formData = new FormData(document.getElementById("updateAdminForm"));

      var xhr = new XMLHttpRequest();
      xhr.open(
        "POST",
        "../../controller/admin/updateAdminController.php",
        true
      );

      xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
          var data = JSON.parse(xhr.responseText);

          if (data.success) {
            alert("Admin updated successfully");
            loadAdminsTable();
          } else {
            alert("Error: " + data.error);
          }
        }
      };

      xhr.onerror = function () {
        console.error("Request failed");
      };

      xhr.send(formData);
    });
});
