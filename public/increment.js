function addAdultFields() {
  // Get the number of adults specified in the input element
  var numAdults = document.getElementById("numberofAdults").value;

  // Get the parent element to which we'll add the new form fields
  var parent = document.getElementById("adultFormcontainer");

  // Remove any existing form fields (in case the number of adults was changed)
  while (parent.lastChild) {
    parent.removeChild(parent.lastChild);
  }

  // testing this object will hold the value of the input field
  var adultfirstnameformdata = {};

  // Generate a new set of form fields for each adult
  for (var i = 1; i <= numAdults; i++) {

    // create a fieldset to hold the adult info
    var fieldset = document.createElement("fieldset");

    //styling the field set 

    //fieldset.style.border = "1px outset gray";

    fieldset.style.display = "flex";
    fieldset.style.flexDirection = "row";

    fieldset.style.marginBottom = '100px'; // add margin to the bottom
    fieldset.style.paddingTop = '5px'; // add padding to the bottom

    /*fieldset.style.backgroundColor ="blue";*/

    // we want the adult information to be on the left of the container while the child info is on the right 
    fieldset.classList.add("float-left");

    // a legend should be create for the adult info
    var legend = document.createElement("legend");
    legend.textContent = "Adult" + i;


    // Create a new label element for the adult's name
    var nameLabel = document.createElement("label");
    nameLabel.classList.add("inline-block");
    //nameLabel.setAttribute("for", "adult" + i + "First Name");
    nameLabel.textContent = "First Name";  // "Adult " + i + " First Name:"

    // Create a new input element for the adult's name
    var nameInput = document.createElement("input");
    nameInput.setAttribute("type", "text");
    nameInput.setAttribute("id", "adult" + i + "FirstName");
    nameInput.setAttribute("name", "adult" + i + "FirstName");
    nameInput.classList.add("form-control");
    nameInput.classList.add("mb-3");





    // last name 

    // Create a new label element for the adult's last name
    var lastNameLabel = document.createElement("label");
    lastNameLabel.classList.add("inline-block");
    lastNameLabel.setAttribute("for", "adult" + i + "LastName");
    lastNameLabel.textContent = "Last Name:";


    // Create a new input element for the adult's last name
    var lastNameInput = document.createElement("input");
    lastNameInput.setAttribute("type", "text");
    lastNameInput.setAttribute("id", "adult" + i + "LastName");
    lastNameInput.setAttribute("name", "adult" + i + "LastName");
    lastNameInput.classList.add("form-control");
    lastNameInput.classList.add("mb-3");



    ///

    // Create a new label element for the adult's age
    var ageLabel = document.createElement("label");
    ageLabel.setAttribute("for", "adult" + i + "Age");
    ageLabel.textContent = "Age:";


    // Create a new input element for the adult's age
    var ageInput = document.createElement("input");
    ageInput.setAttribute("type", "text");
    ageInput.setAttribute("id", "adult" + i + "Age");
    ageInput.setAttribute("name", "adult" + i + "Age");

    ageInput.classList.add("form-control");
    ageInput.classList.add("mb-3");


    // Create a new label element for the adult's gender
    var genderLabel = document.createElement("label");
    genderLabel.setAttribute("for", "adult" + i + "gender");
    
    genderLabel.textContent = "Gender:";

    // Create a new select element for the adult's gender
    var genderInput = document.createElement("select");
    genderInput.setAttribute("id", "adult"  + i + "gender");
    genderInput.setAttribute("name", "adult" + i +"gender");
    genderInput.classList.add("form-control");

    // Create options for the select element
    var maleOption = document.createElement("option");
    maleOption.value = "Male";
    maleOption.text = "Male";
    genderInput.appendChild(maleOption);

    var femaleOption = document.createElement("option");
    femaleOption.value = "Female";
    femaleOption.text = "Female";
    genderInput.appendChild(femaleOption);

    /*
   // Create a new input element for the adult's gender
   var genderInput = document.createElement("input");
   genderInput.setAttribute("type", "text");
   genderInput.setAttribute("id", "adult");
   genderInput.classList.add("form-control");
   
   */

    // Add the new form fields to the fieldset element
    //the created elements should be appended to the fieldset and not the parent

    parent.appendChild(fieldset); //only fieldset should be appended to parent
    fieldset.appendChild(legend);

    fieldset.appendChild(nameLabel); //
    fieldset.appendChild(nameInput);
    fieldset.appendChild(lastNameLabel);
    fieldset.appendChild(lastNameInput);
    fieldset.appendChild(ageLabel);
    fieldset.appendChild(ageInput);
    fieldset.appendChild(genderLabel);
    fieldset.appendChild(genderInput);

  }


}





function addChildrenFields() {

  // Get the number of adults specified in the input element
  var numchildren = document.getElementById("numberofChildren").value;

  // Get the parent element to which we'll add the new form fields
  var childP = document.getElementById("children-form-container");

  // Remove any existing form fields (in case the number of adults was changed)
  while (childP.lastChild) {
    childP.removeChild(childP.lastChild);
  }

  // Generate a new set of form fields for each adult
  for (var i = 1; i <= numchildren; i++) {

    // create a fieldset to hold children info
    var childrenfieldset = document.createElement("fieldset");

    // styling the childrenfieldset

    //childrenfieldset.style.border = "1px outset gray";
    childrenfieldset.style.display = "flex";
    childrenfieldset.flexDirection = "row";
    childrenfieldset.style.marginBottom = '100px';
    childrenfieldset.style.marginLeft = "20px";
    childrenfieldset.style.paddingTop = '5px';

    // we want the child information to be on the right side of the screen
    childrenfieldset.classList.add("float-right");

    // creating a child legend
    var childLegend = document.createElement("legend");
    childLegend.textContent = "Child" + i;



    // Create a new label element for the childs's name
    var nameLabel = document.createElement("label");
    nameLabel.classList.add("inline-block");
    // nameLabel.setAttribute("for", "Child" + i + " First Name");
    nameLabel.textContent = "First Name"; //Child " + i + " First Name:"


    // Create a new input element for the adult's name
    var ChildnameInput = document.createElement("input");
    ChildnameInput.setAttribute("type", "text");
    ChildnameInput.setAttribute("id", "Child" + i + "FirstName");
    ChildnameInput.setAttribute("name", "Child" + i + "FirstName");
    ChildnameInput.classList.add("form-control");
    ChildnameInput.classList.add("mb-3");

    //childlast name 

    // Create a new label element fo child last name

    var childLastName = document.createElement("label");
    childLastName.setAttribute("for", "Child" + i + "LastName:");
    childLastName.textContent = "Last Name:";

    // create a new input element for the child last name
    var childLastNameInput = document.createElement("input");
    childLastNameInput.setAttribute("type", "text");
    childLastNameInput.setAttribute("id", "Child" + i + "LastName");
    childLastNameInput.setAttribute("name", "Child" + i + " LastName");
    childLastNameInput.classList.add("form-control");
    childLastNameInput.classList.add("mb-3");



    // Create a new label element for the childs's age
    var childageLabel = document.createElement("label");
    childageLabel.setAttribute("for", "Child" + i + "Age");
    childageLabel.textContent = "Age:";


    // Create a new input element for the adult's age
    var ChildageInput = document.createElement("input");
    ChildageInput.setAttribute("type", "text");
    ChildageInput.setAttribute("id", "Child" + i + "Age");
    ChildageInput.setAttribute("name", "Child" + i + "Age");
    ChildageInput.classList.add("form-control");
    ChildageInput.classList.add("mb-3");


    // Create a new label element for the adult's gender
    var childgenderLabel = document.createElement("label");
    childgenderLabel.setAttribute("for", "Child" + i + "Gender");
    childgenderLabel.textContent = "Gender:";


    // Create a new input element for the adult's gender
    // var ChildgenderInput = document.createElement("input");
    // ChildgenderInput.setAttribute("type", "text");
    //  ChildgenderInput.setAttribute("id", "Child");
    // ChildgenderInput.classList.add("form-control");

    // Create a new select element for the childs's gender
    var ChildgenderInput = document.createElement("select");
    ChildgenderInput.setAttribute("id", "Child" + i + "Gender");
    ChildgenderInput.setAttribute("name", "Child" + i + "Gender");
    ChildgenderInput.classList.add("form-control");

    // Create options for the select element
    var maleOption = document.createElement("option");
    maleOption.value = "Male";
    maleOption.text = "Male";
    ChildgenderInput.appendChild(maleOption);

    var femaleOption = document.createElement("option");
    femaleOption.value = "Female";
    femaleOption.text = "Female";
    ChildgenderInput.appendChild(femaleOption);


    // Add the new form fields to the parent element

    childP.appendChild(childrenfieldset); // only fieldset that should be appended to parent
    childrenfieldset.appendChild(childLegend);
    childrenfieldset.appendChild(nameLabel);
    childrenfieldset.appendChild(ChildnameInput);
    childrenfieldset.appendChild(childLastName);
    childrenfieldset.appendChild(childLastNameInput);
    childrenfieldset.appendChild(childageLabel);
    childrenfieldset.appendChild(ChildageInput);
    childrenfieldset.appendChild(childgenderLabel);
    childrenfieldset.appendChild(ChildgenderInput);

    //childP.appendChild(nameLabel);
    //childP.appendChild(nameInput);

  }

}