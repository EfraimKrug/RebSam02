/**
 * Views
 *
 * PARUSH VIEWS
 **/

var ParushView = Backbone.View.extend({
 
    tagName:"div",
 
    template:_.template($('#ParushTemplate').html()),
	template2:_.template($('#ParushTemplate2').html()),
	template3:_.template($('#DateTemplate').html()),
	EmptyTemplate:_.template($('#EmptyTemplate').html()),

	events: {
		'click clickParush' : 'getParushExtension'
	},

	getParushExtension: function (){
        $(this.el).html(this.template2(this.model.toJSON()));
		//$(this.el).css("height", "956px");
		//$("#WholeShebang").css("height", "2356px");
		//$('#ParushDate').html(this.template3(this.model.toJSON()));
		$('#PostYesterday').html(this.EmptyTemplate(this.model.toJSON()));
		var SourceAuthorID = this.model.get("PCSOURCEAUTHOR");
		var dRouter = new DataRouter();
		if(SourceAuthorID < 1){
			SourceAuthorID = -1;
			}
		dRouter.displaySourceAuthorInfo(SourceAuthorID);
        return this;
	},
	
    render:function (eventName) {
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    }
 
});

var PreviousParushView = Backbone.View.extend({
 
    tagName:"div",
 
    template:_.template($('#ParushTemplate').html()),
	template2:_.template($('#ParushTemplate2').html()),
	template3:_.template($('#DateTemplate').html()),
	EmptyTemplate:_.template($('#EmptyTemplate').html()),

	events: {
		'click clickParush' : 'getParushExtension'
	},

	getParushExtension: function (){
        $(this.el).html(this.template2(this.model.toJSON()));
		//$('#ParushDate').html(this.template3(this.model.toJSON()));
		$('#PostToday').html(this.EmptyTemplate(this.model.toJSON()));
		var SourceAuthorID = this.model.get("PCSOURCEAUTHOR");
		var dRouter = new DataRouter();
		if(SourceAuthorID < 1){
			SourceAuthorID = -1;
			}
		dRouter.displaySourceAuthorInfo(SourceAuthorID);
        return this;
	},
	
    render:function (eventName) {
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    }
 
});
 
var ParushListView = Backbone.View.extend({

    tagName: "div",

    render: function(eventName) {
        _.each(this.model.models, function (mdl) {
            $(this.el).append(new ParushView({model:mdl}).render().el);
        }, this);

        return this;
    }
 
});

var PreviousParushListView = Backbone.View.extend({

    tagName: "div",
    render: function(eventName) {
        _.each(this.model.models, function (mdl) {
            $(this.el).append(new PreviousParushView({model:mdl}).render().el);
        }, this);

        return this;
    }
 
});



var SourceAuthorView = Backbone.View.extend({
 
    tagName:"div",
 
    template:_.template($('#SourceAuthorTemplate').html()),

    render:function (eventName) {
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    }
 
});
 


var SourceAuthorListView = Backbone.View.extend({

    tagName: "div",

    render: function(eventName) {
        _.each(this.model.models, function (mdl) {
            $(this.el).append(new SourceAuthorView({model:mdl}).render().el);
        }, this);

        return this;
    }
 
});

var MenuView = Backbone.View.extend({
 
    tagName:"ul",
 
    template:_.template($('#MenuTemplate').html()),
	
	events: {
		'click clickChoice' : 'doChoice'
	},
		
	doChoice: function (eventName){
		var dRouter = new DataRouter();
		dRouter.doMenuOption(this.model.get("PCCONNECTION"));
		},
		
    render:function (eventName) {
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    }
 
});
 


var MenuListView = Backbone.View.extend({

    tagName: "ul",

    render: function(eventName) {
        _.each(this.model.models, function (mdl) {
            $(this.el).append(new MenuView({model:mdl}).render().el);
        }, this);

        return this;
    }
 
});

var EndorsementView = Backbone.View.extend({
 
    tagName:"div",
 
    template:_.template($('#EndorsementTemplate').html()),
	
    render:function (eventName) {
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    }
 
});

var EndorsementListView = Backbone.View.extend({

    tagName: "div",

    render: function(eventName) {
        _.each(this.model.models, function (mdl) {
            $(this.el).append(new EndorsementView({model:mdl}).render().el);
        }, this);

        return this;
    }
 
});
