
/**
 * Router:
 *
 **/
 
var DataRouter = Backbone.Router.extend({
    routes:{
        "": "displayParush"
    },
	
    displayParush: function() {
        var parushCollection = new ParushCollection(); 
		var parushListView = new ParushListView({model:parushCollection});
		var parushModel = new ParushModel();
        var parushView = new ParushView({model:parushModel});
		parushCollection.fetch({
			success: function () {
					$('#ParushToday').html(parushListView.render().el);
			}
		});
    },

    displayEndorsement: function(menuNum) {
		if(menuNum == 5){ 
				menuName = "About%20Us"; 
				menuID = '#menuButton5open';
				}

        var endorsementCollection = new EndorsementCollection(); 
		var endorsementListView = new EndorsementListView({model:endorsementCollection});
		var endorsementModel = new EndorsementModel();
        var endorsementView = new EndorsementView({model:endorsementModel});
		endorsementCollection.fetch({
			success: function () {
					$('#Endorsement').css("top","0px");
					$('#Endorsement').css("height","2787px");
					$('#Endorsement').css("width","987px");
					$('#Endorsement').css("background-color","#f5e1c5");
					$('#Endorsement').css("border","8px solid grey");
					$('#Endorsement').click(function(){
						$('#Endorsement').css("height","0px");
						$('#Endorsement').css("width","0px");
						$('#Endorsement').css("border","0px solid grey");
						$('#Endorsement').html("");
						$('#Endorsement').css("top","-200px");
						$(menuID).hide();
						});
					$('#Endorsement').html("<div id='EndorsementTitle'></div><div id='EndorsementBody'></div>");
					$('#EndorsementTitle').html("<h2>Endorsements</h2>");
					$('#EndorsementBody').html(endorsementListView.render().el);
			}
		});
    },

    displayMenu: function(menuNum) {
		var menuNames = new Array("0","Siddur","Kavanah","BaruchH","Donate","About%20Us");
		var menuIDs = new Array("0","#menuButton1open","#menuButton2open","#menuButton3open","#menuButton4open","#menuButton5open");
		var menuName = "";
		for(var i=1;i<6;i++){
			$(menuIDs[i]).hide();
			}	
		if(menuNum >  0){ 
				menuName = menuNames[menuNum]; 
				menuID = menuIDs[menuNum];
				$(menuIDs[menuNum]).css("height","298px");
				}

        var menuCollection = new MenuCollection(menuName); 
		var menuListView = new MenuListView({model:menuCollection});
		var menuModel = new MenuModel();
		//menuCollection.getURL();
        var menuView = new MenuView({model:menuModel});
		menuCollection.fetch({
			success: function () {
					$(menuID).html(menuListView.render().el);
					$(menuID).show();
			}
		});
    },
	
    doMenuOption: function(menuConnection) {	
		if(menuConnection == "Endorsements.html"){
			hideMenu();
			this.displayEndorsement(5);
			}
    },
	
	//displayEndorsements: function(){
		//alert('display Endorsements!');
	//	this.displayEndorsement();
	//	},
	
    displayPreviousParush: function() {
        var previousParushCollection = new PreviousParushCollection(); 
		var previousParushListView = new PreviousParushListView({model:previousParushCollection});
		var parushModel = new ParushModel();
        var parushView = new ParushView({model:parushModel});
		previousParushCollection.fetch({
			success: function () {
					$('#ParushYesterday').html(previousParushListView.render().el);
			}
		});
    },
	
    displaySourceAuthorInfo: function(SourceAuthorID) {
        var sourceAuthorCollection = new SourceAuthorCollection(SourceAuthorID); 
		var sourceAuthorListView = new SourceAuthorListView({model:sourceAuthorCollection});
		//alert(SourceAuthorID);
		var sourceAuthorModel = new SourceAuthorModel();
        var sourceAuthorView = new SourceAuthorView({model:sourceAuthorModel});
		sourceAuthorCollection.fetch({
			success: function () {
					$('#SourceAuthor').html(sourceAuthorListView.render().el);
			}
		});
    }
});
