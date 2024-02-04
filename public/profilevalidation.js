document.addEventListener("DOMContentLoaded", function () {
  console.log("Profile validation script loaded.");

  const editLinks = document.querySelectorAll(".edit-link");

  editLinks.forEach((editLink) => {
    editLink.addEventListener("click", function (event) {
      event.preventDefault();

      const clientId = this.dataset.clientId;
      const identifier = this.dataset.identifier;

      // Find the field (prefix, gender, or DOB) using the client ID and identifier
      const field = document.getElementById("profileCanvas" + clientId);

      if (!field) {
        console.log("Field not found.");
        return;
      }

      if (identifier === "Prefix") {
        // Open the modal for editing prefix
        const modal = document.getElementById("ProfileModal" + clientId);
        if (modal) {
          const modalTextArea = modal.querySelector("textarea");
          if (modalTextArea) {
            modalTextArea.value = field.value;
          }
          modal.style.display = "block";
        }
      } else if (identifier === "DOB") {
        // Open the modal for editing Date of Birth
        const modal = document.getElementById("ProfileModal" + clientId);
        if (modal) {
          const modalTextArea = modal.querySelector("textarea");
          if (modalTextArea) {
            modalTextArea.value = field.value;
          }
          modal.style.display = "block";
        }
      } else if (identifier === "Gender") {
        // Open the modal for editing Gender
        const modal = document.getElementById("ProfileModal" + clientId);
        if (modal) {
          const modalTextArea = modal.querySelector("textarea");
          if (modalTextArea) {
            modalTextArea.value = field.value;
          }
          modal.style.display = "block";
        }
      }
    });
  });

  // Add a click event listener to each modal's "Save Changes" button
  const saveButtons = document.querySelectorAll("[data-note-id]");
  saveButtons.forEach((button) => {
    button.addEventListener("click", function (event) {
      event.preventDefault();

      const clientId = this.dataset.clientId;
      const identifier = document.querySelector(`#ProfileModal${clientId} [name="field_identifier"]`).value;

      // Find the field (prefix, gender, or DOB) using the client ID and identifier
      const field = document.getElementById("profileCanvas" + clientId);

      if (!field) {
        console.log("Field not found.");
        return;
      }

      if (identifier === "Prefix") {
        // Perform Prefix validation
        const prefixValue = field.value.trim();
        if (prefixValue !== "Mr" && prefixValue !== "Mrs" && prefixValue !== "Ms") {
          field.style.border = "1px solid red";
          alert("Invalid Prefix. Please enter 'Mr', 'Mrs', or 'Ms'.");
        } else {
          field.style.border = ""; // Remove red border
          const form = document.getElementById("EditProfileRecords" + clientId);
          form.submit(); // Submit the form if validation is successful
        }
      } else if (identifier === "DOB") {
        // Perform Date of Birth validation
        const dobValue = field.value.trim();
        const dateRegex = /^\d{4}-\d{2}-\d{2}$/;
        if (!dateRegex.test(dobValue)) {
          field.style.border = "1px solid red";
          alert("Invalid Date of Birth. Please enter a valid date in the format YYYY-MM-DD.");
        } else {
          field.style.border = ""; // Remove red border
          const form = document.getElementById("EditProfileRecords" + clientId);
          form.submit(); // Submit the form if validation is successful
        }
      } else if (identifier === "Gender") {
        // Perform Gender validation
        const genderValue = field.value.trim();
        if (genderValue !== "Male" && genderValue !== "Female") {
          field.style.border = "1px solid red";
          alert("Invalid Gender. Please enter 'Male' or 'Female'.");
        } else {
          field.style.border = ""; // Remove red border
          const form = document.getElementById("EditProfileRecords" + clientId);
          form.submit(); // Submit the form if validation is successful
        }
      } else if (identifier === "phone") {

        //perfomr phone number validation
         const phoneValue = field.value.trim();

         // Remove all non-digit characters from the input
         const cleanedPhoneValue = phoneValue.replace(/\D/g, "");

         if (cleanedPhoneValue.length !== 10) {
          field.style.border = "1px solid red";
          alert("Invalid Phone Number. Please enter a 10-digit phone number.");
        } else {
          // Format the phone number in American format (XXX) XXX-XXXX
          const formattedPhone = `(${cleanedPhoneValue.slice(0, 3)}) ${cleanedPhoneValue.slice(3, 6)}-${cleanedPhoneValue.slice(6)}`;
      
          // Update the field value with the formatted phone number
          field.value = formattedPhone;
      
          field.style.border = ""; // Remove red border
          const form = document.getElementById("EditProfileRecords" + clientId);
          form.submit(); // Submit the form if validation is successful
        }
      } else if (identifier === "Email") {
        // Perform Email validation using a basic email regex
        const emailValue = field.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailValue)) {
          field.style.border = "1px solid red";
          alert("Invalid Email. Please enter a valid email address.");
        } else {
          field.style.border = ""; // Remove red border
          const form = document.getElementById("EditProfileRecords" + clientId);
          form.submit(); // Submit the form if validation is successful
        }
      }
    });
  });
});
