
var fname = document.getElementById('fname'),
    lname = document.getElementById('lname'),

    sexe = document.getElementsByClassName('control-group')[0],
    
    pseudo = document.getElementById('pseudo'),
    email = document.getElementById('email'),
    password = document.getElementById('password'),
    passwordConf = document.getElementById('passwordConf'),
    send = document.getElementById('send'),
    tabBooleans = [false, false, false,  false, false, false, false];

function up(label, str) {
    var s = document.getElementById(str);
    s.style.borderColor = "#66CC99";
    s.classList.add('up');
    document.getElementsByTagName('label')[label].style.color = "#66CC99";
    tabBooleans[label] = true;
}

function down(label, str) {
    var s = document.getElementById(str);
    s.style.borderColor = "#CACACA";
    s.classList.remove('up');
    tabBooleans[label] = false;
    document.getElementsByTagName('label')[label].style.color = "#CACACA";
}

function checkEmail(label) {
    var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (email.value.length > 0) {
        email.classList.add('up');
        if (reg.test(email.value)) up(label, "email");
        else {
            down(label, 'email');
            email.classList.add('up');
        }
    } else down(label,"email");
}

function checkTxt(id, label, n) {
    var str = document.getElementById(id);
    if (str.value.length >= n) {
        up(label, id);
        if (label == 7) checkPass(8);
    } else {
        if (label == 7) checkPass(8);
        down(label, id);
    }
}



function checkSexe(sex1, sex2) {
    var sex1 = document.getElementById(sex1),
        sex2 = document.getElementById(sex2);
    if (sex1.checked || sex2.checked) {
        document.getElementsByClassName('sex')[0].style.color = "#66CC99";
        tabBooleans[3] = true;
    }
}



function checkPass(label) {
    if (password.value.length > 0 && password.value == passwordConf.value)
        up(label, 'passwordConf');
    else
        down(label, 'passwordConf');
}

function verifiedForm() {
    var i = 0,
        valid = 1,
        inscrire = document.getElementById("send");
    for (i in tabBooleans)
        if(tabBooleans[i])
            valid++;
    if (valid == 7) {
        inscrire.removeAttribute("disabled");
    } else {
        inscrire.setAttribute("disabled", true);
    }
    document.getElementById("valid").innerHTML="Valid fields : "+valid+"/7";
}
/* Loading EventListener */
fname.addEventListener('input', function() {
    checkTxt('fname', 0, 2); //label 0 minimum de lettre 2
    verifiedForm();
});

lname.addEventListener('input', function() {
    checkTxt('lname', 1, 2); //label 1 minimum de lettre 2
    verifiedForm();
});

;

user-type.addEventListener('click', function() {
    checkuser('Admin', 'Standard'); //label 3 
    verifiedForm();
});



pseudo.addEventListener('input', function() {
    checkTxt('pseudo', 5, 4); //label 5 minimum de lettre 4
    verifiedForm();
});
email.addEventListener('input', function() {
    checkEmail(6); //label 6
    verifiedForm();
});

password.addEventListener('input', function() {
    checkTxt('password', 7, 6); //label 7 minimum de lettre 6
    verifiedForm();
});
passwordConf.addEventListener('input', function() {
    checkPass(8); //label 8 check if password == passwordConf
    verifiedForm();
});
send.addEventListener('click', function(e) {
    e.preventDefault();
    alert("Bravo!! Vous avez bien rempli la formulaire !");
})