// Recalc the total whenever the form is changed. This should probably be done only on the radios but that's ok.
$("#registerForm").change(function () {
    'use strict';
    var total = 0, i = 1, playerType;
    
    for (i = 1; i <= 4; i += 1) {
        playerType = $('input[name=registration_type_' + i + ']:checked', '#registerForm').val();
        // console.log ('i = ' + i + ', value = ' + value);
        
        if (playerType === "Player") {
            total += 145;
        } else if (playerType === "Guest") {
            total += 65;
        }
        
    }
    $("#TotalDue").text('$' + total.toFixed(2));
});


$("#registerForm").submit(function () {
    'use strict';
    
    // Store all the problems in one string, and keep track of the field they should be focused on
    var i, strError = '', focusItem = null, name, playerType, email, phone, address, city_state;
    
    // First off, all of registration one is required.
    name = $('#name_1');
    playerType = $('input[name=registration_type_1]:checked', '#registerForm');
    email =  $('#email_1');
    phone = $('#phone_1');
    address = $('#address_1');
    city_state = $('#city_state_1');
    
    // Name, email, address, etc. Focus on the highest field up in the list.
    if (name.val() === '') {
        strError += 'The Name of person 1 is required.\n';
        if (!focusItem) { focusItem = name; }
    }
    if (playerType.val() !== 'Guest' && playerType.val() !== 'Player') {
        strError += 'The Type of person 1 is required.\n';
        if (!focusItem) { focusItem = playerType; }
    }
    if (email.val() === '') {
        strError += 'The Email of person 1 is required.\n';
        if (!focusItem) { focusItem = email; }
    }
    if (address.val() === '') {
        strError += 'The Address of person 1 is required.\n';
        if (!focusItem) { focusItem = address; }
    }
    if (city_state.val() === '') {
        strError += 'The City and State of person 1 is required.\n';
        if (!focusItem) { focusItem = city_state; }
    }
    if (phone.val() === '') {
        strError += 'The Phone of person 1 is required.\n';
        if (!focusItem) { focusItem = phone; }
    }
    
    // Now we will loop through the other 3 options. If a name, player type, address is in there, the person will require all of those to be considered ok
    // If none of those are filled in, we dont care about them and we move on
    for (i = 2; i <= 4; i += 1) {
        // Get the next registration
        name = $('#name_' + i);
        playerType = $('input[name=registration_type_' + i + ']:checked', '#registerForm');
        address = $('#address_' + i);
        city_state = $('#city_state' + i);
        email =  $('#email_' + i);
        phone = $('#phone_' + i);
        
        
        // This rule could change to require address and city/state. will wait on mr. landry
        if (name.val() !== '' || playerType.val() !== undefined) {
            if (name.val() === '') {
                strError += 'The Name of person ' + i + ' is required.\n';
                if (!focusItem) { focusItem = name; }
            }
            if (playerType.val() !== 'Guest' && playerType.val() !== 'Player') {
                strError += 'The Type of person ' + i + ' is required.\n';
                if (!focusItem) { focusItem = playerType; }
            }
            /* Disabling for now, too strict
            if (address.val() === '') {
                strError += 'The Address of person ' + i + ' is required.\n';
                if (!focusItem) { focusItem = address; }
            }
            if (city_state.val() === '') {
                strError += 'The City and State of person ' + i + ' is required.\n';
                if (!focusItem) { focusItem = cityState; }
            }
            */
            
        }
        
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