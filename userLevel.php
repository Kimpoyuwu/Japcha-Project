<?php
    include "adminHeader.php";
?>
 <div class="table_category">
        <section class="table_header">
            <h1>User Level </h1>
        </section>
        <section class="table_body">
            <table>
                <thead>
                  <tr>
                    <th>S.N.</th>
                    <th>User Level</th>
                    <th>Accessibility</th>
                    <th>Edit</th>
                    <th>Remove</th>
                  </tr>
                  <tbody>
                      
                  </tbody>
                </thead>
            </table>
    </div>

    <div class="btnAddCategory">
         <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-secondary " onclick="openPopup()" style="height:40px">
                Add Userlevel</button>
    </div>

    <!--triggers can't click outside element when modal is open -->
    <div id="modalOverlay"></div>

     <div class="modal-container" id="popup">
        <div class="modal-header">
          <h4 class="modal-title">New Category Item</h4>
          <button type="button" class="close" onclick="closePopup()" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="controller/addCategory.php" method="post" id="formCategory">
            <div class="form-group-label">
              <label for="c_name">Category Name: </label>
              <input type="text" class="form-control" name="c_name" required>
            </div>
            <div class="form-group-button">
              <button type="submit" style="height:40px">Add user level</button>
            </div>
          </form>
        </div>
     </div>
     <div id="alertContainer"></div>



  <script>
    let popup = document.getElementById("popup");
    let overlay = document.getElementById("modalOverlay");
    function openPopup()
    { 
        popup.classList.add("open-modal-container");
       modalOverlay.style.display = "block";
    }
    function closePopup()
    {
      popup.classList.remove("open-modal-container");
      modalOverlay.style.display = "none";
    }
    function closeModal(event) {
  if (event.target === modalOverlay || event.key === "Escape") {
    closePopup();
  }
}

// Listen for clicks on the modal overlay
modalOverlay.addEventListener("click", closeModal);

// Listen for keydown events to close the modal when "Escape" key is pressed
document.addEventListener("keydown", closeModal);
  </script>
<?php
    include "adminFooter.php";

?>