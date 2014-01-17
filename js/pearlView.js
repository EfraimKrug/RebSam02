/**
 * Views
 *
 * PARUSH VIEWS
 **/

var ParushView = Backbone.View.extend({
 
    tagName:"div",
 
    template:_.template($('#ParushTemplate').html()),
		
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

