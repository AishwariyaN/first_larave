

$(document).ready(function () {
    $.validator.addMethod("loginRegex", function(value, element) {
        return this.optional(element) || /^[a-z\-\s]+$/i.test(value);
    });

    $("#contact").validate({
        rules: {
            "fname": {
                required: true,
                loginRegex: true,
            },
            "lname":
            {
            	loginRegex: true,
            },
            
            "emailid": {
                required: true,
                email: true
            },
            "sname":{
            	required:true
            },
            "srating":{
            	required:true,
		        range: [1, 5]

            }
        },
        messages: {
            "fname": {
                required: "Please, enter a name",
                loginRegex:"Please enter only letters, spaces, or dashes"
            },
            "lname":
            {
            	loginRegex:"Please enter only letters, spaces, or dashes"
            },

            "emailid": {
                required: "Please, enter an email",
                email: "EmailId is invalid"
            },
             "sname": {
                required: "Please, enter a school name",
                          },
            "srating":{
            	required:"Please, enter school rating",
            	range:"School Rating should be between 1-5"
            }
        }
        
    });

});
