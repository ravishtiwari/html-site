$(document).ready(function() {
	'use strict';
	var SPA = function () {
		var self = this;
		self.navlinks = ['Users', 'Forms', 'Templates'];
		self.selectedLink = ko.observable();
		self.selectedLinkData = ko.observable();
		self.selectedUserData = ko.observable();
		self.goToLink = function(link) {
			self.selectedLink(link);
			self.selectedUserData(null);
			$.get("services/users.json", {link: link}, self.selectedLinkData);
		};
		self.goToLink(self.navlinks[0]);
		self.goToUser = function(user) {
			
			self.selectedLink(self.navlinks[0]);			
			$.get("services/users/"+user.nick+".json", {user: user.nick}, self.selectedUserData);
			self.selectedLinkData(null);
			console.log(self.selectedUserData());
		};
	}
	ko.applyBindings(new SPA());
});