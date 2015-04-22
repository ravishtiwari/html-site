$(document).ready(function() {
	'use strict';
	var SPA = function () {
		var self = this;
		self.navlinks = ['Users', 'Forms', 'Table'];

		self.selectedLink = ko.observable();
		self.selectedLinkData = ko.observable();
		self.selectedUserData = ko.observable();		

		self.tableData = ko.observable();
		self.focus = function (params) {

		};

		self.loadDetaultRoute = function(params)  {
			self.selectedLink(null);
            self.selectedUserData(null);
            self.selectedLinkData(null);
            // $.get('/services/main.html', {}, self.defaultData);
           	//window.setTimeout(function(){$("body").find("#default > h1:first").attr("tabindex","-1").focus()}, 1000);
		};
		self.goToLink = function(link) {
			location.hash = link;
			
		};
		
		self.goToUser = function(user) {			
			location.hash = self.navlinks[0] + '/'+user.nick;
		};

		self.loadUserData = function(params){
			self.selectedLink(params.link);
            self.selectedUserData(null);
            $.get('/services/users.json', { link: params.link }, self.selectedLinkData);
          	window.setTimeout(function(){$("#userList").find("table:first").attr("tabindex","-1").focus()}, 1000);  
		};

		self.loadUserDetails = function (params) {
			$.get('/services/'+params.link.toLowerCase()+'/'+params.nick+'.json', 
                    	{ nick: params.nick }, 
                    	self.selectedUserData);
			window.setTimeout(function(){$("body").find("#user").attr("tabindex","-1").focus()}, 1000);
		};

		self.loadFormsPage = function(){

		};

		self.loadTableData = function (params) {
			self.selectedUserData(null);
            self.selectedLinkData(null);
            self.selectedLink(params.link);
            $.get('/services/table.html', {}, self.tableData);
           	window.setTimeout(function(){$("#tables").find("table:first").attr("tabindex","-1").focus()}, 1000);
		
		};

		self.displayDefaultData =  ko.computed(function() {
        	return self.selectedLink() == null
    	}, this);

		//Routings
		Sammy(function () {
                this.get('#:link', function () {

                	if(this.params.link == self.navlinks[0]) {
                		self.loadUserData(this.params);
                	} else if(this.params.link == self.navlinks[1]) {

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
                	self.goToLink('default')
                	//this.app.runRoute('get', '#Users') 
            	});
            }).run();

	}
	ko.applyBindings(new SPA());
});
