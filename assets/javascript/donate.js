
// Validate the submission form
$("#registerForm").submit(function () {
    'use strict';
    
    // Store all the problems in one string, and keep track of the field they should be focused on
    var i, strError = '', focusItem = null, name, amount, email, phone, address, city_state;
    
    // First off, all of registration one is required.
    name = $('#name');
    email =  $('#email');
    phone = $('#phone');
    address = $('#address');
    city_state = $('#city_state');
    amount = $('#amount');
    
    // Name, email, address, etc. Focus on the highest field up in the list.
    if (name.val() === '') {
        strError += 'Name is required.\n';
        if (!focusItem) { focusItem = name; }
    }
    if (amount.val() === '') {
        strError += 'Amount is required.\n';
        if (!focusItem) { focusItem = amount; }
    } else if (!$.isNumeric(amount.val())) {
        strError += 'Amount must be a valid dollar amount.\n';
        if (!focusItem) { focusItem = amount; }
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