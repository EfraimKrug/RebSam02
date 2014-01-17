
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
    }
});
