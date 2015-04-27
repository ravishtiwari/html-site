$(document).ready(function() {
	'use strict';
	var SPA = function () {
		var self = this;
		self.navlinks = ['Users', 'Forms', 'Table'];

		self.selectedLink = ko.observable();
		self.selectedLinkData = ko.observable();
		self.selectedUserData = ko.observable();
		self.tableData = ko.observable();
		self.formPage = ko.observable();
				
		//Link Clicks		
		self.goToLink = function(link) {
			location.hash = link;
			
		};
		
		self.goToUser = function(user) {			
			location.hash = self.navlinks[0] + '/'+user.nick;
		};

		//Load View or Data on click

		//load users listing data
		self.loadUserData = function(params){
			self.selectedLink(params.link);
            self.selectedUserData(null);
            self.tableData(null);
            self.formPage(null);
            $.get('/services/users.json', { link: params.link }, self.selectedLinkData);
          	window.setTimeout(function(){$("#userList").find("h1:first").attr("tabindex","-1").focus()}, 10);  
		};

		//load user details
		self.loadUserDetails = function (params) {
			$.get('/services/'+params.link.toLowerCase()+'/'+params.nick+'.json', 
                    	{ nick: params.nick }, 
                    	self.selectedUserData);
			window.setTimeout(function(){$("body").find("#user").attr("tabindex","-1").focus()}, 10);
		};


		self.loadFormsPage = function(params){
			self.selectedUserData(null);
            self.selectedLinkData(null);
            self.tableData(null);
            // self.formPage(null);
            self.selectedLink(params.link);
            $.get('/services/form.html', {}, self.formPage);
           	window.setTimeout(function() {
           		$("#forms").find("div.container > h1:first").attr("tabindex","-1").focus();
           		$("#contactForm").validate();
           	}, 1000);
		};

		self.loadTableData = function (params) {
			self.selectedUserData(null);
            self.selectedLinkData(null);
            self.formPage(null);
            self.selectedLink(params.link);
            $.get('/services/table.html', {}, self.tableData);
           	window.setTimeout(function(){$("#tables").find("h1:first").attr("tabindex","-1").focus()}, 10);
		
		};


		// Turn on or off sections
		self.displayDefaultData =  ko.computed(function() {
        	return self.selectedLink() == null
    	}, this);

    	self.displayForms = ko.computed(function() {
    		return self.selectedLink() == 'Forms';
    	});

    	self.displayUsersList = ko.computed(function() {
    		return self.selectedLink() == 'Users' && self.selectedUserData() ==  null;
    	});

    	self.displayUserDetails = ko.computed(function() {
    		return self.selectedLink() == 'Users' && self.selectedLinkData() == null && self.selectedUserData() != null;
    	});

    	self.displayTable = ko.computed(function() {
    		return self.selectedLink() == 'Table';
    	});

    	//Handle Form Submission
    	self.submitForm = function (form) {
    		console.log(form);
    		return false;
    	};
    	//handle form submission end


		//Routings
		Sammy(function () {
            this.get('#:link', function () {
            	if(this.params.link == self.navlinks[0]) {
            		self.loadUserData(this.params);
            	} else if(this.params.link == self.navlinks[1]) {
            		self.loadFormsPage(this.params);
            	} else if(this.params.link == self.navlinks[2]) {
            		self.loadTableData(this.params);
            	} else {
            		self.loadDetaultRoute(this.params);
            	}
                
            });

            this.get('#:link/:nick', function () {
                self.selectedLink(self.navlinks[0]);
                self.selectedLinkData(null);
                self.loadUserDetails(this.params);
            });

            //Default  Route
            this.get('', function () { 
            	self.goToLink('');
            	//this.app.runRoute('get', '#Users') 
        	});
        }).run();
	}
	ko.applyBindings(new SPA());
});
