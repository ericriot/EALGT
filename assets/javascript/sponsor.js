// Show the total due based on dropdown selection
$("select#level").change(function () {
    'use strict';
    
    var total = 0, level = '';
    
    level = $('#level').val();
    
   
    // This pricing is in the front end, the javascript, and the php :-/ should be in a databse but no time.
    switch (level) {
    case "Platinum Sponsor":
        total = 2500;
        break;
    case "Gold Sponsor":
        total = 1000;
        break;
    case "Silver Sponsor":
        total = 500;
        break;
    case "Longest Drive Sponsor":
        total = 250;
        break;
    case "Closest to the Pin Sponsor":
        total = 250;
        break;
    case "Tee Sponsor":
        total = 125;
        break;
    default:
        total = 0;
        break;
    }
    
    $("#TotalDue").text('$' + total.toFixed(2));
});

// Validate the submission form
$("#registerForm").submit(function () {
    'use strict';
    
    // Store all the problems in one string, and keep track of the field they should be focused on
    var i, strError = '', focusItem = null, name, name_contact, level, email, phone, address, city_state;
    
    // First off, all of registration one is required.
    name = $('#name');
    name_contact = $('#name_contact');
    email =  $('#email');
    phone = $('#phone');
    address = $('#address');
    city_state = $('#city_state');
    level = $('#level');
    
    // Name, email, address, etc. Focus on the highest field up in the list.
    if (name.val() === '') {
        strError += 'Business Name is required.\n';
        if (!focusItem) { focusItem = name; }
    }
    if (name_contact.val() === '') {
        strError += 'Contact Name is required.\n';
        if (!focusItem) { focusItem = name_contact; }
    }
    if (level.val() === '') {
        strError += 'Sponsorship level is required.\n';
        if (!focusItem) { focusItem = level; }
    }
    if (email.val() === '') {
        strError += 'Email is required.\n';
        if (!focusItem) { focusItem = email; }
    }
    if (address.val() === '') {
        strError += 'Address is required.\n';
        if (!focusItem) { focusItem = address; }
    }
    if (city_state.val() === '') {
        strError += 'City and State is required.\n';
        if (!focusItem) { focusItem = city_state; }
    }
    if (phone.val() === '') {
        strError += 'Phone is required.\n';
        if (!focusItem) { focusItem = phone; }
    }
    
    
    
    if (strError === '') {
        return true;
    } else {
        alert(strError);
        // focusItem.focus();
        // console.log(focusItem);
        return false;
    }
});