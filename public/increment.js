// Define a global object to hold form data
var formData = {
  firstName: '',
  lastName: '',
  gender: '',
  dob: ''
};

// Function to save form data
function saveFormData() {
  const firstNameInput = document.querySelector('input[name="firstName"]');
  const lastNameInput = document.querySelector('input[name="lastName"]');
  const genderSelect = document.querySelector('select[name="Gender"]');
  const dobInput = document.querySelector('input[name="dob"]');

  if (firstNameInput) formData.firstName = firstNameInput.value;
  if (lastNameInput) formData.lastName = lastNameInput.value;
  if (genderSelect) formData.gender = genderSelect.value;
  if (dobInput) formData.dob = dobInput.value;

 // console.log('Data saved to formData:', formData);
}

// Add event listeners
document.addEventListener('DOMContentLoaded', function() {
  const firstNameInput = document.querySelector('input[name="firstName"]');
  const lastNameInput = document.querySelector('input[name="lastName"]');
  const genderSelect = document.querySelector('select[name="Gender"]');
  const dobInput = document.querySelector('input[name="dob"]');

  if (firstNameInput) firstNameInput.addEventListener('input', saveFormData);
  if (lastNameInput) lastNameInput.addEventListener('input', saveFormData);
  if (genderSelect) genderSelect.addEventListener('change', saveFormData);
  if (dobInput) dobInput.addEventListener('input', saveFormData);
});

// Function to calculate age based on date of birth
function calculateAge(dob) {
 // console.log('Calculating age for dob:', dob); // Debugging line
  if (!dob) {
  //  console.log('DOB is empty');
    return '';
  }
  const birthDate = new Date(dob);
 // console.log('Parsed birthDate:', birthDate); // Debugging line
  if (isNaN(birthDate.getTime())) {
 //   console.log('Invalid date of birth:', dob); // Debugging line
    return '';
  }
  const today = new Date();
  let age = today.getFullYear() - birthDate.getFullYear();
  const monthDifference = today.getMonth() - birthDate.getMonth();
  if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
    age--;
  }
  //console.log('Calculated age:', age); // Debugging line
  return age;
}
function addAdultFields() {
  var numAdults = parseInt(document.getElementById("numberofAdults").value, 10);
  var parent = document.getElementById("adultFormcontainer");

  // Clear existing form fields
  parent.innerHTML = '';

  for (var i = 0; i <= numAdults; i++) {
    var fieldset = document.createElement("fieldset");
    fieldset.style.display = "flex";
    fieldset.style.flexDirection = "row";
    fieldset.style.marginBottom = '100px';
    fieldset.style.paddingTop = '5px';
    fieldset.classList.add("float-left");

    var legend = document.createElement("legend");
    legend.textContent = i === 0 ? "Head of Household" : "Adult " + i;
    fieldset.appendChild(legend);

    var fields = [
      { label: "First Name", name: "adult" + i + "FirstName", type: "text", value: i === 0 ? formData.firstName : "" },
      { label: "Last Name", name: "adult" + i + "LastName", type: "text", value: i === 0 ? formData.lastName : "" },
      { label: "Gender", name: "adult" + i + "Gender", type: "select", options: ["Male", "Female"], selected: i === 0 ? formData.gender : "" },
      { label: "Age", name: "adult" + i + "Age", type: "text", value: i === 0 ? calculateAge(formData.dob) : "" }
    ];

    fields.forEach(field => {
      var label = document.createElement("label");
      label.textContent = field.label;
      fieldset.appendChild(label);

      var input;
      if (field.type === "select") {
        input = document.createElement("select");
        field.options.forEach(optionValue => {
          var option = document.createElement("option");
          option.value = optionValue;
          option.text = optionValue;
          if (optionValue === field.selected) option.selected = true;
          input.appendChild(option);
        });
      } else {
        input = document.createElement("input");
        input.type = field.type;
        input.value = field.value;
      }

      input.name = field.name;
      input.classList.add("form-control", "mb-3");
      fieldset.appendChild(input);
    });

    parent.appendChild(fieldset);
  }
}

// Example call to addAdultFields (ensure this is called after the DOM is loaded)
document.addEventListener('DOMContentLoaded', () => {
  document.getElementById("numberofAdults").addEventListener('change', addAdultFields);
});
